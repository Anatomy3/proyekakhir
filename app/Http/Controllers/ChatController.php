<?php
// app/Http/Controllers/ChatController.php

namespace App\Http\Controllers;

use App\Models\ChatConversation;
use App\Models\ChatMessage;
use App\Events\NewChatMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    /**
     * Check if the user has an active conversation
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkConversation()
    {
        $user = Auth::user();
        
        // Find active conversation for the user
        $conversation = ChatConversation::where('user_id', $user->id)
            ->where('is_active', true)
            ->first();
            
        $messages = [];
        
        if ($conversation) {
            $messages = ChatMessage::where('conversation_id', $conversation->id)
                ->orderBy('created_at')
                ->get();
                
            // Mark messages as read
            ChatMessage::where('conversation_id', $conversation->id)
                ->where('is_from_admin', true)
                ->where('is_read', false)
                ->update(['is_read' => true]);
        }
        
        return response()->json([
            'conversation' => $conversation,
            'messages' => $messages
        ]);
    }
    
    /**
     * Send a message (for authenticated users)
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
            'conversation_id' => 'nullable|exists:chat_conversations,id'
        ]);
        
        $user = Auth::user();
        $message = $request->message;
        $conversationId = $request->conversation_id;
        
        if (!$conversationId) {
            // Create new conversation
            $conversation = ChatConversation::create([
                'user_id' => $user->id,
                'last_message_at' => now()
            ]);
            
            $conversationId = $conversation->id;
        } else {
            // Update last message time and make sure conversation is active
            ChatConversation::where('id', $conversationId)
                ->update([
                    'last_message_at' => now(),
                    'is_active' => true
                ]);
        }
        
        // Save message
        $chatMessage = ChatMessage::create([
            'conversation_id' => $conversationId,
            'user_id' => $user->id,
            'is_from_admin' => false,
            'message' => $message
        ]);
        
        // Broadcast to admin
        broadcast(new NewChatMessage($chatMessage, 'admin'))->toOthers();
        
        return response()->json([
            'status' => 'success',
            'conversation_id' => $conversationId
        ]);
    }
    
    /**
     * Initialize a guest chat session
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function initializeGuestChat(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);
        
        // Generate a unique session ID
        $sessionId = (string) Str::uuid();
        
        // Create new conversation
        $conversation = ChatConversation::create([
            'guest_name' => $request->name,
            'guest_email' => $request->email,
            'session_id' => $sessionId,
            'last_message_at' => now()
        ]);
        
        // Create welcome message from admin
        $welcomeMessage = ChatMessage::create([
            'conversation_id' => $conversation->id,
            'is_from_admin' => true,
            'message' => 'Halo ' . $request->name . '! Selamat datang di Daiku Interior & Eksterior. Ada yang bisa kami bantu?'
        ]);
        
        return response()->json([
            'status' => 'success',
            'conversation_id' => $conversation->id,
            'session_id' => $sessionId,
            'welcome_message' => $welcomeMessage
        ])->cookie('chat_session_id', $sessionId, 60 * 24 * 30); // 30 days
    }
    
    /**
     * Send a message as a guest
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendGuestMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
            'session_id' => 'required|exists:chat_conversations,session_id'
        ]);
        
        $message = $request->message;
        $sessionId = $request->session_id;
        
        // Find conversation by session ID
        $conversation = ChatConversation::where('session_id', $sessionId)
            ->where('is_active', true)
            ->firstOrFail();
            
        // Update last message time
        $conversation->last_message_at = now();
        $conversation->save();
        
        // Save message
        $chatMessage = ChatMessage::create([
            'conversation_id' => $conversation->id,
            'is_from_admin' => false,
            'message' => $message
        ]);
        
        // Broadcast to admin
        broadcast(new NewChatMessage($chatMessage, 'admin'))->toOthers();
        
        return response()->json([
            'status' => 'success',
            'message_id' => $chatMessage->id
        ]);
    }
    
    /**
     * Check if a guest session is valid
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkGuestSession(Request $request)
    {
        $request->validate([
            'session_id' => 'required|string'
        ]);
        
        $sessionId = $request->session_id;
        $conversation = ChatConversation::where('session_id', $sessionId)
            ->where('is_active', true)
            ->first();
            
        if (!$conversation) {
            return response()->json([
                'valid' => false
            ]);
        }
        
        $messages = ChatMessage::where('conversation_id', $conversation->id)
            ->orderBy('created_at')
            ->get();
            
        // Mark messages as read
        ChatMessage::where('conversation_id', $conversation->id)
            ->where('is_from_admin', true)
            ->where('is_read', false)
            ->update(['is_read' => true]);
            
        return response()->json([
            'valid' => true,
            'conversation_id' => $conversation->id,
            'messages' => $messages
        ]);
    }
}
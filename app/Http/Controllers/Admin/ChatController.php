<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChatConversation;
use App\Models\ChatMessage;
use App\Events\NewChatMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Display the chat admin interface
     */
    public function index()
    {
        return view('admin.chat.index');
    }

    /**
     * Get all active conversations
     */
    public function getConversations()
    {
        $conversations = ChatConversation::with('user')
            ->where('is_active', true)
            ->orderBy('last_message_at', 'desc')
            ->get();
            
        $conversations = $conversations->map(function ($conversation) {
            $lastMessage = ChatMessage::where('conversation_id', $conversation->id)
                ->orderBy('created_at', 'desc')
                ->first();
                
            $unreadCount = ChatMessage::where('conversation_id', $conversation->id)
                ->where('is_from_admin', false)
                ->where('is_read', false)
                ->count();
                
            return [
                'id' => $conversation->id,
                'user' => $conversation->user_id ? $conversation->user : null,
                'guest_name' => $conversation->guest_name,
                'guest_email' => $conversation->guest_email,
                'last_message' => $lastMessage ? $lastMessage->message : null,
                'last_message_at' => $conversation->last_message_at,
                'unread_count' => $unreadCount
            ];
        });
        
        return response()->json(['conversations' => $conversations]);
    }

    /**
     * Get messages for a specific conversation
     */
    public function getMessages($id)
    {
        $conversation = ChatConversation::findOrFail($id);
        $messages = ChatMessage::where('conversation_id', $id)
            ->orderBy('created_at', 'asc')
            ->get();
            
        // Mark customer messages as read
        ChatMessage::where('conversation_id', $id)
            ->where('is_from_admin', false)
            ->where('is_read', false)
            ->update(['is_read' => true]);
            
        return response()->json([
            'conversation' => $conversation,
            'messages' => $messages
        ]);
    }

    /**
     * Send a message from admin
     */
    public function sendMessage(Request $request)
    {
        $request->validate([
            'conversation_id' => 'required|exists:chat_conversations,id',
            'message' => 'required|string|max:1000'
        ]);
        
        $conversation = ChatConversation::findOrFail($request->conversation_id);
        
        // Update last message time
        $conversation->last_message_at = now();
        $conversation->save();
        
        // Create message
        $message = ChatMessage::create([
            'conversation_id' => $request->conversation_id,
            'user_id' => Auth::id(),
            'is_from_admin' => true,
            'message' => $request->message
        ]);
        
        // Broadcast to user or guest
        broadcast(new NewChatMessage($message, 'user'))->toOthers();
        
        return response()->json([
            'status' => 'success',
            'message' => $message
        ]);
    }

    /**
     * Close a conversation
     */
    public function closeConversation($id)
    {
        $conversation = ChatConversation::findOrFail($id);
        $conversation->is_active = false;
        $conversation->save();
        
        // Send closing message
        $message = ChatMessage::create([
            'conversation_id' => $id,
            'user_id' => Auth::id(),
            'is_from_admin' => true,
            'message' => 'Percakapan ini telah ditutup oleh admin. Terima kasih telah menghubungi kami.'
        ]);
        
        // Broadcast to user
        broadcast(new NewChatMessage($message, 'user'))->toOthers();
        
        return response()->json(['status' => 'success']);
    }
}
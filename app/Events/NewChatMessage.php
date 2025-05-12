<?php
// app/Events/NewChatMessage.php

namespace App\Events;

use App\Models\ChatMessage;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewChatMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $recipient;

    /**
     * Create a new event instance.
     *
     * @param ChatMessage $message
     * @param string $recipient 'user' or 'admin'
     */
    public function __construct(ChatMessage $message, $recipient = 'user')
    {
        $this->message = $message->load('user');
        $this->recipient = $recipient;
    }

    /**
     * Get the data to broadcast.
     *
     * @return array
     */
    public function broadcastWith()
    {
        return [
            'id' => $this->message->id,
            'conversation_id' => $this->message->conversation_id,
            'message' => $this->message->message,
            'is_from_admin' => $this->message->is_from_admin,
            'user_id' => $this->message->user_id,
            'user_name' => $this->message->user ? $this->message->user->name : ($this->message->is_from_admin ? 'Admin' : 'Guest'),
            'created_at' => $this->message->created_at->toIso8601String(),
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        if ($this->recipient === 'admin') {
            return new PrivateChannel('admin.chat');
        }
        
        $conversation = $this->message->conversation;
        
        if ($conversation->user_id) {
            return new PrivateChannel('chat.' . $conversation->user_id);
        } else {
            return new PrivateChannel('chat.guest.' . $conversation->session_id);
        }
    }
}
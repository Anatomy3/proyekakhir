<!-- resources/views/admin/chat/index.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Live Chat</h1>
    
    <div class="row">
        <!-- Daftar Percakapan -->
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Percakapan Aktif</h6>
                    <span id="unread-badge" class="badge bg-danger" style="display: none;">0</span>
                </div>
                <div class="card-body p-0">
                    <div id="conversation-list" class="list-group">
                        <div id="loading-conversations" class="text-center py-4">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Chat Window -->
        <div class="col-md-8">
            <div id="chat-container" class="card shadow mb-4" style="display: none;">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 id="customer-name" class="m-0 font-weight-bold text-primary">Customer Name</h6>
                    <div>
                        <button id="refresh-btn" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-sync-alt"></i>
                        </button>
                        <button id="close-btn" class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-times"></i> Tutup Chat
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="chat-messages" style="height: 400px; overflow-y: auto; padding: 1rem;" class="mb-3 bg-light rounded">
                        <!-- Pesan akan ditampilkan di sini -->
                    </div>
                    <form id="chat-form">
                        <div class="input-group">
                            <input type="text" id="message-input" class="form-control" placeholder="Ketik balasan...">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane"></i> Kirim
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div id="no-chat-selected" class="card shadow mb-4" style="display: flex;">
                <div class="card-body text-center p-5">
                    <i class="fas fa-comments text-gray-300" style="font-size: 4rem;"></i>
                    <p class="mt-3 text-gray-500">Pilih percakapan untuk memulai chat</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    let currentConversationId = null;
    let unreadCount = 0;
    
    // Load active conversations
    function loadConversations() {
        fetch('/admin/chat/conversations')
            .then(response => response.json())
            .then(data => {
                const conversationList = document.getElementById('conversation-list');
                document.getElementById('loading-conversations').style.display = 'none';
                
                if (data.conversations.length === 0) {
                    conversationList.innerHTML = '<div class="text-center p-3 text-gray-500">Tidak ada percakapan aktif</div>';
                    return;
                }
                
                let html = '';
                unreadCount = 0;
                
                data.conversations.forEach(conversation => {
                    const hasUnread = conversation.unread_count > 0;
                    const activeClass = conversation.id === currentConversationId ? 'active bg-light' : '';
                    const displayName = conversation.user ? conversation.user.name : conversation.guest_name;
                    
                    html += `
                    <a href="#" class="list-group-item list-group-item-action ${activeClass}" 
                       data-id="${conversation.id}" onclick="selectConversation(${conversation.id})">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-1">${displayName}</h6>
                            <small>${formatTime(conversation.last_message_at)}</small>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-truncate" style="max-width: 150px;">${conversation.last_message || 'Belum ada pesan'}</small>
                            ${hasUnread ? `<span class="badge bg-danger rounded-pill">${conversation.unread_count}</span>` : ''}
                        </div>
                    </a>
                    `;
                    
                    if (hasUnread) {
                        unreadCount += conversation.unread_count;
                    }
                });
                
                conversationList.innerHTML = html;
                
                const unreadBadge = document.getElementById('unread-badge');
                if (unreadCount > 0) {
                    unreadBadge.textContent = unreadCount;
                    unreadBadge.style.display = 'block';
                } else {
                    unreadBadge.style.display = 'none';
                }
            })
            .catch(error => {
                console.error('Error loading conversations:', error);
            });
    }
    
    // Function to select a conversation
    window.selectConversation = function(id) {
        currentConversationId = id;
        
        // Update UI
        document.querySelectorAll('#conversation-list a').forEach(el => {
            el.classList.remove('active', 'bg-light');
            if (parseInt(el.dataset.id) === id) {
                el.classList.add('active', 'bg-light');
            }
        });
        
        document.getElementById('chat-container').style.display = 'block';
        document.getElementById('no-chat-selected').style.display = 'none';
        
        // Load messages
        loadMessages(id);
    };
    
    // Load messages for the selected conversation
    function loadMessages(conversationId) {
        fetch(`/admin/chat/conversations/${conversationId}/messages`)
            .then(response => response.json())
            .then(data => {
                const displayName = data.conversation.user_id 
                    ? data.conversation.user.name 
                    : data.conversation.guest_name;
                    
                document.getElementById('customer-name').textContent = displayName;
                
                const chatMessages = document.getElementById('chat-messages');
                let html = '';
                
                data.messages.forEach(message => {
                    html += createMessageHTML(message);
                });
                
                chatMessages.innerHTML = html;
                scrollToBottom();
            })
            .catch(error => {
                console.error('Error loading messages:', error);
            });
    }
    
    // Send a message
    document.getElementById('chat-form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (!currentConversationId) return;
        
        const input = document.getElementById('message-input');
        const message = input.value.trim();
        
        if (!message) return;
        
        // Optimistic UI update
        const chatMessages = document.getElementById('chat-messages');
        const newMessage = {
            message: message,
            is_from_admin: true,
            created_at: new Date().toISOString()
        };
        
        chatMessages.innerHTML += createMessageHTML(newMessage);
        scrollToBottom();
        
        input.value = '';
        
        // Send to server
        fetch('/admin/chat/send', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                conversation_id: currentConversationId,
                message: message
            })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Message sent:', data);
        })
        .catch(error => {
            console.error('Error sending message:', error);
        });
    });
    
    // Create message HTML
    function createMessageHTML(message) {
        const isAdmin = message.is_from_admin;
        const alignClass = isAdmin ? 'text-right' : 'text-left';
        const bgClass = isAdmin ? 'bg-primary text-white' : 'bg-light';
        
        return `
        <div class="${alignClass} mb-2">
            <div class="d-inline-block ${bgClass} rounded p-2 px-3 max-w-75">
                ${message.message}
            </div>
            <div class="small text-muted mt-1">
                ${isAdmin ? 'Admin' : 'Customer'} • ${formatTime(message.created_at)}
            </div>
        </div>
        `;
    }
    
    // Format time
    function formatTime(timestamp) {
        const date = new Date(timestamp);
        return date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }) + 
               ' ' + date.toLocaleDateString([], { day: '2-digit', month: '2-digit' });
    }
    
    // Scroll to bottom of chat
    function scrollToBottom() {
        const chatMessages = document.getElementById('chat-messages');
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
    
    // Close conversation
    document.getElementById('close-btn').addEventListener('click', function() {
        if (!currentConversationId) return;
        
        if (!confirm('Apakah Anda yakin ingin menutup percakapan ini?')) return;
        
        fetch(`/admin/chat/conversations/${currentConversationId}/close`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                currentConversationId = null;
                document.getElementById('chat-container').style.display = 'none';
                document.getElementById('no-chat-selected').style.display = 'flex';
                loadConversations();
            }
        })
        .catch(error => {
            console.error('Error closing conversation:', error);
        });
    });
    
    // Refresh messages
    document.getElementById('refresh-btn').addEventListener('click', function() {
        if (currentConversationId) {
            loadMessages(currentConversationId);
        }
    });
    
    // Listen for new messages (using Echo/Pusher)
    window.Echo.private('admin.chat')
        .listen('NewChatMessage', (e) => {
            // Reload conversations to update unread count
            loadConversations();
            
            // If the conversation is currently open, append message
            if (currentConversationId && e.message.conversation_id === currentConversationId) {
                const chatMessages = document.getElementById('chat-messages');
                chatMessages.innerHTML += createMessageHTML(e.message);
                scrollToBottom();
            }
        });
    
    // Initial load
    loadConversations();
    
    // Refresh conversations every 30 seconds
    setInterval(loadConversations, 30000);
});
</script>
@endsection
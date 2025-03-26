<template>
    <div class="chat-widget">
      <!-- Chat Button -->
      <button 
        @click="toggleChat" 
        class="fixed bottom-4 right-4 bg-amber-600 hover:bg-amber-700 text-white rounded-full w-16 h-16 flex items-center justify-center shadow-lg z-50 focus:outline-none"
      >
        <i class="fas fa-comments text-2xl" v-if="!isOpen"></i>
        <i class="fas fa-times text-2xl" v-else></i>
      </button>
      
      <!-- Chat Window -->
      <div 
        v-if="isOpen" 
        class="fixed bottom-20 right-4 bg-white rounded-lg shadow-xl w-80 sm:w-96 overflow-hidden flex flex-col z-50"
        style="height: 400px;"
      >
        <!-- Chat Header -->
        <div class="bg-amber-600 text-white p-4 flex justify-between items-center">
          <div>
            <h3 class="font-bold">Chat dengan Daiku</h3>
            <p class="text-xs text-amber-100">Customer Support</p>
          </div>
          <button @click="toggleChat" class="hover:text-amber-200 focus:outline-none">
            <i class="fas fa-times"></i>
          </button>
        </div>
        
        <!-- Chat Messages -->
        <div 
          ref="messageContainer" 
          class="flex-1 overflow-y-auto p-4 space-y-3 bg-gray-50"
        >
          <!-- Loading Indicator -->
          <div v-if="loading" class="flex justify-center items-center h-full">
            <div class="animate-spin rounded-full h-6 w-6 border-t-2 border-amber-600"></div>
          </div>
          
          <!-- User Form for Guest -->
          <div v-if="showUserForm && !loading" class="bg-white p-4 rounded-lg shadow">
            <h4 class="font-semibold mb-2">Silakan isi data Anda</h4>
            <div class="space-y-3">
              <div>
                <label class="block text-sm font-medium text-gray-700">Nama</label>
                <input 
                  type="text" 
                  v-model="userInfo.name" 
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-500 focus:ring-opacity-50"
                >
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input 
                  type="email" 
                  v-model="userInfo.email" 
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-500 focus:ring-opacity-50"
                >
              </div>
              <button 
                @click="startChat" 
                class="w-full bg-amber-600 text-white py-2 px-4 rounded hover:bg-amber-700 transition-colors"
                :disabled="!userInfo.name || !userInfo.email"
              >
                Mulai Chat
              </button>
            </div>
          </div>
          
          <!-- Message List -->
          <div v-if="!showUserForm && !loading">
            <!-- Welcome Message if no messages -->
            <div v-if="messages.length === 0" class="bg-amber-100 rounded-lg p-3 max-w-[80%]">
              <p class="text-gray-800">Halo! Selamat datang di Daiku Interior & Eksterior. Ada yang bisa kami bantu?</p>
              <div class="text-xs text-gray-500 mt-1">Admin • {{ formatTime(new Date()) }}</div>
            </div>
            
            <!-- Message Items -->
            <div v-for="(message, index) in messages" :key="index" 
                 :class="message.is_from_admin ? 'text-left mb-3' : 'text-right mb-3'">
              <div 
                :class="message.is_from_admin ? 'bg-amber-100 text-gray-800 rounded-lg p-3 max-w-[80%] inline-block' : 'bg-amber-600 text-white rounded-lg p-3 max-w-[80%] inline-block'"
              >
                {{ message.message }}
              </div>
              <div class="text-xs text-gray-500 mt-1">
                {{ message.is_from_admin ? 'Admin' : 'Anda' }} • {{ formatTime(message.created_at) }}
              </div>
            </div>
          </div>
        </div>
        
        <!-- Chat Input -->
        <div class="border-t p-3" v-if="!showUserForm">
          <form @submit.prevent="sendMessage" class="flex">
            <input 
              type="text" 
              v-model="newMessage" 
              class="flex-1 border rounded-l-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500"
              placeholder="Ketik pesan..."
            >
            <button 
              type="submit" 
              class="bg-amber-600 text-white px-4 py-2 rounded-r-md hover:bg-amber-700 focus:outline-none"
              :disabled="!newMessage.trim()"
            >
              <i class="fas fa-paper-plane"></i>
            </button>
          </form>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        isOpen: false,
        messages: [],
        newMessage: '',
        conversationId: null,
        loading: false,
        showUserForm: false,
        userInfo: {
          name: '',
          email: ''
        },
        sessionId: null
      }
    },
    
    created() {
      // Initialize when component is created
      this.initialize();
    },
    
    methods: {
      /**
       * Initialize the chat widget
       */
      async initialize() {
        // Check if user is logged in
        const userElement = document.getElementById('user-data');
        const isLoggedIn = userElement && userElement.dataset.userId;
        
        if (isLoggedIn) {
          this.userInfo.name = userElement.dataset.userName || '';
          this.userInfo.email = userElement.dataset.userEmail || '';
          this.showUserForm = false;
          await this.checkExistingConversation();
          this.setupPusherForUser(userElement.dataset.userId);
        } else {
          // Check for existing cookie
          this.sessionId = this.getCookie('chat_session_id');
          if (this.sessionId) {
            await this.checkGuestSession();
            if (this.conversationId) {
              this.showUserForm = false;
              this.setupPusherForGuest();
            } else {
              this.showUserForm = true;
            }
          } else {
            this.showUserForm = true;
          }
        }
      },
      
      /**
       * Toggle chat window
       */
      toggleChat() {
        this.isOpen = !this.isOpen;
        
        if (this.isOpen && this.messages.length > 0) {
          this.$nextTick(() => {
            this.scrollToBottom();
          });
        }
      },
      
      /**
       * Check for existing conversation (logged in users)
       */
      async checkExistingConversation() {
        this.loading = true;
        try {
          const response = await fetch('/chat/check-conversation');
          const data = await response.json();
          
          if (data.conversation) {
            this.conversationId = data.conversation.id;
            this.messages = data.messages || [];
            this.$nextTick(() => {
              this.scrollToBottom();
            });
          }
        } catch (error) {
          console.error('Error checking conversation:', error);
        }
        this.loading = false;
      },
      
      /**
       * Check guest session
       */
      async checkGuestSession() {
        if (!this.sessionId) return;
        
        this.loading = true;
        try {
          const response = await fetch('/chat/guest/check-session', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
              session_id: this.sessionId
            })
          });
          
          const data = await response.json();
          
          if (data.valid) {
            this.conversationId = data.conversation_id;
            this.messages = data.messages || [];
            this.$nextTick(() => {
              this.scrollToBottom();
            });
          } else {
            // Invalid session, reset
            this.deleteCookie('chat_session_id');
            this.sessionId = null;
          }
        } catch (error) {
          console.error('Error checking guest session:', error);
        }
        this.loading = false;
      },
      
      /**
       * Start a chat for guest users
       */
      async startChat() {
        if (!this.userInfo.name || !this.userInfo.email) {
          return;
        }
        
        this.loading = true;
        try {
          const response = await fetch('/chat/guest/initialize', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
              name: this.userInfo.name,
              email: this.userInfo.email
            })
          });
          
          const data = await response.json();
          
          if (data.status === 'success') {
            this.conversationId = data.conversation_id;
            this.sessionId = data.session_id;
            this.showUserForm = false;
            
            // Add welcome message if available
            if (data.welcome_message) {
              this.messages = [data.welcome_message];
            }
            
            this.setupPusherForGuest();
            
            this.$nextTick(() => {
              this.scrollToBottom();
            });
          }
        } catch (error) {
          console.error('Error starting chat:', error);
        }
        this.loading = false;
      },
      
      /**
       * Send a message
       */
      async sendMessage() {
        if (!this.newMessage.trim()) return;
        
        const messageText = this.newMessage;
        this.newMessage = '';
        
        // Optimistic UI update
        const tempMessage = {
          message: messageText,
          is_from_admin: false,
          created_at: new Date()
        };
        
        this.messages.push(tempMessage);
        this.$nextTick(() => {
          this.scrollToBottom();
        });
        
        try {
          let response;
          
          if (this.sessionId) {
            // Guest message
            response = await fetch('/chat/guest/send', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
              },
              body: JSON.stringify({
                message: messageText,
                session_id: this.sessionId
              })
            });
          } else {
            // Authenticated user message
            response = await fetch('/chat/send', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
              },
              body: JSON.stringify({
                message: messageText,
                conversation_id: this.conversationId
              })
            });
          }
          
          const data = await response.json();
          
          if (data.status !== 'success') {
            console.error('Error sending message:', data);
          }
          
          if (!this.conversationId && data.conversation_id) {
            this.conversationId = data.conversation_id;
          }
        } catch (error) {
          console.error('Error sending message:', error);
        }
      },
      
      /**
       * Set up Pusher for authenticated users
       */
      setupPusherForUser(userId) {
        if (!window.Echo) return;
        
        window.Echo.private(`chat.${userId}`)
          .listen('NewChatMessage', (e) => {
            // Add new message to the list
            this.messages.push(e.message);
            this.$nextTick(() => {
              this.scrollToBottom();
            });
            
            // Show notification if chat is minimized
            if (!this.isOpen) {
              this.showNotification('Pesan Baru', e.message.message);
            }
          });
      },
      
      /**
       * Set up Pusher for guest users
       */
      setupPusherForGuest() {
        if (!window.Echo || !this.sessionId) return;
        
        window.Echo.private(`chat.guest.${this.sessionId}`)
          .listen('NewChatMessage', (e) => {
            // Add new message to the list
            this.messages.push(e.message);
            this.$nextTick(() => {
              this.scrollToBottom();
            });
            
            // Show notification if chat is minimized
            if (!this.isOpen) {
              this.showNotification('Pesan Baru', e.message.message);
            }
          });
      },
      
      /**
       * Format time for display
       */
      formatTime(time) {
        const date = time instanceof Date ? time : new Date(time);
        return date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
      },
      
      /**
       * Scroll message container to bottom
       */
      scrollToBottom() {
        if (this.$refs.messageContainer) {
          this.$refs.messageContainer.scrollTop = this.$refs.messageContainer.scrollHeight;
        }
      },
      
      /**
       * Show browser notification
       */
      showNotification(title, message) {
        if (!("Notification" in window)) return;
        
        if (Notification.permission === "granted") {
          new Notification(title, { body: message });
        } else if (Notification.permission !== "denied") {
          Notification.requestPermission().then(permission => {
            if (permission === "granted") {
              new Notification(title, { body: message });
            }
          });
        }
      },
      
      /**
       * Get cookie value by name
       */
      getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
        return null;
      },
      
      /**
       * Delete cookie by name
       */
      deleteCookie(name) {
        document.cookie = `${name}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
      }
    }
  }
  </script>
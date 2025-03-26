// resources/js/app.js
import './bootstrap';
import { createApp } from 'vue';

// Import komponen ChatWidget
import ChatWidget from './components/ChatWidget.vue';

// Buat aplikasi Vue dan daftarkan komponen ChatWidget
const app = createApp({});
app.component('chat-widget', ChatWidget);

// Mount ke elemen dengan ID app
app.mount('#app');
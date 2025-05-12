// resources/js/app.js
import './bootstrap';
import { createApp } from 'vue';

// Import komponen ChatWidget
import ChatWidget from './components/ChatWidget.vue';

// Pastikan DOM sudah dimuat sebelum mounting Vue
document.addEventListener('DOMContentLoaded', () => {
    // Cek apakah elemen dengan ID 'app' ada
    const appElement = document.getElementById('app');
    if (appElement) {
        // Buat aplikasi Vue dan daftarkan komponen ChatWidget
        const app = createApp({});
        app.component('chat-widget', ChatWidget);
        
        // Mount ke elemen dengan ID app
        app.mount('#app');
        console.log('Vue app mounted successfully');
    } else {
        console.error('Element with ID "app" not found in the DOM');
    }
});
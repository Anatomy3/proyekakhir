// Navigation and UI Functions
document.addEventListener('DOMContentLoaded', function() {
    // Initialize page
    console.log('Daiku Interior Prototype Loaded');
    
    // Add smooth scrolling to anchor links
    const links = document.querySelectorAll('a[href^="#"]');
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });
});

// Product Filter Function
function filterProducts(category) {
    const products = document.querySelectorAll('.product-card');
    const filterBtns = document.querySelectorAll('.filter-btn');
    
    // Update filter button states
    filterBtns.forEach(btn => btn.classList.remove('active'));
    event.target.classList.add('active');
    
    // Filter products
    products.forEach(product => {
        if (category === 'all' || product.getAttribute('data-category') === category) {
            product.style.display = 'block';
            product.style.animation = 'fadeIn 0.5s ease';
        } else {
            product.style.display = 'none';
        }
    });
}

// Order Form Submission
function submitOrder(event) {
    event.preventDefault();
    
    // Get form data
    const formData = new FormData(event.target);
    const orderData = {
        nama: formData.get('nama'),
        telepon: formData.get('telepon'),
        email: formData.get('email'),
        alamat: formData.get('alamat'),
        jenisDesain: formData.get('jenis-desain'),
        budget: formData.get('budget'),
        deskripsi: formData.get('deskripsi')
    };
    
    // Simulate form submission
    const submitBtn = event.target.querySelector('button[type="submit"]');
    const originalText = submitBtn.textContent;
    
    submitBtn.textContent = 'Mengirim...';
    submitBtn.disabled = true;
    
    setTimeout(() => {
        alert(`Terima kasih ${orderData.nama}!\n\nPemesanan Anda telah diterima.\nTim kami akan segera menghubungi Anda di nomor ${orderData.telepon} untuk konsultasi lebih lanjut.\n\nOrder ID: DK${Math.floor(Math.random() * 1000).toString().padStart(3, '0')}`);
        
        submitBtn.textContent = originalText;
        submitBtn.disabled = false;
        
        // Redirect to status page
        window.location.href = 'status.html';
    }, 2000);
}

// Login Form Handler
function handleLogin(event) {
    event.preventDefault();
    
    const email = document.getElementById('loginEmail').value;
    const password = document.getElementById('loginPassword').value;
    
    // Simple demo authentication
    if (email === 'admin@daiku.com' && password === 'admin123') {
        alert('Login berhasil sebagai Admin!');
        window.location.href = 'admin.html';
    } else if (email === 'customer@daiku.com' && password === 'password123') {
        alert('Login berhasil sebagai Customer!');
        window.location.href = 'status.html';
    } else {
        alert('Email atau password salah!\n\nGunakan akun demo:\nCustomer: customer@daiku.com / password123\nAdmin: admin@daiku.com / admin123');
    }
}

// Chat Functions
function sendMessage() {
    const messageInput = document.getElementById('messageInput');
    const messagesContainer = document.getElementById('chatMessages');
    
    if (messageInput && messageInput.value.trim() !== '') {
        const message = messageInput.value.trim();
        
        // Add user message
        const userMessage = createMessageElement(message, 'user');
        messagesContainer.appendChild(userMessage);
        
        // Clear input
        messageInput.value = '';
        
        // Scroll to bottom
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
        
        // Simulate admin response after 2 seconds
        setTimeout(() => {
            const responses = [
                'Terima kasih atas pertanyaannya. Tim kami akan segera membantu Anda.',
                'Saya akan cek informasi tersebut dan memberikan update dalam 5 menit.',
                'Baik, permintaan Anda sudah saya catat. Ada hal lain yang bisa saya bantu?',
                'Tim teknis kami akan menghubungi Anda untuk informasi lebih detail.',
                'Terima kasih atas feedbacknya. Kami akan terus meningkatkan pelayanan.'
            ];
            
            const randomResponse = responses[Math.floor(Math.random() * responses.length)];
            const adminMessage = createMessageElement(randomResponse, 'admin');
            messagesContainer.appendChild(adminMessage);
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        }, 2000);
    }
}

function createMessageElement(text, sender) {
    const messageDiv = document.createElement('div');
    messageDiv.className = `message ${sender}-message`;
    
    const contentDiv = document.createElement('div');
    contentDiv.className = 'message-content';
    contentDiv.textContent = text;
    
    const timeDiv = document.createElement('div');
    timeDiv.className = 'message-time';
    timeDiv.textContent = new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
    
    messageDiv.appendChild(contentDiv);
    messageDiv.appendChild(timeDiv);
    
    return messageDiv;
}

function handleKeyPress(event) {
    if (event.key === 'Enter') {
        sendMessage();
    }
}

// Project Status Functions
function viewDetails(projectId) {
    alert(`Menampilkan detail proyek ${projectId}:\n\n` +
          `✓ Survey lokasi: Selesai\n` +
          `✓ Desain 3D: Selesai\n` +
          `✓ Persiapan material: Selesai\n` +
          `🔄 Instalasi furniture: 65% (Sedang berlangsung)\n` +
          `⏳ Finishing & painting: Belum dimulai\n` +
          `⏳ Final inspection: Belum dimulai\n\n` +
          `Estimasi penyelesaian: 15 Februari 2025`);
}

// Admin Functions
function updateOrderStatus(orderId, newStatus) {
    alert(`Status order ${orderId} berhasil diubah menjadi: ${newStatus}`);
    
    // Update status badge in table
    const row = document.querySelector(`td:contains('${orderId}')`);
    if (row) {
        const statusBadge = row.parentNode.querySelector('.status-badge');
        statusBadge.textContent = newStatus;
        statusBadge.className = `status-badge status-${newStatus.toLowerCase().replace(' ', '-')}`;
    }
}

function processOrder(orderId) {
    const confirmation = confirm(`Proses order ${orderId}?\n\nTindakan ini akan:\n- Mengirim konfirmasi ke customer\n- Mengubah status menjadi "In Progress"\n- Membuat jadwal pengerjaan`);
    
    if (confirmation) {
        updateOrderStatus(orderId, 'In Progress');
    }
}

// Utility Functions
function formatCurrency(amount) {
    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
    }).format(amount);
}

function showNotification(message, type = 'info') {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <span>${message}</span>
            <button onclick="this.parentNode.parentNode.remove()">×</button>
        </div>
    `;
    
    // Add styles
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: ${type === 'success' ? '#28a745' : type === 'error' ? '#dc3545' : '#667eea'};
        color: white;
        padding: 1rem;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.3);
        z-index: 1000;
        animation: slideIn 0.3s ease;
    `;
    
    document.body.appendChild(notification);
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        if (notification.parentNode) {
            notification.remove();
        }
    }, 5000);
}

// Animation keyframes (add to CSS)
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes slideIn {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    
    .notification-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
    }
    
    .notification-content button {
        background: none;
        border: none;
        color: white;
        font-size: 1.2rem;
        cursor: pointer;
        padding: 0;
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
`;
document.head.appendChild(style);

// Initialize page-specific functions
function initializePage() {
    const currentPage = window.location.pathname.split('/').pop();
    
    switch(currentPage) {
        case 'katalog.html':
            // Initialize filter functionality
            console.log('Katalog page initialized');
            break;
            
        case 'chat.html':
            // Auto-scroll chat to bottom
            const chatMessages = document.getElementById('chatMessages');
            if (chatMessages) {
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }
            break;
            
        case 'admin.html':
            // Initialize admin dashboard
            console.log('Admin dashboard initialized');
            updateDashboardStats();
            break;
            
        case 'status.html':
            // Initialize status page
            console.log('Status page initialized');
            break;
            
        default:
            console.log('Home page initialized');
    }
}

// Update dashboard statistics
function updateDashboardStats() {
    // Simulate real-time data updates
    setInterval(() => {
        const statNumbers = document.querySelectorAll('.stat-content h3');
        statNumbers.forEach(stat => {
            const currentValue = parseInt(stat.textContent);
            const randomChange = Math.floor(Math.random() * 3) - 1; // -1, 0, or 1
            const newValue = Math.max(0, currentValue + randomChange);
            stat.textContent = newValue;
        });
    }, 10000); // Update every 10 seconds
}

// Export functions for global access
window.filterProducts = filterProducts;
window.submitOrder = submitOrder;
window.handleLogin = handleLogin;
window.sendMessage = sendMessage;
window.handleKeyPress = handleKeyPress;
window.viewDetails = viewDetails;
window.updateOrderStatus = updateOrderStatus;
window.processOrder = processOrder;

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', initializePage);

// Add loading states for better UX
function showLoading(element) {
    const originalText = element.textContent;
    element.textContent = 'Loading...';
    element.disabled = true;
    
    return () => {
        element.textContent = originalText;
        element.disabled = false;
    };
}

// Form validation helpers
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

function validatePhone(phone) {
    const re = /^(\+62|62|0)8[1-9][0-9]{6,9}$/;
    return re.test(phone.replace(/\s/g, ''));
}

// Enhanced form validation
function validateOrderForm(formData) {
    const errors = [];
    
    if (!formData.get('nama') || formData.get('nama').length < 2) {
        errors.push('Nama lengkap minimal 2 karakter');
    }
    
    if (!validateEmail(formData.get('email'))) {
        errors.push('Format email tidak valid');
    }
    
    if (!validatePhone(formData.get('telepon'))) {
        errors.push('Format nomor telepon tidak valid');
    }
    
    if (!formData.get('alamat') || formData.get('alamat').length < 10) {
        errors.push('Alamat proyek minimal 10 karakter');
    }
    
    if (!formData.get('jenis-desain')) {
        errors.push('Pilih jenis desain');
    }
    
    return errors;
}

// Enhanced order submission with validation
function submitOrderEnhanced(event) {
    event.preventDefault();
    
    const formData = new FormData(event.target);
    const errors = validateOrderForm(formData);
    
    if (errors.length > 0) {
        alert('Mohon perbaiki kesalahan berikut:\n\n' + errors.join('\n'));
        return;
    }
    
    // Continue with original submission logic
    submitOrder(event);
}

// Local Storage for demo data persistence
function saveToLocalStorage(key, data) {
    try {
        localStorage.setItem(key, JSON.stringify(data));
    } catch (e) {
        console.warn('LocalStorage not available:', e);
    }
}

function loadFromLocalStorage(key) {
    try {
        const data = localStorage.getItem(key);
        return data ? JSON.parse(data) : null;
    } catch (e) {
        console.warn('LocalStorage not available:', e);
        return null;
    }
}

// Demo data for prototype
const demoOrders = [
    {
        id: 'DK001',
        customer: 'John Doe',
        product: 'Ruang Tamu Modern',
        amount: 15000000,
        status: 'In Progress',
        progress: 65,
        date: '2025-01-15'
    },
    {
        id: 'DK002',
        customer: 'Jane Smith',
        product: 'Kamar Tidur Minimalis',
        amount: 12000000,
        status: 'Pending',
        progress: 5,
        date: '2025-01-20'
    },
    {
        id: 'DK003',
        customer: 'Bob Wilson',
        product: 'Kitchen Set Modern',
        amount: 18000000,
        status: 'Completed',
        progress: 100,
        date: '2025-01-10'
    }
];

// Initialize demo data
function initializeDemoData() {
    if (!loadFromLocalStorage('daikuOrders')) {
        saveToLocalStorage('daikuOrders', demoOrders);
    }
}

// Call initialization
initializeDemoData();

console.log('Daiku Interior Prototype - All scripts loaded successfully!');
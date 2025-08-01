// === DAIKU INTERIOR DEMO DATA ===

// Demo Design Portfolio Data
const designPortfolio = [
  {
    id: 1,
    title: "Modern Minimalist Living Room",
    category: "Interior Design",
    style: "Modern",
    price: 25000000,
    pricePerM2: 2500000,
    image: "https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=400",
    thumbnail: "https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=200",
    gallery: [
      "https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=800",
      "https://images.unsplash.com/photo-1567538096630-e0c55bd6374c?w=800",
      "https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=800"
    ],
    description: "Desain ruang tamu modern minimalis dengan konsep open space yang elegan dan fungsional.",
    specifications: {
      area: "45 m²",
      duration: "3-4 minggu",
      materials: ["Parket kayu", "Sofa premium", "Lampu gantung modern"],
      colors: ["Putih", "Abu-abu", "Coklat kayu"]
    },
    tags: ["modern", "minimalis", "ruang-tamu", "open-space"],
    designer: "Andi Pratama",
    completed: true,
    rating: 4.8,
    reviews: 24
  },
  {
    id: 2,
    title: "Elegant Master Bedroom",
    category: "Interior Design",
    style: "Contemporary",
    price: 18000000,
    pricePerM2: 1800000,
    image: "https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=400",
    thumbnail: "https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=200",
    gallery: [
      "https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=800",
      "https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=800",
      "https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=800"
    ],
    description: "Kamar tidur utama dengan desain elegan dan storage yang optimal.",
    specifications: {
      area: "30 m²",
      duration: "2-3 minggu",
      materials: ["Tempat tidur custom", "Lemari built-in", "Lighting ambient"],
      colors: ["Krem", "Gold accent", "Putih"]
    },
    tags: ["contemporary", "kamar-tidur", "elegant", "storage"],
    designer: "Sari Dewi",
    completed: true,
    rating: 4.9,
    reviews: 18
  },
  {
    id: 3,
    title: "Modern Kitchen Set",
    category: "Interior Design",
    style: "Modern",
    price: 35000000,
    pricePerM2: 3500000,
    image: "https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=400",
    thumbnail: "https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=200",
    gallery: [
      "https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=800",
      "https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=800",
      "https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=800"
    ],
    description: "Kitchen set modern dengan island counter dan appliances lengkap.",
    specifications: {
      area: "25 m²",
      duration: "4-5 minggu",
      materials: ["Granit countertop", "Cabinet custom", "Kitchen island"],
      colors: ["Putih", "Hitam", "Stainless steel"]
    },
    tags: ["modern", "kitchen", "island", "appliances"],
    designer: "Budi Santoso",
    completed: true,
    rating: 4.7,
    reviews: 32
  },
  {
    id: 4,
    title: "Cozy Family Room",
    category: "Interior Design",
    style: "Scandinavian",
    price: 22000000,
    pricePerM2: 2200000,
    image: "https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=400",
    thumbnail: "https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=200",
    gallery: [
      "https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=800",
      "https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=800",
      "https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=800"
    ],
    description: "Family room dengan nuansa Scandinavian yang hangat dan nyaman.",
    specifications: {
      area: "35 m²",
      duration: "3-4 minggu",
      materials: ["Kayu solid", "Fabric sofa", "Rug premium"],
      colors: ["Putih", "Kayu natural", "Abu-abu"]
    },
    tags: ["scandinavian", "family-room", "cozy", "natural"],
    designer: "Lisa Anggraini",
    completed: true,
    rating: 4.6,
    reviews: 15
  },
  {
    id: 5,
    title: "Modern Office Space",
    category: "Interior Design",
    style: "Industrial",
    price: 40000000,
    pricePerM2: 2000000,
    image: "https://images.unsplash.com/photo-1497366216548-37526070297c?w=400",
    thumbnail: "https://images.unsplash.com/photo-1497366216548-37526070297c?w=200",
    gallery: [
      "https://images.unsplash.com/photo-1497366216548-37526070297c?w=800",
      "https://images.unsplash.com/photo-1497366216548-37526070297c?w=800",
      "https://images.unsplash.com/photo-1497366216548-37526070297c?w=800"
    ],
    description: "Ruang kerja modern dengan konsep industrial dan teknologi terintegrasi.",
    specifications: {
      area: "60 m²",
      duration: "5-6 minggu",
      materials: ["Meja kerja custom", "Kursi ergonomis", "Storage wall"],
      colors: ["Hitam", "Abu-abu", "Accent orange"]
    },
    tags: ["industrial", "office", "modern", "ergonomic"],
    designer: "Tommy Wijaya",
    completed: false,
    rating: 0,
    reviews: 0
  },
  {
    id: 6,
    title: "Luxury Bathroom Design",
    category: "Interior Design",
    style: "Luxury",
    price: 28000000,
    pricePerM2: 4000000,
    image: "https://images.unsplash.com/photo-1552321554-5fefe8c9ef14?w=400",
    thumbnail: "https://images.unsplash.com/photo-1552321554-5fefe8c9ef14?w=200",
    gallery: [
      "https://images.unsplash.com/photo-1552321554-5fefe8c9ef14?w=800",
      "https://images.unsplash.com/photo-1552321554-5fefe8c9ef14?w=800",
      "https://images.unsplash.com/photo-1552321554-5fefe8c9ef14?w=800"
    ],
    description: "Bathroom mewah dengan bathtub premium dan finishing berkualitas tinggi.",
    specifications: {
      area: "15 m²",
      duration: "3-4 minggu",
      materials: ["Marble tiles", "Premium bathtub", "Smart mirror"],
      colors: ["Putih marmer", "Gold accent", "Hitam"]
    },
    tags: ["luxury", "bathroom", "marble", "premium"],
    designer: "Indira Sari",
    completed: true,
    rating: 4.9,
    reviews: 21
  }
];

// Demo Customer Testimonials
const testimonials = [
  {
    id: 1,
    name: "Ibu Sari Wulandari",
    avatar: "https://images.unsplash.com/photo-1494790108755-2616b612b192?w=100",
    rating: 5,
    comment: "Pelayanan yang sangat memuaskan! Tim Daiku Interior sangat profesional dan hasil akhirnya melebihi expectations. Highly recommended!",
    project: "Modern Living Room",
    date: "2024-01-15",
    location: "Pekanbaru"
  },
  {
    id: 2,
    name: "Bapak Ahmad Rizky",
    avatar: "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=100",
    rating: 5,
    comment: "Desain kitchen set yang dibuat sangat fungsional dan estetik. Kualitas material juga premium. Terima kasih Daiku Interior!",
    project: "Modern Kitchen Set",
    date: "2024-01-08",
    location: "Pekanbaru"
  },
  {
    id: 3,
    name: "Ibu Lisa Maharani",
    avatar: "https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=100",
    rating: 4,
    comment: "Proses design dan execution sangat smooth. Tim sangat komunikatif dan fleksibel dengan budget. Hasil akhir sesuai dengan keinginan.",
    project: "Elegant Bedroom",
    date: "2023-12-22",
    location: "Pekanbaru"
  }
];

// Demo Orders Data
const orders = [
  {
    id: "ORD-2024-001",
    customerId: "CUST-001",
    customerName: "Sari Wulandari",
    customerEmail: "sari.wulan@email.com",
    customerPhone: "0812-3456-7890",
    designId: 1,
    designTitle: "Modern Minimalist Living Room",
    status: "completed",
    priority: "high",
    totalAmount: 25000000,
    downPayment: 7500000,
    remainingPayment: 0,
    orderDate: "2024-01-02",
    startDate: "2024-01-15",
    completionDate: "2024-02-10",
    estimatedCompletion: "2024-02-10",
    designerId: "DES-001",
    designerName: "Andi Pratama",
    address: "Jl. Sudirman No. 123, Pekanbaru",
    area: "45 m²",
    notes: "Klien request tambahan storage di area TV",
    projectStage: "completed",
    progressPercentage: 100,
    paymentStatus: "paid",
    paymentProof: "receipt-ORD-2024-001.jpg"
  },
  {
    id: "ORD-2024-002",
    customerId: "CUST-002",
    customerName: "Ahmad Rizky",
    customerEmail: "ahmad.rizky@email.com",
    customerPhone: "0813-4567-8901",
    designId: 3,
    designTitle: "Modern Kitchen Set",
    status: "in_progress",
    priority: "medium",
    totalAmount: 35000000,
    downPayment: 10500000,
    remainingPayment: 24500000,
    orderDate: "2024-01-05",
    startDate: "2024-01-20",
    completionDate: null,
    estimatedCompletion: "2024-02-25",
    designerId: "DES-003",
    designerName: "Budi Santoso",
    address: "Jl. Jendral Sudirman No. 456, Pekanbaru",
    area: "25 m²",
    notes: "Include kitchen island with breakfast bar",
    projectStage: "construction",
    progressPercentage: 65,
    paymentStatus: "partial",
    paymentProof: "receipt-ORD-2024-002.jpg"
  },
  {
    id: "ORD-2024-003",
    customerId: "CUST-003",
    customerName: "Lisa Maharani",
    customerEmail: "lisa.maharani@email.com",
    customerPhone: "0814-5678-9012",
    designId: 2,
    designTitle: "Elegant Master Bedroom",
    status: "pending",
    priority: "low",
    totalAmount: 18000000,
    downPayment: 0,
    remainingPayment: 18000000,
    orderDate: "2024-01-28",
    startDate: null,
    completionDate: null,
    estimatedCompletion: "2024-03-15",
    designerId: "DES-002",
    designerName: "Sari Dewi",
    address: "Jl. Ahmad Yani No. 789, Pekanbaru",
    area: "30 m²",
    notes: "Prefer soft colors with gold accents",
    projectStage: "design",
    progressPercentage: 15,
    paymentStatus: "unpaid",
    paymentProof: null
  }
];

// Demo Chat Messages Data
const chatMessages = [
  {
    id: 1,
    orderId: "ORD-2024-001",
    senderId: "CUST-001",
    senderName: "Sari Wulandari",
    senderType: "customer",
    message: "Halo, bagaimana progress pengerjaan living room saya?",
    timestamp: "2024-01-25 10:30",
    read: true
  },
  {
    id: 2,
    orderId: "ORD-2024-001",
    senderId: "DES-001",
    senderName: "Andi Pratama",
    senderType: "designer",
    message: "Halo Bu Sari, saat ini sudah 80% selesai. Estimasi selesai akhir minggu ini.",
    timestamp: "2024-01-25 11:15",
    read: true
  },
  {
    id: 3,
    orderId: "ORD-2024-002",
    senderId: "CUST-002",
    senderName: "Ahmad Rizky",
    senderType: "customer",
    message: "Apakah kitchen island sudah mulai dipasang?",
    timestamp: "2024-01-26 14:20",
    read: false
  },
  {
    id: 4,
    orderId: "ORD-2024-002",
    senderId: "DES-003",
    senderName: "Budi Santoso",
    senderType: "designer",
    message: "Ya Pak Ahmad, kitchen island sedang dalam proses pemasangan. Akan selesai 2 hari lagi.",
    timestamp: "2024-01-26 15:45",
    read: false
  }
];

// Demo Users Data
const users = [
  {
    id: "CUST-001",
    name: "Sari Wulandari",
    email: "sari.wulan@email.com",
    phone: "0812-3456-7890",
    role: "customer",
    avatar: "https://images.unsplash.com/photo-1494790108755-2616b612b192?w=100",
    address: "Jl. Sudirman No. 123, Pekanbaru",
    joinDate: "2023-12-01",
    totalOrders: 2,
    totalInvestment: 43000000,
    status: "active"
  },
  {
    id: "DES-001",
    name: "Andi Pratama",
    email: "andi.pratama@daikuinterior.com",
    phone: "0811-1234-5678",
    role: "designer",
    avatar: "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=100",
    specialization: "Modern & Minimalist",
    experience: "5 years",
    completedProjects: 45,
    rating: 4.8,
    status: "active"
  },
  {
    id: "ADM-001",
    name: "Diana Kusuma",
    email: "diana.kusuma@daikuinterior.com",
    phone: "0811-9876-5432",
    role: "admin",
    avatar: "https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=100",
    department: "Operations",
    joinDate: "2023-01-01",
    status: "active"
  }
];

// Demo Payment Data
const payments = [
  {
    id: "PAY-2024-001",
    orderId: "ORD-2024-001",
    customerName: "Sari Wulandari",
    amount: 7500000,
    paymentType: "down_payment",
    paymentMethod: "bank_transfer",
    bankName: "BCA",
    accountNumber: "1234567890",
    uniqueCode: "001",
    totalWithCode: 7500001,
    status: "verified",
    paymentDate: "2024-01-05",
    verificationDate: "2024-01-05",
    receiptFile: "receipt-PAY-2024-001.jpg",
    verifiedBy: "ADM-001"
  },
  {
    id: "PAY-2024-002",
    orderId: "ORD-2024-002",
    customerName: "Ahmad Rizky",
    amount: 10500000,
    paymentType: "down_payment",
    paymentMethod: "bank_transfer",
    bankName: "Mandiri",
    accountNumber: "9876543210",
    uniqueCode: "002",
    totalWithCode: 10500002,
    status: "pending",
    paymentDate: "2024-01-08",
    verificationDate: null,
    receiptFile: "receipt-PAY-2024-002.jpg",
    verifiedBy: null
  }
];

// Demo Notifications Data
const notifications = [
  {
    id: 1,
    userId: "CUST-001",
    type: "order_update",
    title: "Project Update",
    message: "Your living room design project is 90% complete",
    read: false,
    timestamp: "2024-01-28 09:30",
    data: { orderId: "ORD-2024-001" }
  },
  {
    id: 2,
    userId: "CUST-002",
    type: "payment_reminder",
    title: "Payment Reminder",
    message: "Next payment installment is due in 3 days",
    read: false,
    timestamp: "2024-01-27 14:00",
    data: { orderId: "ORD-2024-002", amount: 12000000 }
  },
  {
    id: 3,
    userId: "DES-001",
    type: "new_message",
    title: "New Message",
    message: "You have a new message from Sari Wulandari",
    read: true,
    timestamp: "2024-01-26 16:45",
    data: { orderId: "ORD-2024-001", senderId: "CUST-001" }
  }
];

// Demo Statistics Data
const statistics = {
  totalOrders: 156,
  totalRevenue: 2450000000,
  activeProjects: 23,
  completedProjects: 133,
  totalCustomers: 89,
  newCustomersThisMonth: 12,
  averageProjectValue: 28500000,
  customerSatisfactionRate: 4.7,
  monthlyRevenue: [
    { month: "Jan", revenue: 185000000 },
    { month: "Feb", revenue: 220000000 },
    { month: "Mar", revenue: 195000000 },
    { month: "Apr", revenue: 245000000 },
    { month: "May", revenue: 265000000 },
    { month: "Jun", revenue: 230000000 }
  ],
  topDesigners: [
    { name: "Andi Pratama", orders: 25, revenue: 650000000 },
    { name: "Sari Dewi", orders: 22, revenue: 580000000 },
    { name: "Budi Santoso", orders: 20, revenue: 720000000 }
  ]
};

// Local Storage Management Functions
const StorageManager = {
  // Get data from localStorage with fallback to demo data
  getData: function(key, fallbackData) {
    try {
      const stored = localStorage.getItem('daiku_' + key);
      return stored ? JSON.parse(stored) : fallbackData;
    } catch (e) {
      console.warn('Failed to parse stored data for', key, '- using fallback');
      return fallbackData;
    }
  },

  // Save data to localStorage
  setData: function(key, data) {
    try {
      localStorage.setItem('daiku_' + key, JSON.stringify(data));
      return true;
    } catch (e) {
      console.error('Failed to save data to localStorage:', e);
      return false;
    }
  },

  // Initialize all demo data if not exists
  initializeData: function() {
    if (!localStorage.getItem('daiku_initialized')) {
      this.setData('designs', designPortfolio);
      this.setData('testimonials', testimonials);
      this.setData('orders', orders);
      this.setData('users', users);
      this.setData('chats', chatMessages);
      this.setData('payments', payments);
      this.setData('notifications', notifications);
      this.setData('statistics', statistics);
      this.setData('initialized', true);
    }
  },

  // Clear all stored data
  clearAllData: function() {
    const keys = ['designs', 'testimonials', 'orders', 'users', 'chats', 'payments', 'notifications', 'statistics', 'initialized'];
    keys.forEach(key => localStorage.removeItem('daiku_' + key));
  }
};

// Utility Functions
const Utils = {
  // Format currency to Indonesian Rupiah
  formatCurrency: function(amount) {
    return new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0
    }).format(amount);
  },

  // Format date to Indonesian format
  formatDate: function(dateString) {
    const date = new Date(dateString);
    return new Intl.DateTimeFormat('id-ID', {
      year: 'numeric',
      month: 'long',
      day: 'numeric'
    }).format(date);
  },

  // Format relative time
  formatRelativeTime: function(dateString) {
    const date = new Date(dateString);
    const now = new Date();
    const diffInSeconds = Math.floor((now - date) / 1000);
    
    if (diffInSeconds < 60) return 'Baru saja';
    if (diffInSeconds < 3600) return Math.floor(diffInSeconds / 60) + ' menit yang lalu';
    if (diffInSeconds < 86400) return Math.floor(diffInSeconds / 3600) + ' jam yang lalu';
    if (diffInSeconds < 2592000) return Math.floor(diffInSeconds / 86400) + ' hari yang lalu';
    
    return this.formatDate(dateString);
  },

  // Generate unique ID
  generateId: function(prefix = '') {
    return prefix + Date.now().toString(36) + Math.random().toString(36).substr(2);
  },

  // Debounce function
  debounce: function(func, wait) {
    let timeout;
    return function executedFunction(...args) {
      const later = () => {
        clearTimeout(timeout);
        func(...args);
      };
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
    };
  },

  // Slugify text
  slugify: function(text) {
    return text
      .toLowerCase()
      .replace(/[^\w\s-]/g, '')
      .replace(/[\s_-]+/g, '-')
      .replace(/^-+|-+$/g, '');
  }
};

// Initialize demo data on script load
document.addEventListener('DOMContentLoaded', function() {
  StorageManager.initializeData();
});

// Export for use in other scripts
if (typeof module !== 'undefined' && module.exports) {
  module.exports = {
    designPortfolio,
    testimonials,
    orders,
    users,
    chatMessages,
    payments,
    notifications,
    statistics,
    StorageManager,
    Utils
  };
}
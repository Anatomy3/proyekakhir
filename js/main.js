// === DAIKU INTERIOR MAIN JAVASCRIPT ===

// Global App State
const DaikuApp = {
  currentUser: null,
  currentPage: '',
  isAuthenticated: false,
  notifications: [],
  
  // Initialize the application
  init: function() {
    this.initializeComponents();
    this.bindEvents();
    this.checkAuthentication();
    this.loadNotifications();
  },

  // Initialize common components
  initializeComponents: function() {
    this.initNavigation();
    this.initModals();
    this.initTooltips();
    this.initMobileMenu();
    this.initScrollEffects();
    this.initAnimations();
  },

  // Bind global events
  bindEvents: function() {
    // Mobile menu toggle
    document.addEventListener('click', (e) => {
      if (e.target.matches('.mobile-menu-toggle')) {
        this.toggleMobileMenu();
      }
    });

    // Modal triggers
    document.addEventListener('click', (e) => {
      if (e.target.matches('[data-modal-target]')) {
        const targetId = e.target.getAttribute('data-modal-target');
        this.showModal(targetId);
      }
      if (e.target.matches('[data-modal-close]')) {
        this.hideModal(e.target.closest('.modal'));
      }
    });

    // Form submissions
    document.addEventListener('submit', (e) => {
      if (e.target.matches('.ajax-form')) {
        e.preventDefault();
        this.handleFormSubmission(e.target);
      }
    });

    // Dropdown toggles
    document.addEventListener('click', (e) => {
      if (e.target.matches('.dropdown-toggle')) {
        e.preventDefault();
        this.toggleDropdown(e.target);
      }
    });

    // Tab switching
    document.addEventListener('click', (e) => {
      if (e.target.matches('.nav-tabs .nav-link')) {
        e.preventDefault();
        this.switchTab(e.target);
      }
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', (e) => {
      if (!e.target.matches('.dropdown-toggle')) {
        this.closeAllDropdowns();
      }
    });
  },

  // Check user authentication
  checkAuthentication: function() {
    const storedUser = localStorage.getItem('daiku_currentUser');
    if (storedUser) {
      this.currentUser = JSON.parse(storedUser);
      this.isAuthenticated = true;
      this.updateUIForAuthenticatedUser();
    }
  },

  // Update UI for authenticated users
  updateUIForAuthenticatedUser: function() {
    console.log('updateUIForAuthenticatedUser called for user:', this.currentUser);
    const userInfo = document.querySelector('.user-info');
    const loginLinks = document.querySelectorAll('.login-required');
    const guestLinks = document.querySelectorAll('.guest-only');
    const adminOnlyElements = document.querySelectorAll('.admin-only');
    const customerOnlyElements = document.querySelectorAll('.customer-only');

    // Update user profile in navbar
    const userProfile = document.querySelector('.user-profile');
    const userNameSpan = document.querySelector('.user-name');
    const userImg = document.querySelector('.user-profile img');

    if (userProfile && this.currentUser) {
      if (userNameSpan) userNameSpan.textContent = this.currentUser.name;
      if (userImg) userImg.src = this.currentUser.avatar;
    }

    if (userInfo && this.currentUser) {
      userInfo.innerHTML = `
        <div class="d-flex align-items-center">
          <img src="${this.currentUser.avatar}" alt="${this.currentUser.name}" 
               class="rounded-circle me-2" width="32" height="32">
          <span>${this.currentUser.name}</span>
        </div>
      `;
    }

    // Show authenticated user elements
    loginLinks.forEach(el => el.style.display = 'block');
    guestLinks.forEach(el => el.style.display = 'none');
    
    // Show admin elements if user is admin
    if (this.currentUser && this.currentUser.role === 'admin') {
      console.log('Showing admin elements for admin user:', this.currentUser.name);
      console.log('Admin elements found:', adminOnlyElements.length);
      adminOnlyElements.forEach(el => {
        el.style.display = 'block';
        console.log('Showing admin element:', el);
      });
      // Hide customer-only elements for admin
      customerOnlyElements.forEach(el => {
        el.style.display = 'none';
        console.log('Hiding customer element for admin:', el);
      });
    } else if (this.currentUser && this.currentUser.role === 'customer') {
      // Show customer elements and hide admin elements
      customerOnlyElements.forEach(el => {
        el.style.display = 'block';
      });
      adminOnlyElements.forEach(el => {
        el.style.display = 'none';
      });
    }
  },

  // Logout function
  logout: function() {
    localStorage.removeItem('daiku_currentUser');
    this.currentUser = null;
    this.isAuthenticated = false;
    this.notifications = [];
    
    // Update UI
    const loginLinks = document.querySelectorAll('.login-required');
    const guestLinks = document.querySelectorAll('.guest-only');
    const adminOnlyElements = document.querySelectorAll('.admin-only');
    const customerOnlyElements = document.querySelectorAll('.customer-only');
    
    loginLinks.forEach(el => el.style.display = 'none');
    guestLinks.forEach(el => el.style.display = 'block');
    adminOnlyElements.forEach(el => el.style.display = 'none');
    customerOnlyElements.forEach(el => el.style.display = 'none');
    
    // Show success message and redirect
    this.showToast('Logout Berhasil', 'Anda telah berhasil keluar dari sistem', 'success');
    
    setTimeout(() => {
      window.location.href = 'index.html';
    }, 1500);
  },

  // Initialize navigation
  initNavigation: function() {
    const currentPath = window.location.pathname;
    const navLinks = document.querySelectorAll('.nav-link');
    
    navLinks.forEach(link => {
      if (link.getAttribute('href') === currentPath) {
        link.classList.add('active');
      }
    });
  },

  // Initialize mobile menu
  initMobileMenu: function() {
    const mobileToggle = document.querySelector('.mobile-menu-toggle');
    if (mobileToggle) {
      mobileToggle.innerHTML = '<i class="fas fa-bars"></i>';
    }
  },

  // Toggle mobile menu
  toggleMobileMenu: function() {
    const navMenu = document.querySelector('.navbar-nav');
    const toggleBtn = document.querySelector('.mobile-menu-toggle');
    
    if (navMenu) {
      navMenu.classList.toggle('show');
      
      // Update toggle icon
      const icon = toggleBtn.querySelector('i');
      if (navMenu.classList.contains('show')) {
        icon.className = 'fas fa-times';
      } else {
        icon.className = 'fas fa-bars';
      }
    }
  },

  // Initialize modals
  initModals: function() {
    // Add backdrop click to close
    document.addEventListener('click', (e) => {
      if (e.target.matches('.modal-backdrop')) {
        this.hideModal(e.target.nextElementSibling);
      }
    });

    // ESC key to close modal
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') {
        const activeModal = document.querySelector('.modal.show');
        if (activeModal) {
          this.hideModal(activeModal);
        }
      }
    });
  },

  // Show modal
  showModal: function(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
      // Create backdrop if not exists
      let backdrop = document.querySelector('.modal-backdrop');
      if (!backdrop) {
        backdrop = document.createElement('div');
        backdrop.className = 'modal-backdrop';
        document.body.appendChild(backdrop);
      }

      modal.classList.add('show');
      backdrop.style.display = 'block';
      document.body.style.overflow = 'hidden';
    }
  },

  // Hide modal
  hideModal: function(modal) {
    if (modal) {
      modal.classList.remove('show');
      const backdrop = document.querySelector('.modal-backdrop');
      if (backdrop) {
        backdrop.style.display = 'none';
      }
      document.body.style.overflow = '';
    }
  },

  // Initialize tooltips
  initTooltips: function() {
    const tooltipElements = document.querySelectorAll('[data-tooltip]');
    tooltipElements.forEach(el => {
      el.addEventListener('mouseenter', this.showTooltip.bind(this));
      el.addEventListener('mouseleave', this.hideTooltip.bind(this));
    });
  },

  // Show tooltip
  showTooltip: function(e) {
    const element = e.target;
    const text = element.getAttribute('data-tooltip');
    
    const tooltip = document.createElement('div');
    tooltip.className = 'tooltip';
    tooltip.innerHTML = `<div class="tooltip-inner">${text}</div>`;
    
    document.body.appendChild(tooltip);
    
    const rect = element.getBoundingClientRect();
    tooltip.style.left = rect.left + (rect.width / 2) - (tooltip.offsetWidth / 2) + 'px';
    tooltip.style.top = rect.top - tooltip.offsetHeight - 8 + 'px';
    
    element._tooltip = tooltip;
  },

  // Hide tooltip
  hideTooltip: function(e) {
    const element = e.target;
    if (element._tooltip) {
      document.body.removeChild(element._tooltip);
      element._tooltip = null;
    }
  },

  // Toggle dropdown
  toggleDropdown: function(trigger) {
    const dropdown = trigger.nextElementSibling;
    if (dropdown && dropdown.classList.contains('dropdown-menu')) {
      dropdown.classList.toggle('show');
    }
  },

  // Close all dropdowns
  closeAllDropdowns: function() {
    const dropdowns = document.querySelectorAll('.dropdown-menu.show');
    dropdowns.forEach(dropdown => dropdown.classList.remove('show'));
  },

  // Switch tabs
  switchTab: function(tabLink) {
    const targetId = tabLink.getAttribute('href').substring(1);
    const tabContainer = tabLink.closest('.nav-tabs');
    const contentContainer = tabContainer.nextElementSibling;

    // Update active tab
    tabContainer.querySelectorAll('.nav-link').forEach(link => {
      link.classList.remove('active');
    });
    tabLink.classList.add('active');

    // Update active content
    if (contentContainer && contentContainer.classList.contains('tab-content')) {
      contentContainer.querySelectorAll('.tab-pane').forEach(pane => {
        pane.classList.remove('show', 'active');
      });
      
      const targetPane = contentContainer.querySelector('#' + targetId);
      if (targetPane) {
        targetPane.classList.add('show', 'active');
      }
    }
  },

  // Handle form submissions
  handleFormSubmission: function(form) {
    const formData = new FormData(form);
    const formAction = form.getAttribute('action') || '#';
    const formMethod = form.getAttribute('method') || 'POST';

    // Show loading state
    const submitBtn = form.querySelector('[type="submit"]');
    const originalText = submitBtn.textContent;
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<span class="spinner spinner-sm me-2"></span>Processing...';

    // Simulate API call
    setTimeout(() => {
      // Reset form
      form.reset();
      
      // Reset button
      submitBtn.disabled = false;
      submitBtn.textContent = originalText;
      
      // Show success message
      this.showToast('Success!', 'Form submitted successfully', 'success');
      
      // Close modal if form is in modal
      const modal = form.closest('.modal');
      if (modal) {
        this.hideModal(modal);
      }
    }, 1500);
  },

  // Load notifications
  loadNotifications: function() {
    if (this.isAuthenticated && this.currentUser) {
      this.notifications = StorageManager.getData('notifications', [])
        .filter(n => n.userId === this.currentUser.id);
      this.updateNotificationBadge();
    }
  },

  // Update notification badge
  updateNotificationBadge: function() {
    const badge = document.querySelector('.notification-badge');
    const unreadCount = this.notifications.filter(n => !n.read).length;
    
    if (badge) {
      if (unreadCount > 0) {
        badge.textContent = unreadCount > 99 ? '99+' : unreadCount;
        badge.style.display = 'inline-block';
      } else {
        badge.style.display = 'none';
      }
    }
  },

  // Show toast notification
  showToast: function(title, message, type = 'info') {
    const toastContainer = this.getOrCreateToastContainer();
    
    const toast = document.createElement('div');
    toast.className = `toast ${type}`;
    toast.innerHTML = `
      <div class="toast-header">
        <strong class="me-auto">${title}</strong>
        <button type="button" class="btn-close" onclick="this.closest('.toast').remove()"></button>
      </div>
      <div class="toast-body">${message}</div>
    `;
    
    toastContainer.appendChild(toast);
    
    // Show toast
    setTimeout(() => toast.classList.add('show'), 100);
    
    // Auto remove after 5 seconds
    setTimeout(() => {
      toast.classList.remove('show');
      setTimeout(() => toast.remove(), 300);
    }, 5000);
  },

  // Get or create toast container
  getOrCreateToastContainer: function() {
    let container = document.querySelector('.toast-container');
    if (!container) {
      container = document.createElement('div');
      container.className = 'toast-container';
      document.body.appendChild(container);
    }
    return container;
  },

  // Search functionality
  performSearch: function(query, searchIn = 'designs') {
    const data = StorageManager.getData(searchIn, []);
    
    if (!query.trim()) return data;
    
    const searchQuery = query.toLowerCase();
    
    return data.filter(item => {
      const searchFields = [];
      
      if (searchIn === 'designs') {
        searchFields.push(item.title, item.description, item.category, item.style, ...(item.tags || []));
      } else if (searchIn === 'orders') {
        searchFields.push(item.id, item.customerName, item.designTitle, item.status);
      }
      
      return searchFields.some(field => 
        field && field.toString().toLowerCase().includes(searchQuery)
      );
    });
  },

  // Filter data
  filterData: function(data, filters) {
    return data.filter(item => {
      return Object.keys(filters).every(key => {
        const filterValue = filters[key];
        if (!filterValue || filterValue === 'all') return true;
        
        const itemValue = item[key];
        if (Array.isArray(itemValue)) {
          return itemValue.includes(filterValue);
        }
        
        return itemValue === filterValue;
      });
    });
  },

  // Sort data
  sortData: function(data, sortBy, order = 'asc') {
    return [...data].sort((a, b) => {
      let aVal = a[sortBy];
      let bVal = b[sortBy];
      
      // Handle dates
      if (sortBy.includes('Date') || sortBy.includes('date')) {
        aVal = new Date(aVal);
        bVal = new Date(bVal);
      }
      
      // Handle numbers
      if (typeof aVal === 'number' && typeof bVal === 'number') {
        return order === 'asc' ? aVal - bVal : bVal - aVal;
      }
      
      // Handle strings
      if (typeof aVal === 'string' && typeof bVal === 'string') {
        return order === 'asc' 
          ? aVal.localeCompare(bVal)
          : bVal.localeCompare(aVal);
      }
      
      return 0;
    });
  },

  // Paginate data
  paginateData: function(data, page = 1, itemsPerPage = 9) {
    const startIndex = (page - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;
    
    return {
      data: data.slice(startIndex, endIndex),
      totalPages: Math.ceil(data.length / itemsPerPage),
      currentPage: page,
      totalItems: data.length,
      hasNextPage: endIndex < data.length,
      hasPrevPage: page > 1
    };
  },

  // Animate element
  animateElement: function(element, animation = 'fadeIn', duration = 300) {
    element.style.opacity = '0';
    element.style.transform = 'translateY(20px)';
    element.style.transition = `all ${duration}ms ease`;
    
    setTimeout(() => {
      element.style.opacity = '1';
      element.style.transform = 'translateY(0)';
    }, 10);
  },

  // Format number
  formatNumber: function(num) {
    return new Intl.NumberFormat('id-ID').format(num);
  },

  // Validate email
  validateEmail: function(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  },

  // Validate phone
  validatePhone: function(phone) {
    const phoneRegex = /^(\+62|62|0)[0-9]{9,13}$/;
    return phoneRegex.test(phone.replace(/[\s-]/g, ''));
  },

  // Handle file upload
  handleFileUpload: function(input, callback) {
    const files = input.files;
    if (files.length === 0) return;

    Array.from(files).forEach(file => {
      if (file.size > 5 * 1024 * 1024) { // 5MB limit
        this.showToast('Error', 'File size must be less than 5MB', 'danger');
        return;
      }

      const reader = new FileReader();
      reader.onload = function(e) {
        callback(e.target.result, file);
      };
      reader.readAsDataURL(file);
    });
  },

  // Initialize lazy loading for images
  initLazyLoading: function() {
    const images = document.querySelectorAll('img[data-src]');
    
    const imageObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const img = entry.target;
          img.src = img.dataset.src;
          img.classList.remove('lazy');
          observer.unobserve(img);
        }
      });
    });

    images.forEach(img => imageObserver.observe(img));
  },

  // Copy to clipboard
  copyToClipboard: function(text) {
    navigator.clipboard.writeText(text).then(() => {
      this.showToast('Copied!', 'Text copied to clipboard', 'success');
    }).catch(() => {
      // Fallback for older browsers
      const textArea = document.createElement('textarea');
      textArea.value = text;
      document.body.appendChild(textArea);
      textArea.select();
      document.execCommand('copy');
      document.body.removeChild(textArea);
      this.showToast('Copied!', 'Text copied to clipboard', 'success');
    });
  },

  // Initialize scroll effects
  initScrollEffects: function() {
    const navbar = document.querySelector('.navbar');
    let lastScrollY = window.scrollY;

    window.addEventListener('scroll', () => {
      const currentScrollY = window.scrollY;

      // Add/remove scrolled class for navbar styling
      if (navbar) {
        if (currentScrollY > 50) {
          navbar.classList.add('scrolled');
        } else {
          navbar.classList.remove('scrolled');
        }
      }

      // Smooth scroll animations for cards and sections
      this.animateOnScroll();

      lastScrollY = currentScrollY;
    });
  },

  // Initialize animations
  initAnimations: function() {
    // Add intersection observer for fade-in animations
    const observerOptions = {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('animate-in');
        }
      });
    }, observerOptions);

    // Observe elements for animation
    const animateElements = document.querySelectorAll('.card, .feature-item, .stats-item, .testimonial-item, .section-header');
    animateElements.forEach(el => {
      el.classList.add('animate-on-scroll');
      observer.observe(el);
    });
  },

  // Animate elements on scroll
  animateOnScroll: function() {
    const elements = document.querySelectorAll('.animate-on-scroll:not(.animate-in)');
    
    elements.forEach(element => {
      const elementTop = element.getBoundingClientRect().top;
      const elementVisible = 150;
      
      if (elementTop < window.innerHeight - elementVisible) {
        element.classList.add('animate-in');
      }
    });
  },

  // Smooth scroll to element
  scrollToElement: function(selector, offset = 80) {
    const element = document.querySelector(selector);
    if (element) {
      const elementPosition = element.getBoundingClientRect().top + window.pageYOffset;
      const offsetPosition = elementPosition - offset;

      window.scrollTo({
        top: offsetPosition,
        behavior: 'smooth'
      });
    }
  },

  // Enhanced button click effects
  addButtonEffects: function() {
    document.addEventListener('click', (e) => {
      if (e.target.closest('.btn')) {
        const button = e.target.closest('.btn');
        
        // Create ripple effect
        const ripple = document.createElement('span');
        const rect = button.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = e.clientX - rect.left - size / 2;
        const y = e.clientY - rect.top - size / 2;
        
        ripple.style.width = ripple.style.height = size + 'px';
        ripple.style.left = x + 'px';
        ripple.style.top = y + 'px';
        ripple.classList.add('ripple');
        
        button.appendChild(ripple);
        
        setTimeout(() => {
          ripple.remove();
        }, 600);
      }
    });
  }
};

// Initialize app when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
  DaikuApp.init();
});

// Smart Dashboard Routing
DaikuApp.goToDashboard = function() {
  // Load user from localStorage first
  this.checkAuthentication();
  console.log('goToDashboard - Current user:', this.currentUser);
  
  // Check if user is logged in
  if (!this.currentUser) {
    window.location.href = 'auth.html';
    return;
  }

  // Route based on user role
  console.log('goToDashboard - Routing user with role:', this.currentUser.role);
  switch(this.currentUser.role) {
    case 'admin':
      console.log('goToDashboard - Redirecting to admin dashboard');
      window.location.href = 'admin-dashboard.html';
      break;
    case 'customer':
      window.location.href = 'customer-dashboard.html';
      break;
    case 'designer':
      // If designer dashboard exists, route there, otherwise customer dashboard
      window.location.href = 'customer-dashboard.html';
      break;
    default:
      window.location.href = 'customer-dashboard.html';
  }
};

// Export for global access
window.DaikuApp = DaikuApp;
<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Daiku Interior & Eksterior</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    @stack('styles')
</head>
<body class="bg-gray-50 font-sans antialiased">
    <header class="bg-white shadow-sm">
        <!-- Top Bar -->
        <div class="bg-[#5D4037] text-white text-sm">
            <div class="container mx-auto px-4 py-2 flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <a href="mailto:info@daiku.co.id" class="flex items-center hover:text-amber-200">
                        <i class="fas fa-envelope mr-2"></i> info@daiku.co.id
                    </a>
                    <a href="tel:+6281234567890" class="flex items-center hover:text-amber-200">
                        <i class="fas fa-phone mr-2"></i> +62 812-3456-7890
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="#" class="hover:text-amber-200"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="hover:text-amber-200"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="hover:text-amber-200"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
        </div>
        
        <!-- Main Navigation -->
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center">
                    <span class="text-2xl font-bold text-[#5D4037]">DAIKU</span>
                    <span class="text-lg text-amber-600 ml-1">Interior & Eksterior</span>
                </a>
                
                <!-- Navigation Links -->
                <nav class="hidden md:flex space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-amber-600 font-medium">Beranda</a>
                    <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-amber-600 font-medium">Produk</a>
                    <a href="#" class="text-gray-700 hover:text-amber-600 font-medium">Kustomisasi</a>
                    <a href="#" class="text-gray-700 hover:text-amber-600 font-medium">Tentang Kami</a>
                    <a href="#" class="text-gray-700 hover:text-amber-600 font-medium">Kontak</a>
                </nav>
                
                <!-- User Actions -->
                <div class="flex items-center space-x-6">
                    <a href="#" class="text-gray-700 hover:text-amber-600">
                        <i class="fas fa-search text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-700 hover:text-amber-600 relative">
                        <i class="fas fa-heart text-xl"></i>
                        <span class="absolute -top-2 -right-2 bg-amber-600 text-white rounded-full text-xs w-5 h-5 flex items-center justify-center">0</span>
                    </a>
                    <a href="#" class="text-gray-700 hover:text-amber-600 relative">
                        <i class="fas fa-shopping-cart text-xl"></i>
                        <span class="absolute -top-2 -right-2 bg-amber-600 text-white rounded-full text-xs w-5 h-5 flex items-center justify-center">0</span>
                    </a>
                    <a href="#" class="text-gray-700 hover:text-amber-600">
                        <i class="fas fa-user text-xl"></i>
                    </a>
                    
                    <!-- Mobile Menu Button -->
                    <button class="md:hidden text-gray-700 focus:outline-none">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-[#2C1810] text-white mt-16">
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-semibold mb-4">DAIKU Interior & Eksterior</h3>
                    <p class="text-gray-300 mb-4">Solusi untuk kebutuhan interior dan eksterior berkualitas dengan desain kustom sesuai keinginan Anda.</p>
                    <div class="flex space-x-4 mt-4">
                        <a href="#" class="text-white hover:text-amber-300"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white hover:text-amber-300"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white hover:text-amber-300"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-xl font-semibold mb-4">Kategori</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-amber-300">Kitchen Set</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-amber-300">Wardrobe</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-amber-300">TV Cabinet</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-amber-300">Meja & Kursi</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-amber-300">Rak Buku</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-xl font-semibold mb-4">Tautan</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-amber-300">Tentang Kami</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-amber-300">FAQ</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-amber-300">Kebijakan Privasi</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-amber-300">Syarat & Ketentuan</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-amber-300">Hubungi Kami</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-xl font-semibold mb-4">Kontak</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3 text-amber-400"></i>
                            <span>Jl. Contoh No. 123, Kota Semarang, Jawa Tengah, Indonesia</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-3 text-amber-400"></i>
                            <span>+62 812-3456-7890</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-3 text-amber-400"></i>
                            <span>info@daiku.co.id</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-10 pt-6 text-center text-gray-300">
                <p>&copy; {{ date('Y') }} DAIKU Interior & Eksterior. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
    
    @stack('scripts')
</body>
</html>
<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <!-- Hero Section -->
    <section class="relative">
        <div class="hero-slider overflow-hidden h-[500px] md:h-[600px] relative">
            <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1586023492125-27b2c045efd7?q=80&w=2158&auto=format&fit=crop');">
                <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            </div>
            <div class="container mx-auto px-4 h-full flex items-center relative z-10">
                <div class="max-w-xl text-white">
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">Desain Interior Impian Anda</h1>
                    <p class="text-lg mb-8">Wujudkan ruangan impian Anda dengan desain interior kustom yang elegan dan berkualitas tinggi.</p>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('products.index') }}" class="px-6 py-3 bg-amber-600 hover:bg-amber-700 text-white font-medium rounded-md transition duration-300">
                            Lihat Produk
                        </a>
                        <a href="#" class="px-6 py-3 bg-transparent hover:bg-white hover:text-amber-700 text-white font-medium rounded-md border-2 border-white transition duration-300">
                            Buat Desain Kustom
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Kategori Produk</h2>
                <p class="text-gray-600">Temukan berbagai pilihan produk interior sesuai kebutuhan Anda</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                <a href="#" class="group">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 group-hover:shadow-lg group-hover:-translate-y-1">
                        <div class="h-48 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1556911220-e15b29be8c8f?q=80&w=2070&auto=format&fit=crop" alt="Kitchen Set" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="p-4 text-center">
                            <h3 class="font-semibold text-gray-800 group-hover:text-amber-600 transition-colors duration-300">Kitchen Set</h3>
                        </div>
                    </div>
                </a>
                
                <a href="#" class="group">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 group-hover:shadow-lg group-hover:-translate-y-1">
                        <div class="h-48 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1636247481927-ff9e27430dd8?q=80&w=2070&auto=format&fit=crop" alt="Wardrobe" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="p-4 text-center">
                            <h3 class="font-semibold text-gray-800 group-hover:text-amber-600 transition-colors duration-300">Wardrobe</h3>
                        </div>
                    </div>
                </a>
                
                <a href="#" class="group">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 group-hover:shadow-lg group-hover:-translate-y-1">
                        <div class="h-48 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1615873968403-89e068629265?q=80&w=2070&auto=format&fit=crop" alt="TV Cabinet" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="p-4 text-center">
                            <h3 class="font-semibold text-gray-800 group-hover:text-amber-600 transition-colors duration-300">TV Cabinet</h3>
                        </div>
                    </div>
                </a>
                
                <a href="#" class="group">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 group-hover:shadow-lg group-hover:-translate-y-1">
                        <div class="h-48 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1592078615290-033ee584e267?q=80&w=1964&auto=format&fit=crop" alt="Meja & Kursi" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="p-4 text-center">
                            <h3 class="font-semibold text-gray-800 group-hover:text-amber-600 transition-colors duration-300">Meja & Kursi</h3>
                        </div>
                    </div>
                </a>
                
                <a href="#" class="group">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 group-hover:shadow-lg group-hover:-translate-y-1">
                        <div class="h-48 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1594026112284-02bb6f3352fe?q=80&w=2070&auto=format&fit=crop" alt="Rak Buku" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="p-4 text-center">
                            <h3 class="font-semibold text-gray-800 group-hover:text-amber-600 transition-colors duration-300">Rak Buku</h3>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Produk Unggulan</h2>
                <p class="text-gray-600">Produk interior berkualitas tinggi dengan desain modern dan elegan</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Product Card 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                    <div class="relative h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1556910638-3ebdb75654a4?q=80&w=2070&auto=format&fit=crop" alt="Kitchen Set Modern" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute top-4 right-4 flex flex-col gap-2">
                            <button class="bg-white w-8 h-8 rounded-full flex items-center justify-center text-gray-700 hover:text-amber-600 transition-colors duration-300">
                                <i class="fas fa-heart"></i>
                            </button>
                            <button class="bg-white w-8 h-8 rounded-full flex items-center justify-center text-gray-700 hover:text-amber-600 transition-colors duration-300">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 bg-white bg-opacity-90 py-2 px-3 translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                            <a href="#" class="block text-center text-amber-600 font-medium">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="font-semibold text-gray-800">Kitchen Set Modern</h3>
                            <div class="text-amber-500">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm mb-3">Kitchen set modern dengan material HPL dan handle aluminium.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-bold text-amber-600">Rp 15.000.000</span>
                            <button class="bg-amber-600 hover:bg-amber-700 text-white rounded-full w-10 h-10 flex items-center justify-center transition-colors duration-300">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Product Card 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                    <div class="relative h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1631729371254-42c2892f0e6e?q=80&w=2070&auto=format&fit=crop" alt="Wardrobe Minimalis" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute top-4 right-4 flex flex-col gap-2">
                            <button class="bg-white w-8 h-8 rounded-full flex items-center justify-center text-gray-700 hover:text-amber-600 transition-colors duration-300">
                                <i class="fas fa-heart"></i>
                            </button>
                            <button class="bg-white w-8 h-8 rounded-full flex items-center justify-center text-gray-700 hover:text-amber-600 transition-colors duration-300">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 bg-white bg-opacity-90 py-2 px-3 translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                            <a href="#" class="block text-center text-amber-600 font-medium">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="font-semibold text-gray-800">Wardrobe Minimalis</h3>
                            <div class="text-amber-500">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm mb-3">Lemari pakaian dengan desain minimalis dan fungsional.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-bold text-amber-600">Rp 8.500.000</span>
                            <button class="bg-amber-600 hover:bg-amber-700 text-white rounded-full w-10 h-10 flex items-center justify-center transition-colors duration-300">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Product Card 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                    <div class="relative h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1493663284031-b7e3aefcae8e?q=80&w=2070&auto=format&fit=crop" alt="TV Cabinet Minimalis" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute top-4 right-4 flex flex-col gap-2">
                            <button class="bg-white w-8 h-8 rounded-full flex items-center justify-center text-gray-700 hover:text-amber-600 transition-colors duration-300">
                                <i class="fas fa-heart"></i>
                            </button>
                            <button class="bg-white w-8 h-8 rounded-full flex items-center justify-center text-gray-700 hover:text-amber-600 transition-colors duration-300">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 bg-white bg-opacity-90 py-2 px-3 translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                            <a href="#" class="block text-center text-amber-600 font-medium">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="font-semibold text-gray-800">TV Cabinet Minimalis</h3>
                            <div class="text-amber-500">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm mb-3">Rak TV minimalis dengan ruang penyimpanan yang luas.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-bold text-amber-600">Rp 6.200.000</span>
                            <button class="bg-amber-600 hover:bg-amber-700 text-white rounded-full w-10 h-10 flex items-center justify-center transition-colors duration-300">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Product Card 4 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                    <div class="relative h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1594026112284-02bb6f3352fe?q=80&w=2070&auto=format&fit=crop" alt="Rak Buku Modern" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute top-4 right-4 flex flex-col gap-2">
                            <button class="bg-white w-8 h-8 rounded-full flex items-center justify-center text-gray-700 hover:text-amber-600 transition-colors duration-300">
                                <i class="fas fa-heart"></i>
                            </button>
                            <button class="bg-white w-8 h-8 rounded-full flex items-center justify-center text-gray-700 hover:text-amber-600 transition-colors duration-300">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 bg-white bg-opacity-90 py-2 px-3 translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                            <a href="#" class="block text-center text-amber-600 font-medium">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="font-semibold text-gray-800">Rak Buku Modern</h3>
                            <div class="text-amber-500">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm mb-3">Rak buku modern dengan desain elegan dan fungsional.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-bold text-amber-600">Rp 4.800.000</span>
                            <button class="bg-amber-600 hover:bg-amber-700 text-white rounded-full w-10 h-10 flex items-center justify-center transition-colors duration-300">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-10">
                <a href="{{ route('products.index') }}" class="inline-block px-6 py-3 bg-amber-600 hover:bg-amber-700 text-white font-medium rounded-md transition duration-300">
                    Lihat Semua Produk
                </a>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Mengapa Memilih Kami</h2>
                <p class="text-gray-600">Daiku Interior & Eksterior menawarkan kualitas dan pelayanan terbaik</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Feature 1 -->
                <div class="text-center p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="inline-block p-4 rounded-full bg-amber-100 text-amber-600 mb-4">
                        <i class="fas fa-paint-brush text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-xl mb-2">Desain Kustom</h3>
                    <p class="text-gray-600">Desain interior sesuai keinginan Anda dengan fitur editor kustom yang mudah digunakan</p>
                </div>
                
                <!-- Feature 2 -->
                <div class="text-center p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="inline-block p-4 rounded-full bg-amber-100 text-amber-600 mb-4">
                        <i class="fas fa-medal text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-xl mb-2">Kualitas Premium</h3>
                    <p class="text-gray-600">Bahan berkualitas tinggi dengan jaminan awet dan tahan lama</p>
                </div>
                
                <!-- Feature 3 -->
                <div class="text-center p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="inline-block p-4 rounded-full bg-amber-100 text-amber-600 mb-4">
                        <i class="fas fa-truck text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-xl mb-2">Pengiriman Cepat</h3>
                    <p class="text-gray-600">Proses produksi cepat dan pengiriman tepat waktu ke lokasi Anda</p>
                </div>
                
                <!-- Feature 4 -->
                <div class="text-center p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="inline-block p-4 rounded-full bg-amber-100 text-amber-600 mb-4">
                        <i class="fas fa-headset text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-xl mb-2">Layanan Pelanggan</h3>
                    <p class="text-gray-600">Dukungan pelanggan 24/7 siap membantu Anda kapanpun dibutuhkan</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Custom Design CTA -->
    <section class="py-16 bg-cover bg-center relative" style="background-image: url('https://images.unsplash.com/photo-1616137422495-6b6837fac4b1?q=80&w=2072&auto=format&fit=crop');">
        <div class="absolute inset-0 bg-gray-900 bg-opacity-70"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl mx-auto text-center text-white">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Buat Desain Interior Kustom Anda Sendiri</h2>
                <p class="text-lg mb-8">Gunakan fitur editor desain kami untuk membuat desain interior yang sesuai dengan kebutuhan dan gaya Anda. Rancang, visualisasikan, dan pesan dengan mudah!</p>
                <a href="#" class="inline-block px-8 py-4 bg-amber-600 hover:bg-amber-700 text-white font-bold rounded-md text-lg transition duration-300">
                    Mulai Desain Sekarang
                </a>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Testimonial Pelanggan</h2>
                <p class="text-gray-600">Apa kata pelanggan kami tentang produk dan layanan Daiku</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-amber-500 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-600 italic mb-6">"Sangat puas dengan kitchen set dari Daiku! Desain sesuai dengan keinginan saya, proses pemesanan mudah, dan hasilnya sangat memuaskan. Pengiriman juga tepat waktu."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                            <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Customer" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Dewi Susanti</h4>
                            <p class="text-gray-500 text-sm">Jakarta</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-amber-500 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="text-gray-600 italic mb-6">"Saya memesan wardrobe custom dari Daiku dan sangat puas dengan hasilnya. Tool desain customnya sangat membantu, staff ramah, dan kualitas produknya luar biasa."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                            <img src="https://randomuser.me/api/portraits/men/54.jpg" alt="Customer" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Budi Santoso</h4>
                            <p class="text-gray-500 text-sm">Surabaya</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-amber-500 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-600 italic mb-6">"Desain TV Cabinet dari Daiku benar-benar sesuai dengan apa yang saya bayangkan. Proses konsultasi desainnya sangat membantu dan hasilnya memuaskan."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                            <img src="https://randomuser.me/api/portraits/women/54.jpg" alt="Customer" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Rina Wijaya</h4>
                            <p class="text-gray-500 text-sm">Bandung</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Instagram Feed -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Ikuti Kami di Instagram</h2>
                <p class="text-gray-600">@daiku.interior</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                <a href="#" class="block overflow-hidden group">
                    <div class="relative h-60 md:h-40">
                        <img src="https://images.unsplash.com/photo-1600121848594-d8644e57abab?q=80&w=2070&auto=format&fit=crop" alt="Instagram Post" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <i class="fab fa-instagram text-white text-2xl"></i>
                        </div>
                    </div>
                </a>
                
                <a href="#" class="block overflow-hidden group">
                    <div class="relative h-60 md:h-40">
                        <img src="https://images.unsplash.com/photo-1603512500383-e0d36bea1ae1?q=80&w=1945&auto=format&fit=crop" alt="Instagram Post" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <i class="fab fa-instagram text-white text-2xl"></i>
                        </div>
                    </div>
                </a>
                
                <a href="#" class="block overflow-hidden group">
                    <div class="relative h-60 md:h-40">
                        <img src="https://images.unsplash.com/photo-1583847268964-b28dc8f51f92?q=80&w=1974&auto=format&fit=crop" alt="Instagram Post" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <i class="fab fa-instagram text-white text-2xl"></i>
                        </div>
                    </div>
                </a>
                
                <a href="#" class="block overflow-hidden group">
                    <div class="relative h-60 md:h-40">
                        <img src="https://images.unsplash.com/photo-1605629921711-2f6b00c6bbf4?q=80&w=1964&auto=format&fit=crop" alt="Instagram Post" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <i class="fab fa-instagram text-white text-2xl"></i>
                        </div>
                    </div>
                </a>
                
                <a href="#" class="block overflow-hidden group">
                    <div class="relative h-60 md:h-40">
                        <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?q=80&w=2158&auto=format&fit=crop" alt="Instagram Post" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <i class="fab fa-instagram text-white text-2xl"></i>
                        </div>
                    </div>
                </a>
                
                <a href="#" class="block overflow-hidden group">
                    <div class="relative h-60 md:h-40">
                        <img src="https://images.unsplash.com/photo-1531971589569-0d9370cbe1e5?q=80&w=1981&auto=format&fit=crop" alt="Instagram Post" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <i class="fab fa-instagram text-white text-2xl"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    // You can add any JavaScript here for the home page
    // For example, a slider for the testimonials or product carousel
</script>
@endpush
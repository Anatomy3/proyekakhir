<!-- resources/views/products/index.blade.php -->
@extends('layouts.app')

@section('title', 'Produk')

@section('content')
    <!-- Page Header -->
    <div class="bg-amber-600 py-8">
        <div class="container mx-auto px-4">
            <div class="text-white">
                <h1 class="text-3xl font-bold mb-2">Produk Kami</h1>
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="hover:underline">Beranda</a>
                    <span class="mx-2">/</span>
                    <span>Produk</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Section -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Sidebar / Filters -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-lg shadow-md p-6 sticky top-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Filter Produk</h2>
                        
                        <!-- Categories -->
                        <div class="mb-6">
                            <h3 class="font-semibold text-gray-800 mb-3">Kategori</h3>
                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <input type="checkbox" id="cat-1" class="w-4 h-4 text-amber-600 border-gray-300 rounded focus:ring-amber-500">
                                    <label for="cat-1" class="ml-2 text-gray-600">Kitchen Set (12)</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="cat-2" class="w-4 h-4 text-amber-600 border-gray-300 rounded focus:ring-amber-500">
                                    <label for="cat-2" class="ml-2 text-gray-600">Wardrobe (8)</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="cat-3" class="w-4 h-4 text-amber-600 border-gray-300 rounded focus:ring-amber-500">
                                    <label for="cat-3" class="ml-2 text-gray-600">TV Cabinet (15)</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="cat-4" class="w-4 h-4 text-amber-600 border-gray-300 rounded focus:ring-amber-500">
                                    <label for="cat-4" class="ml-2 text-gray-600">Meja & Kursi (7)</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="cat-5" class="w-4 h-4 text-amber-600 border-gray-300 rounded focus:ring-amber-500">
                                    <label for="cat-5" class="ml-2 text-gray-600">Rak Buku (9)</label>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Price Range -->
                        <div class="mb-6">
                            <h3 class="font-semibold text-gray-800 mb-3">Rentang Harga</h3>
                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <input type="radio" name="price-range" id="price-1" class="w-4 h-4 text-amber-600 border-gray-300 focus:ring-amber-500">
                                    <label for="price-1" class="ml-2 text-gray-600">Dibawah Rp 5.000.000</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="radio" name="price-range" id="price-2" class="w-4 h-4 text-amber-600 border-gray-300 focus:ring-amber-500">
                                    <label for="price-2" class="ml-2 text-gray-600">Rp 5.000.000 - Rp 10.000.000</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="radio" name="price-range" id="price-3" class="w-4 h-4 text-amber-600 border-gray-300 focus:ring-amber-500">
                                    <label for="price-3" class="ml-2 text-gray-600">Rp 10.000.000 - Rp 15.000.000</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="radio" name="price-range" id="price-4" class="w-4 h-4 text-amber-600 border-gray-300 focus:ring-amber-500">
                                    <label for="price-4" class="ml-2 text-gray-600">Diatas Rp 15.000.000</label>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Material -->
                        <div class="mb-6">
                            <h3 class="font-semibold text-gray-800 mb-3">Material</h3>
                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <input type="checkbox" id="material-1" class="w-4 h-4 text-amber-600 border-gray-300 rounded focus:ring-amber-500">
                                    <label for="material-1" class="ml-2 text-gray-600">HPL</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="material-2" class="w-4 h-4 text-amber-600 border-gray-300 rounded focus:ring-amber-500">
                                    <label for="material-2" class="ml-2 text-gray-600">Multiplek</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="material-3" class="w-4 h-4 text-amber-600 border-gray-300 rounded focus:ring-amber-500">
                                    <label for="material-3" class="ml-2 text-gray-600">MDF</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="material-4" class="w-4 h-4 text-amber-600 border-gray-300 rounded focus:ring-amber-500">
                                    <label for="material-4" class="ml-2 text-gray-600">Kayu Solid</label>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Type -->
                        <div class="mb-6">
                            <h3 class="font-semibold text-gray-800 mb-3">Tipe Produk</h3>
                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <input type="checkbox" id="type-1" class="w-4 h-4 text-amber-600 border-gray-300 rounded focus:ring-amber-500">
                                    <label for="type-1" class="ml-2 text-gray-600">Ready Made</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="type-2" class="w-4 h-4 text-amber-600 border-gray-300 rounded focus:ring-amber-500">
                                    <label for="type-2" class="ml-2 text-gray-600">Kustomisasi</label>
                                </div>
                            </div>
                        </div>
                        
                        <button class="w-full bg-amber-600 hover:bg-amber-700 text-white py-2 px-4 rounded-md transition duration-300">
                            Terapkan Filter
                        </button>
                    </div>
                </div>
                
                <!-- Products Grid -->
                <div class="lg:col-span-3">
                    <!-- Sorting and View Options -->
                    <div class="bg-white rounded-lg shadow-md p-4 mb-6 flex flex-col md:flex-row md:items-center justify-between">
                        <div class="flex items-center mb-4 md:mb-0">
                            <span class="text-gray-600 mr-2">Urutkan Berdasarkan:</span>
                            <select class="border border-gray-300 rounded-md px-2 py-1 focus:outline-none focus:ring-1 focus:ring-amber-500">
                                <option>Paling Relevan</option>
                                <option>Harga: Rendah ke Tinggi</option>
                                <option>Harga: Tinggi ke Rendah</option>
                                <option>Terbaru</option>
                                <option>Terlaris</option>
                            </select>
                        </div>
                        <div class="flex items-center">
                            <span class="text-gray-600 mr-2">Tampilkan:</span>
                            <select class="border border-gray-300 rounded-md px-2 py-1 mr-4 focus:outline-none focus:ring-1 focus:ring-amber-500">
                                <option>12</option>
                                <option>24</option>
                                <option>36</option>
                            </select>
                            <div class="flex space-x-2">
                                <button class="w-8 h-8 flex items-center justify-center bg-amber-600 text-white rounded">
                                    <i class="fas fa-th-large"></i>
                                </button>
                                <button class="w-8 h-8 flex items-center justify-center bg-gray-200 text-gray-600 rounded">
                                    <i class="fas fa-list"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Products -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
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
                                <div class="absolute top-4 left-4">
                                    <span class="bg-amber-600 text-white px-2 py-1 text-xs rounded">Populer</span>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-gray-500 text-sm">Kitchen Set</span>
                                    <div class="flex items-center">
                                        <i class="fas fa-star text-yellow-400"></i>
                                        <span class="text-sm ml-1">4.8</span>
                                    </div>
                                </div>
                                <h3 class="text-lg font-bold text-gray-800 mb-2">Kitchen Set Modern Minimalis</h3>
                                <p class="text-gray-600 text-sm mb-4 line-clamp-2">Kitchen set modern dengan desain minimalis yang elegant, cocok untuk dapur kecil hingga sedang.</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-amber-600 font-bold">Rp 8.500.000</span>
                                    <a href="{{ route('products.show', 1) }}" class="bg-amber-600 hover:bg-amber-700 text-white py-2 px-4 rounded-md text-sm transition duration-300">Detail</a>
                                </div>
                            </div>
                        </div>

                        <!-- Product Card 2 -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                            <div class="relative h-64 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1616627541109-8fd607980db1?q=80&w=2070&auto=format&fit=crop" alt="Wardrobe Modern" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute top-4 right-4 flex flex-col gap-2">
                                    <button class="bg-white w-8 h-8 rounded-full flex items-center justify-center text-gray-700 hover:text-amber-600 transition-colors duration-300">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                    <button class="bg-white w-8 h-8 rounded-full flex items-center justify-center text-gray-700 hover:text-amber-600 transition-colors duration-300">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div class="absolute top-4 left-4">
                                    <span class="bg-green-600 text-white px-2 py-1 text-xs rounded">Baru</span>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-gray-500 text-sm">Wardrobe</span>
                                    <div class="flex items-center">
                                        <i class="fas fa-star text-yellow-400"></i>
                                        <span class="text-sm ml-1">4.6</span>
                                    </div>
                                </div>
                                <h3 class="text-lg font-bold text-gray-800 mb-2">Wardrobe Modern dengan Kaca</h3>
                                <p class="text-gray-600 text-sm mb-4 line-clamp-2">Lemari pakaian modern dengan kaca dan ruang penyimpanan yang optimal untuk kebutuhan Anda.</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-amber-600 font-bold">Rp 7.800.000</span>
                                    <a href="{{ route('products.show', 2) }}" class="bg-amber-600 hover:bg-amber-700 text-white py-2 px-4 rounded-md text-sm transition duration-300">Detail</a>
                                </div>
                            </div>
                        </div>

                        <!-- Product Card 3 -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                            <div class="relative h-64 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1600494603989-9650cf6dad51?q=80&w=2070&auto=format&fit=crop" alt="TV Cabinet" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute top-4 right-4 flex flex-col gap-2">
                                    <button class="bg-white w-8 h-8 rounded-full flex items-center justify-center text-gray-700 hover:text-amber-600 transition-colors duration-300">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                    <button class="bg-white w-8 h-8 rounded-full flex items-center justify-center text-gray-700 hover:text-amber-600 transition-colors duration-300">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div class="absolute top-4 left-4">
                                    <span class="bg-red-600 text-white px-2 py-1 text-xs rounded">Sale</span>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-gray-500 text-sm">TV Cabinet</span>
                                    <div class="flex items-center">
                                        <i class="fas fa-star text-yellow-400"></i>
                                        <span class="text-sm ml-1">4.9</span>
                                    </div>
                                </div>
                                <h3 class="text-lg font-bold text-gray-800 mb-2">TV Cabinet Minimalis</h3>
                                <p class="text-gray-600 text-sm mb-4 line-clamp-2">Kabinet TV dengan gaya minimalis modern yang memberikan tampilan bersih dan mewah.</p>
                                <div class="flex justify-between items-center">
                                    <div>
                                        <span class="text-amber-600 font-bold">Rp 4.200.000</span>
                                        <span class="text-gray-400 text-sm line-through ml-2">Rp 5.500.000</span>
                                    </div>
                                    <a href="{{ route('products.show', 3) }}" class="bg-amber-600 hover:bg-amber-700 text-white py-2 px-4 rounded-md text-sm transition duration-300">Detail</a>
                                </div>
                            </div>
                        </div>

                        <!-- Product Card 4 -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                            <div class="relative h-64 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1591129841117-3adfd313a592?q=80&w=2070&auto=format&fit=crop" alt="Meja Makan" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute top-4 right-4 flex flex-col gap-2">
                                    <button class="bg-white w-8 h-8 rounded-full flex items-center justify-center text-gray-700 hover:text-amber-600 transition-colors duration-300">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                    <button class="bg-white w-8 h-8 rounded-full flex items-center justify-center text-gray-700 hover:text-amber-600 transition-colors duration-300">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-gray-500 text-sm">Meja & Kursi</span>
                                    <div class="flex items-center">
                                        <i class="fas fa-star text-yellow-400"></i>
                                        <span class="text-sm ml-1">4.7</span>
                                    </div>
                                </div>
                                <h3 class="text-lg font-bold text-gray-800 mb-2">Set Meja Makan Modern</h3>
                                <p class="text-gray-600 text-sm mb-4 line-clamp-2">Set meja makan modern dengan 6 kursi, cocok untuk ruang makan keluarga.</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-amber-600 font-bold">Rp 9.300.000</span>
                                    <a href="{{ route('products.show', 4) }}" class="bg-amber-600 hover:bg-amber-700 text-white py-2 px-4 rounded-md text-sm transition duration-300">Detail</a>
                                </div>
                            </div>
                        </div>

                        <!-- Product Card 5 -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                            <div class="relative h-64 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1588464083058-ce882071a12f?q=80&w=2127&auto=format&fit=crop" alt="Rak Buku" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute top-4 right-4 flex flex-col gap-2">
                                    <button class="bg-white w-8 h-8 rounded-full flex items-center justify-center text-gray-700 hover:text-amber-600 transition-colors duration-300">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                    <button class="bg-white w-8 h-8 rounded-full flex items-center justify-center text-gray-700 hover:text-amber-600 transition-colors duration-300">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div class="absolute top-4 left-4">
                                    <span class="bg-purple-600 text-white px-2 py-1 text-xs rounded">Kustomisasi</span>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-gray-500 text-sm">Rak Buku</span>
                                    <div class="flex items-center">
                                        <i class="fas fa-star text-yellow-400"></i>
                                        <span class="text-sm ml-1">4.5</span>
                                    </div>
                                </div>
                                <h3 class="text-lg font-bold text-gray-800 mb-2">Rak Buku Minimalis Kustomisasi</h3>
                                <p class="text-gray-600 text-sm mb-4 line-clamp-2">Rak buku modern yang dapat dikustomisasi ukuran dan bahannya sesuai kebutuhan Anda.</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-amber-600 font-bold">Rp 3.800.000</span>
                                    <a href="{{ route('products.show', 5) }}" class="bg-amber-600 hover:bg-amber-700 text-white py-2 px-4 rounded-md text-sm transition duration-300">Detail</a>
                                </div>
                            </div>
                        </div>

                        <!-- Product Card 6 -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                            <div class="relative h-64 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1493663284031-b7e3aefcae8e?q=80&w=2070&auto=format&fit=crop" alt="TV Cabinet" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute top-4 right-4 flex flex-col gap-2">
                                    <button class="bg-white w-8 h-8 rounded-full flex items-center justify-center text-gray-700 hover:text-amber-600 transition-colors duration-300">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                    <button class="bg-white w-8 h-8 rounded-full flex items-center justify-center text-gray-700 hover:text-amber-600 transition-colors duration-300">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-gray-500 text-sm">TV Cabinet</span>
                                    <div class="flex items-center">
                                        <i class="fas fa-star text-yellow-400"></i>
                                        <span class="text-sm ml-1">4.7</span>
                                    </div>
                                </div>
                                <h3 class="text-lg font-bold text-gray-800 mb-2">TV Cabinet dengan Laci</h3>
                                <p class="text-gray-600 text-sm mb-4 line-clamp-2">Kabinet TV modular dengan laci penyimpanan tambahan untuk kebutuhan multimedia Anda.</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-amber-600 font-bold">Rp 6.200.000</span>
                                    <a href="{{ route('products.show', 6) }}" class="bg-amber-600 hover:bg-amber-700 text-white py-2 px-4 rounded-md text-sm transition duration-300">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="mt-10 flex justify-center">
                        <nav class="flex space-x-2">
                            <a href="#" class="w-10 h-10 flex items-center justify-center rounded-md border border-gray-300 text-gray-700 hover:bg-amber-50">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                            <a href="#" class="w-10 h-10 flex items-center justify-center rounded-md bg-amber-600 text-white">1</a>
                            <a href="#" class="w-10 h-10 flex items-center justify-center rounded-md border border-gray-300 text-gray-700 hover:bg-amber-50">2</a>
                            <a href="#" class="w-10 h-10 flex items-center justify-center rounded-md border border-gray-300 text-gray-700 hover:bg-amber-50">3</a>
                            <span class="w-10 h-10 flex items-center justify-center">...</span>
                            <a href="#" class="w-10 h-10 flex items-center justify-center rounded-md border border-gray-300 text-gray-700 hover:bg-amber-50">8</a>
                            <a href="#" class="w-10 h-10 flex items-center justify-center rounded-md border border-gray-300 text-gray-700 hover:bg-amber-50">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="bg-gray-100 py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-2xl font-bold text-gray-800 mb-3">Dapatkan Update Produk Terbaru</h2>
                <p class="text-gray-600 mb-6">Berlangganan untuk mendapatkan informasi tentang produk baru, penawaran khusus, dan diskon.</p>
                <form class="flex flex-col sm:flex-row gap-2 max-w-md mx-auto">
                    <input type="email" placeholder="Alamat email Anda" class="px-4 py-3 w-full rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-500">
                    <button type="submit" class="px-6 py-3 bg-amber-600 text-white rounded-md hover:bg-amber-700 transition duration-300 whitespace-nowrap">
                        Berlangganan
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection
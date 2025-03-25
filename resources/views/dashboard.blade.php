<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Banner Promosi -->
            <div class="bg-gradient-to-r from-amber-500 to-amber-700 rounded-lg shadow-lg mb-6 overflow-hidden">
                <div class="md:flex items-center">
                    <div class="p-6 md:w-2/3">
                        <h3 class="text-xl md:text-2xl font-bold text-white mb-2">Diskon 15% untuk Kitchen Set</h3>
                        <p class="text-white text-opacity-90 mb-4">Dapatkan diskon spesial hingga 15% untuk pemesanan kitchen set custom periode Maret 2025.</p>
                        <a href="#" class="inline-block bg-white text-amber-600 font-semibold px-4 py-2 rounded-md hover:bg-amber-50 transition-colors">Lihat Penawaran</a>
                    </div>
                    <div class="md:w-1/3 p-4 hidden md:block">
                        <img src="https://via.placeholder.com/300x200" alt="Promo" class="rounded-lg shadow-md w-full h-auto">
                    </div>
                </div>
            </div>

            <!-- Kartu Utama -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-6">Selamat Datang, {{ Auth::user()->name }}!</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <!-- Pesanan Saya -->
                        <div class="bg-gray-50 rounded-lg p-6 shadow-md border border-gray-100 hover:border-amber-200 transition-colors">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 flex items-center justify-center rounded-full bg-amber-100 text-amber-600 mr-4">
                                    <i class="fas fa-shopping-bag text-2xl"></i>
                                </div>
                                <h3 class="text-lg font-semibold">Pesanan Saya</h3>
                            </div>
                            <p class="text-gray-600 mb-4">Lihat status pesanan dan riwayat pembelian Anda</p>
                            <a href="#" class="inline-block bg-amber-600 text-white py-2 px-4 rounded hover:bg-amber-700 transition-colors">
                                Lihat Pesanan
                            </a>
                        </div>
                        
                        <!-- Desain Kustom -->
                        <div class="bg-gray-50 rounded-lg p-6 shadow-md border border-gray-100 hover:border-amber-200 transition-colors">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 flex items-center justify-center rounded-full bg-amber-100 text-amber-600 mr-4">
                                    <i class="fas fa-paint-brush text-2xl"></i>
                                </div>
                                <h3 class="text-lg font-semibold">Desain Kustom</h3>
                            </div>
                            <p class="text-gray-600 mb-4">Buat desain interior sesuai keinginan Anda</p>
                            <a href="#" class="inline-block bg-amber-600 text-white py-2 px-4 rounded hover:bg-amber-700 transition-colors">
                                Mulai Desain
                            </a>
                        </div>
                        
                        <!-- Wishlist -->
                        <div class="bg-gray-50 rounded-lg p-6 shadow-md border border-gray-100 hover:border-amber-200 transition-colors">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 flex items-center justify-center rounded-full bg-amber-100 text-amber-600 mr-4">
                                    <i class="fas fa-heart text-2xl"></i>
                                </div>
                                <h3 class="text-lg font-semibold">Wishlist Saya</h3>
                            </div>
                            <p class="text-gray-600 mb-4">Produk yang Anda simpan untuk dibeli nanti</p>
                            <a href="#" class="inline-block bg-amber-600 text-white py-2 px-4 rounded hover:bg-amber-700 transition-colors">
                                Lihat Wishlist
                            </a>
                        </div>
                    </div>
                    
                    <!-- Pesanan Terbaru -->
                    <div class="mb-8">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl font-bold">Pesanan Terbaru</h3>
                            <a href="#" class="text-amber-600 hover:text-amber-700 text-sm font-medium">Lihat Semua</a>
                        </div>
                        <div class="overflow-x-auto bg-white rounded-lg border border-gray-200">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No. Pesanan</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Progres</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD12345</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">03 Mar 2025</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">Rp 8.500.000</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Menunggu Pembayaran</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                                <div class="bg-yellow-400 h-2.5 rounded-full" style="width: 15%"></div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <a href="#" class="text-amber-600 hover:text-amber-900 font-medium">Detail</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD12344</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">25 Feb 2025</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">Rp 5.200.000</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Dalam Pengerjaan</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                                <div class="bg-blue-500 h-2.5 rounded-full" style="width: 60%"></div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <a href="#" class="text-amber-600 hover:text-amber-900 font-medium">Detail</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <!-- Rekomendasi Produk -->
                    <div>
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl font-bold">Rekomendasi Untuk Anda</h3>
                            <a href="#" class="text-amber-600 hover:text-amber-700 text-sm font-medium">Lihat Semua</a>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                            <!-- Product Card 1 -->
                            <div class="bg-white rounded-lg overflow-hidden shadow-md border border-gray-200 hover:shadow-lg transition-shadow">
                                <div class="relative h-48 overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1556910638-3ebdb75654a4?q=80&w=2070&auto=format&fit=crop" alt="Kitchen Set Modern" class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                                    <div class="absolute top-2 right-2">
                                        <button class="bg-white rounded-full p-2 shadow hover:bg-gray-100">
                                            <i class="far fa-heart text-gray-600 hover:text-red-500"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <span class="text-xs font-semibold text-gray-500">Kitchen Set</span>
                                    <h4 class="font-semibold text-gray-800 mb-1 hover:text-amber-600">Kitchen Set Modern Minimalis</h4>
                                    <p class="text-amber-600 font-bold mb-3">Rp 8.500.000</p>
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <i class="fas fa-star text-yellow-400 text-sm"></i>
                                            <span class="text-gray-600 text-sm ml-1">4.8</span>
                                        </div>
                                        <a href="#" class="text-amber-600 hover:text-amber-700 text-sm font-medium">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Product Card 2 -->
                            <div class="bg-white rounded-lg overflow-hidden shadow-md border border-gray-200 hover:shadow-lg transition-shadow">
                                <div class="relative h-48 overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1616627541109-8fd607980db1?q=80&w=2070&auto=format&fit=crop" alt="Wardrobe" class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                                    <div class="absolute top-2 right-2">
                                        <button class="bg-white rounded-full p-2 shadow hover:bg-gray-100">
                                            <i class="far fa-heart text-gray-600 hover:text-red-500"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <span class="text-xs font-semibold text-gray-500">Wardrobe</span>
                                    <h4 class="font-semibold text-gray-800 mb-1 hover:text-amber-600">Lemari Pakaian 3 Pintu</h4>
                                    <p class="text-amber-600 font-bold mb-3">Rp 6.200.000</p>
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <i class="fas fa-star text-yellow-400 text-sm"></i>
                                            <span class="text-gray-600 text-sm ml-1">4.7</span>
                                        </div>
                                        <a href="#" class="text-amber-600 hover:text-amber-700 text-sm font-medium">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Product Card 3 -->
                            <div class="bg-white rounded-lg overflow-hidden shadow-md border border-gray-200 hover:shadow-lg transition-shadow">
                                <div class="relative h-48 overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1605629921711-2f6b00c6bbf4?q=80&w=1964&auto=format&fit=crop" alt="Meja Makan" class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                                    <div class="absolute top-2 right-2">
                                        <button class="bg-white rounded-full p-2 shadow hover:bg-gray-100">
                                            <i class="far fa-heart text-gray-600 hover:text-red-500"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <span class="text-xs font-semibold text-gray-500">Meja & Kursi</span>
                                    <h4 class="font-semibold text-gray-800 mb-1 hover:text-amber-600">Meja Makan Set</h4>
                                    <p class="text-amber-600 font-bold mb-3">Rp 5.800.000</p>
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <i class="fas fa-star text-yellow-400 text-sm"></i>
                                            <span class="text-gray-600 text-sm ml-1">4.5</span>
                                        </div>
                                        <a href="#" class="text-amber-600 hover:text-amber-700 text-sm font-medium">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Product Card 4 -->
                            <div class="bg-white rounded-lg overflow-hidden shadow-md border border-gray-200 hover:shadow-lg transition-shadow">
                                <div class="relative h-48 overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1594026112284-02bb6f3352fe?q=80&w=2070&auto=format&fit=crop" alt="Rak Buku" class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                                    <div class="absolute top-2 right-2">
                                        <button class="bg-white rounded-full p-2 shadow hover:bg-gray-100">
                                            <i class="far fa-heart text-gray-600 hover:text-red-500"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <span class="text-xs font-semibold text-gray-500">Rak Buku</span>
                                    <h4 class="font-semibold text-gray-800 mb-1 hover:text-amber-600">Rak Buku Minimalis</h4>
                                    <p class="text-amber-600 font-bold mb-3">Rp 3.500.000</p>
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <i class="fas fa-star text-yellow-400 text-sm"></i>
                                            <span class="text-gray-600 text-sm ml-1">4.6</span>
                                        </div>
                                        <a href="#" class="text-amber-600 hover:text-amber-700 text-sm font-medium">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
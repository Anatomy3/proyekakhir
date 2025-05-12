<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route dashboard utama yang akan dialihkan berdasarkan role user
Route::get('/dashboard', function () {
    if (Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route untuk profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Semua rute admin dalam satu grup
Route::prefix('admin')->middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->name('admin.')->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    
    // Manajemen Pengguna
    Route::resource('users', App\Http\Controllers\Admin\UserManagementController::class);
    
    // Manajemen Produk
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    
    // Manajemen Kategori
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    
    // Manajemen Pesanan
    Route::resource('orders', App\Http\Controllers\Admin\OrderController::class);
    
    // Laporan
    Route::get('/reports', [App\Http\Controllers\Admin\ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/sales', [App\Http\Controllers\Admin\ReportController::class, 'sales'])->name('reports.sales');
    Route::get('/reports/customers', [App\Http\Controllers\Admin\ReportController::class, 'customers'])->name('reports.customers');
    
    // Integrasi Midtrans
    Route::get('/payment-integration', [App\Http\Controllers\Admin\PaymentIntegrationController::class, 'index'])->name('payment.index');
    Route::post('/payment-integration/update', [App\Http\Controllers\Admin\PaymentIntegrationController::class, 'update'])->name('payment.update');
    
    // Editor Kustomisasi
    Route::get('/customization-templates', [App\Http\Controllers\Admin\CustomizationController::class, 'index'])->name('customization.index');
    Route::get('/customization-templates/create', [App\Http\Controllers\Admin\CustomizationController::class, 'create'])->name('customization.create');
    Route::post('/customization-templates', [App\Http\Controllers\Admin\CustomizationController::class, 'store'])->name('customization.store');
    Route::get('/customization-templates/{template}/edit', [App\Http\Controllers\Admin\CustomizationController::class, 'edit'])->name('customization.edit');
    Route::put('/customization-templates/{template}', [App\Http\Controllers\Admin\CustomizationController::class, 'update'])->name('customization.update');
    Route::delete('/customization-templates/{template}', [App\Http\Controllers\Admin\CustomizationController::class, 'destroy'])->name('customization.destroy');
});

// Route untuk customer
Route::middleware(['auth', 'verified'])->group(function () {
    // Pesanan customer
    Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [App\Http\Controllers\OrderController::class, 'show'])->name('orders.show');
    
    // Wishlist
    Route::get('/wishlist', [App\Http\Controllers\WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist', [App\Http\Controllers\WishlistController::class, 'store'])->name('wishlist.store');
    Route::delete('/wishlist/{item}', [App\Http\Controllers\WishlistController::class, 'destroy'])->name('wishlist.destroy');
    
    // Kustomisasi
    Route::get('/customize', [App\Http\Controllers\CustomizeController::class, 'index'])->name('customize.index');
    Route::post('/customize/preview', [App\Http\Controllers\CustomizeController::class, 'preview'])->name('customize.preview');
    Route::post('/customize/save', [App\Http\Controllers\CustomizeController::class, 'save'])->name('customize.save');
});

// Rute publik untuk katalog produk
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [App\Http\Controllers\ProductController::class, 'show'])->name('products.show');
Route::get('/categories/{category}', [App\Http\Controllers\CategoryController::class, 'show'])->name('categories.show');

// Keranjang belanja
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/update', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');

// Checkout (hanya untuk user yang login)
Route::middleware('auth')->group(function () {
    Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/process', [App\Http\Controllers\CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/checkout/success', [App\Http\Controllers\CheckoutController::class, 'success'])->name('checkout.success');
});

// Chat routes for customers
Route::middleware(['auth'])->group(function () {
    Route::get('/chat/check-conversation', [App\Http\Controllers\ChatController::class, 'checkConversation']);
    Route::post('/chat/send', [App\Http\Controllers\ChatController::class, 'sendMessage']);
});

// Guest chat routes
Route::post('/chat/guest/initialize', [App\Http\Controllers\ChatController::class, 'initializeGuestChat']);
Route::post('/chat/guest/send', [App\Http\Controllers\ChatController::class, 'sendGuestMessage']);
Route::post('/chat/guest/check-session', [App\Http\Controllers\ChatController::class, 'checkGuestSession']);

// Admin chat routes
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/chat', [App\Http\Controllers\Admin\ChatController::class, 'index'])->name('chat.index');
    Route::get('/chat/conversations', [App\Http\Controllers\Admin\ChatController::class, 'getConversations']);
    Route::get('/chat/conversations/{id}/messages', [App\Http\Controllers\Admin\ChatController::class, 'getMessages']);
    Route::post('/chat/send', [App\Http\Controllers\Admin\ChatController::class, 'sendMessage']);
    Route::post('/chat/conversations/{id}/close', [App\Http\Controllers\Admin\ChatController::class, 'closeConversation']);
});

// Rute untuk Midtrans callback
Route::post('/payments/notification', [App\Http\Controllers\PaymentController::class, 'notification'])->name('payment.notification');
Route::get('/payments/return', [App\Http\Controllers\PaymentController::class, 'return'])->name('payment.return');

require __DIR__.'/auth.php';
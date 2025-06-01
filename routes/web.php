<?php

use App\Models\TransactionModel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;

Route::get('/', [HomeController::class, 'index']);

// Auth routes
Route::get('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'register']);
Route::post('registerproses', [AuthController::class, 'registerproses']);
Route::post('loginproses', [AuthController::class, 'loginproses']);
Route::get('logout', [AuthController::class, 'logout']);

// Routes protected by auth middleware
Route::middleware(['auth'])->group(function () {

    // HomeController routes
    Route::controller(HomeController::class)->group(function () {
        Route::get('artikeldetail/{id}', 'artikeldetail');
        Route::post('komentarsimpan', 'komentarsimpan');

        Route::get('produkdetail/{id}', 'produkdetail');
        Route::get('cartsimpan', 'cartsimpan');
        Route::get('keranjang', 'keranjang');
        Route::get('keranjang/hapus/{id}', 'keranjanghapus');
        Route::put('keranjang/update', 'keranjangupdate')->name("keranjang.update");
        Route::get('keranjang/total', 'keranjangtotal');
    });

    // AdminController routes
    Route::controller(AdminController::class)->prefix('admin')->group(function () {
        Route::get('/', 'dashboard');
        Route::get('artikel', 'artikel');
        Route::post('artikelsimpan', 'artikelsimpan');
        Route::get('artikeledit/{id}', 'artikeledit');
        Route::put('artikelupdate/{id}', 'artikelupdate');
        Route::delete('artikelhapus/{id}', 'artikelhapus');

        Route::get('komentar', 'komentar');
        Route::post('komentarsimpan', 'komentarsimpan');
        Route::get('komentaredit/{id}', 'komentaredit');
        Route::put('komentarupdate/{id}', 'komentarupdate');
        Route::delete('komentarhapus/{id}', 'komentarhapus');
        Route::post('komentarbalas', 'komentarbalas');
    });

    // MitraController routes
    Route::controller(MitraController::class)->prefix('mitra')->group(function () {
        Route::get('/', 'dashboard');
        Route::get('produk', 'produk');
        Route::post('produksimpan', 'produksimpan');
        Route::get('produkedit/{id}', 'produkedit');
        Route::put('produkupdate/{id}', 'produkupdate');
        Route::delete('produkhapus/{id}', 'produkhapus');
    });

Route::post('/checkout/create-order-from-cart', [CheckoutController::class, 'createOrderFromCart'])->name('checkout.createOrderFromCart');
Route::get('/checkout/{transaction}', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('/checkout/process-payment', [CheckoutController::class, 'store'])->name('checkout.process_payment');
Route::post('/process-single-checkout', [CheckoutController::class, 'process'])->name('checkout.process_single');


Route::get('/pending', function() {
    return view('checkout_pending');
})->name('checkout.pending');

Route::get('/success/{transactionId}', [CheckoutController::class,'success'])->name('checkout.success');

Route::get('/error', function () {
    return view('checkout_error');
})->name('checkout.error');

    Route::get('/checkout/update-status/{transactionId}', [CheckoutController::class, 'updateStatusOnSuccess'])->name('checkout.update_status');

Route::post('/checkoutsimpan', [CheckoutController::class, 'checkout.store']);
});

Route::prefix('profile')->middleware('auth')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/update', [ProfileController::class, 'update'])->name('profile.update');
    
    // Password
    Route::get('/change-password', [ProfileController::class, 'showChangePasswordForm'])->name('password.change');
    Route::post('/change-password', [ProfileController::class, 'changePassword']);
    
    // Orders
    Route::get('/orders', [ProfileController::class, 'orders'])->name('orders.index');
    Route::get('/orders/{id}', [ProfileController::class, 'showOrder'])->name('orders.show');
    
    // Wishlist
    Route::get('/wishlist', [ProfileController::class, 'wishlist'])->name('wishlist.index');
    Route::post('/wishlist/add', [ProfileController::class, 'addToWishlist'])->name('wishlist.add');
    Route::delete('/wishlist/remove/{id}', [ProfileController::class, 'removeFromWishlist'])->name('wishlist.remove');
    
    // Addresses
    Route::get('/addresses', [ProfileController::class, 'addresses'])->name('addresses.index');
    Route::post('/addresses', [ProfileController::class, 'storeAddress'])->name('addresses.store');
    Route::put('/addresses/{id}', [ProfileController::class, 'updateAddress'])->name('addresses.update');
});
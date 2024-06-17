<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BankSampahController;
use App\Http\Controllers\BeritaDanTipsController;
use App\Http\Controllers\JenisSampahController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\AdminTransaksiController;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dash', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    if (auth()->user()->role == 'admin') {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('user.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

// Route untuk seluruh
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //Bank Sampah
    Route::get('/banksampah/history', [BankSampahController::class, 'history'])->name('banksampah.history');
    // Berita dan Tips
    Route::get('/berita', [BeritaDanTipsController::class, 'index'])->name('berita.index');
    Route::get('/berita/{id}', [BeritaDanTipsController::class, 'show'])->name('berita.show');

});

// Route khusus admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Route admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    // User
    Route::get('/admin/users', [AdminController::class, 'listUsers'])->name('admin.users.index');
    Route::delete('/admin/users/{id}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
    // Jenis Sampah
    Route::get('/admin/jenis-sampah', [JenisSampahController::class, 'index'])->name('admin.jenis-sampah.index');
    Route::post('/admin/jenis-sampah', [JenisSampahController::class, 'store'])->name('admin.jenis-sampah.store');
    Route::put('/admin/jenis-sampah/{id}', [JenisSampahController::class, 'update'])->name('admin.jenis-sampah.update');
    Route::delete('/admin/jenis-sampah/{id}', [JenisSampahController::class, 'destroy'])->name('admin.jenis-sampah.destroy');
    // Bank Sampah
    Route::get('/banksampah/confirmation', [BankSampahController::class, 'confirmation'])->name('banksampah.confirmation');
    Route::post('/banksampah/{id}', [BankSampahController::class, 'confirm'])->name('banksampah.confirm');
    Route::delete('/banksampah/{id}', [BankSampahController::class, 'destroy'])->name('banksampah.destroy');
    // Berita dan Tips
    Route::get('/admin/berita/create', [BeritaDanTipsController::class, 'create'])->name('admin.berita.create');
    Route::get('/admin/berita', [BeritaDanTipsController::class, 'adminIndex'])->name('admin.berita.index');
    Route::post('/admin/berita', [BeritaDanTipsController::class, 'store'])->name('admin.berita.store');
    Route::delete('/admin/berita/{id}', [BeritaDanTipsController::class, 'destroy'])->name('admin.berita.destroy');
    // Produk
    Route::get('/admin/products', [App\Http\Controllers\ProdukController::class, 'index'])->name('admin.products.index');
    Route::post('/admin/products', [App\Http\Controllers\ProdukController::class, 'store'])->name('admin.products.store');
    Route::put('/admin/products/{product}', [App\Http\Controllers\ProdukController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{product}', [App\Http\Controllers\ProdukController::class, 'destroy'])->name('admin.products.destroy');
    // Transaksi
    Route::get('/admin/transaksi', [AdminTransaksiController::class, 'indexAdmin'])->name('admin.transaksi.index');
    Route::get('/admin/transaksi/{id}', [AdminTransaksiController::class, 'showAdmin'])->name('admin.transaksi.show');
    Route::delete('/admin/transaksi/{id}', [AdminTransaksiController::class, 'destroy'])->name('admin.transaksi.destroy');

});

// Route khusus pengguna
Route::middleware(['auth', 'role:pengguna'])->group(function () {
    // Route pengguna
    Route::get('/', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/banksampah', [BankSampahController::class, 'create'])->name('banksampah.create');
    Route::post('/banksampah', [BankSampahController::class, 'store'])->name('banksampah.store');
    // User Produk
    Route::get('/products', [App\Http\Controllers\UserProduKController::class, 'index'])->name('user.products.index');
    Route::get('/products/{product}', [App\Http\Controllers\UserProduKController::class, 'show'])->name('user.products.show');
    // Keranjang
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
    Route::post('/keranjang/store', [KeranjangController::class, 'store'])->name('keranjang.store');
    Route::put('/keranjang/{id}', [KeranjangController::class, 'update'])->name('keranjang.update');
    Route::delete('/keranjang/{produk}', [KeranjangController::class, 'destroy'])->name('keranjang.destroy');
    Route::get('keranjang/checkout', [KeranjangController::class, 'checkout'])->name('keranjang.checkout');
    // Transaksi
    Route::get('/checkout', [TransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('/checkout', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::get('/transaksi/status', [TransaksiController::class, 'show'])->name('transaksi.show');
    Route::get('/transaksi/history', [TransaksiController::class, 'index'])->name('transaksi.history');
});

require __DIR__ . '/auth.php';

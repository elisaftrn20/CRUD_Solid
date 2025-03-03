<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\AdminGudangController;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Route;

// Route untuk login
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/', [AuthController::class, 'login']);

// Route untuk logout
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


// Dashboard Route
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::middleware(['role:superadmin'])->get('/dashboard/index', [AuthController::class, 'dashboardSuperadmin'])->name('dashboard.superadmin');
    Route::middleware(['role:admingudang'])->get('/dashboard/index', [AuthController::class, 'dashboardAdminGudang'])->name('dashboard.admingudang');
});

// Supplier Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
});
Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create');
    Route::post('/suppliers/store', [SupplierController::class, 'store'])->name('suppliers.store');
    Route::get('/suppliers/edit/{id}', [SupplierController::class, 'edit'])->name('suppliers.edit');
    Route::put('/suppliers/{id}', [SupplierController::class, 'update'])->name('suppliers.update');
    Route::delete('/suppliers/{id}', [SupplierController::class, 'delete'])->name('suppliers.delete');
});

// Product Routes
// Semua user yang login bisa melihat daftar produk
Route::middleware(['auth'])->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
});
Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'delete'])->name('products.delete');
});

// Category Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
});
Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
});

// Barang Masuk Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/barang_masuk', [BarangMasukController::class, 'index'])->name('barang_masuk.index');
    Route::get('/barang_masuk/create', [BarangMasukController::class, 'create'])->name('barang_masuk.create');
    Route::post('/barang_masuk/store', [BarangMasukController::class, 'store'])->name('barang_masuk.store');
    Route::get('/barang_masuk/edit/{id}', [BarangMasukController::class, 'edit'])->name('barang_masuk.edit');
    Route::put('/barang_masuk/{id}', [BarangMasukController::class, 'update'])->name('barang_masuk.update');
    Route::delete('/barang_masuk/{id}', [BarangMasukController::class, 'destroy'])->name('barang_masuk.destroy');
});

// Barang Keluar Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/barang_keluar', [BarangKeluarController::class, 'index'])->name('barang_keluar.index');
    Route::get('/barang_keluar/create', [BarangKeluarController::class, 'create'])->name('barang_keluar.create');
    Route::post('/barang_keluar/store', [BarangKeluarController::class, 'store'])->name('barang_keluar.store');
    Route::get('/barang_keluar/edit/{id}', [BarangKeluarController::class, 'edit'])->name('barang_keluar.edit');
    Route::put('/barang_keluar/{id}', [BarangKeluarController::class, 'update'])->name('barang_keluar.update');
    Route::delete('/barang_keluar/{id}', [BarangKeluarController::class, 'delete'])->name('barang_keluar.delete');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/admingudang', [AdminGudangController::class, 'index'])->name('admingudang.index');
    Route::get('/admingudang/create', [AdminGudangController::class, 'create'])->name('admingudang.create');
    Route::post('/admingudang/store', [AdminGudangController::class, 'store'])->name('admingudang.store');
    Route::get('/admingudang/edit/{id}', [AdminGudangController::class, 'edit'])->name('admingudang.edit');
    Route::put('/admingudang/{id}', [AdminGudangController::class, 'update'])->name('admingudang.update');
    Route::delete('/admingudang/{id}', [AdminGudangController::class, 'delete'])->name('admingudang.delete');
});

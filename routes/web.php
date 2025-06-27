<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;


// Halaman yang bisa diakses tanpa login
Route::get('/', [MenuController::class, 'indexBeranda'])->name('beranda');

Route::get('/menu/ajax', [MenuController::class, 'ajaxMenu'])->name('menu.ajax');

Route::get('/about', function () {
    return view('about');
});

// Halaman yang bisa diakses setelah login
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

    // Halaman menu
    Route::get('/menu', [MenuController::class, 'index'])->name('menu');
});

Route::middleware(['auth', 'user'])->group(function () {
    // Route::get('/user',[UserController::class,'index'])->name('user.index');

});

// Role Admin
Route::middleware(['auth', 'admin'])->group(function () {
    // User Order
    Route::get('/admin/order', [CartController::class, 'order'])->name('admin.order.index');
    Route::post('/admin/confirm/{id}', [CartController::class, 'confirm'])->name('admin.confirm');

    // User Interface
    Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user.index');

    // Admin Interface
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::get('/admin/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');
    Route::put('/admin/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
});

require __DIR__ . '/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAksesController;

Route::get('/', function () {
    return view('login');
});

// Menampilkan halaman registrasi
Route::get('register', [UserAksesController::class, 'showRegister'])->name('register');
// Proses registrasi user
Route::post('register', [UserAksesController::class, 'RegisterProses'])->name('register.post');

// Menampilkan halaman login
Route::get('login', [UserAksesController::class, 'showLogin'])->name('login');
// Proses login
Route::post('login', [UserAksesController::class, 'LoginProses'])->name('login.post');

Route::middleware('auth')->group(function () {
    Route::get('index', [UserAksesController::class, 'index'])->name('index');
    Route::get('edit', [UserAksesController::class, 'edit'])->name('edit');
    Route::put('edit', [UserAksesController::class, 'update'])->name('update');
    // Upload file user
    Route::get('upload', [UserAksesController::class, 'showUpload'])->name('upload');
    // Proses logout
    Route::post('logout', [UserAksesController::class, 'logout'])->name('logout');
});
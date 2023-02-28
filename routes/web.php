<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::middleware("r")->group(function() {
    Route::get('/', [Controllers\IndexController::class, 'index'])->name('home');
});

Route::get('/posts', [Controllers\PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{id}', [Controllers\PostController::class, 'show'])->name('posts.show');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [Controllers\AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [Controllers\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/loginProcess', [Controllers\AuthController::class, 'login'])->name('loginProcess');

    Route::get('/register', [Controllers\AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/registerProcess', [Controllers\AuthController::class, 'register'])->name('registerProcess');
});

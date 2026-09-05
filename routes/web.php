<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\KritikController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\CastController;

// Halaman untuk yang BELUM login
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/forgot-password', function () {
        return view('forgot-password');
    })->name('forgot-password');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Halaman yang WAJIB login
Route::middleware('auth')->group(function () {
    Route::get('/', [FilmController::class, 'index'])->name('dashboard');

    Route::get('/users', [UserController::class, 'index'])->name('users');

    Route::resource('genre', GenreController::class);
    Route::resource('film', FilmController::class);
    Route::resource('actor', ActorController::class);
    Route::resource('cast', CastController::class); 
    Route::post('/film/{film}/kritik', [KritikController::class, 'store'])->name('kritik.store');
});
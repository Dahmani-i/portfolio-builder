<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PortfolioController;

// ─────────────────────────────────────────
// Public routes — anyone can access
// ─────────────────────────────────────────

// Home page
Route::get('/', function () {
    return view('welcome');
});

// Authentication
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Public portfolio page — accessible by anyone
Route::get('/portfolio/{username}', [PortfolioController::class, 'show'])->name('portfolio.show');

// ─────────────────────────────────────────
// Protected routes — must be logged in
// ─────────────────────────────────────────

Route::middleware('auth')->group(function () {
    // Profile management
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // ⚠️ M2 routes will be added here by Bakarid
    // ⚠️ M3 routes will be added here by Bougra
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'showRegisterForm'])->name('show.register');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('verify', [AuthController::class, 'verifyToken'])->name('verify');
Route::get('login', [AuthController::class, 'showLoginForm'])->name('loginForm');
Route::post('send-link', [AuthController::class, 'sendLink'])->name('sendLink');
Route::get('login-verify', [AuthController::class, 'login'])->name('loginVerify');
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('show.register');
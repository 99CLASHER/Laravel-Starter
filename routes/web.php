<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login/now', [AuthController::class, 'login'])->name('login.now');
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard'); // You can customize this
    })->name('dashboard');

    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

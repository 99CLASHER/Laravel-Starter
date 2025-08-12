<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login/now', [AuthController::class, 'login'])->name('login.now');
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard'); // You can customize this
    })->name('dashboard');

    Route::get('users/', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}/update', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{user}/delete', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('users/fetch', [UserController::class, 'fetch'])->name('users.fetch');
    Route::post('users/fetch-numbers', [UserController::class, 'fetchNumbers'])->name('users.fetch.numbers');

    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

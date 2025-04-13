<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);


Route::group(['middleware' => 'auth:api'], function () {

    Route::get('/getUsers', function () {
        return response()->json(['users' => '']);
    });

    Route::post('/logout', [AuthController::class, 'logout']);

});

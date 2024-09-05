<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ChirpController;
use App\Http\Controllers\Admin\NameController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:admin')->group(function () {
    Route::resource('posts', PostController::class)
        ->only(['index', 'create', 'show', 'edit', 'store', 'destroy', 'update']);
    Route::resource('users', UserController::class)
        ->only(['index', 'create', 'show', 'store', 'destroy']);
    Route::resource('names', NameController::class)
        ->only(['index', 'store', 'create', 'show', 'edit', 'update', 'destroy'])
        ->middleware('role:admin');
    Route::resource('chirps', ChirpController::class)
        ->only(['index', 'store', 'create', 'show', 'edit', 'update', 'destroy']);
    Route::get('logout', [AuthController::class, 'logout'])
        ->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'create'])->name('login');
    Route::post('login', [AuthController::class, 'store']);
});
<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])
    ->name('dashboard');
Route::get('/posts', [PostController::class, 'index'])
    ->name('posts.index');

Route::prefix('/posts/{post}')->group(function () {
    Route::get('/', [PostController::class, 'show'])
        ->name('posts.show');
    Route::resource('chirps', ChirpController::class)
        ->only(['store', 'show', 'update', 'destroy'])
        ->middleware(['auth', 'verified']);
});

require __DIR__ . '/auth_profile.php';
require __DIR__ . '/admin.php';
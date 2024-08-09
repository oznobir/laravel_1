<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])
    ->name('dashboard');
Route::get('/posts', [PostController::class, 'index'])
    ->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])
//    ->whereNumber('id')
    ->name('posts.show');

Route::get('posts/{post}/chirp/{chirp}', [PostController::class, 'chirp'])
//    ->whereNumber(['post', 'chirp'])
    ->name('posts.chirp')
    ->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

Route::resource('chirps', ChirpController::class)
    ->only(['store', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
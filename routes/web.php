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
Route::get('/posts/{id}', [PostController::class, 'show'])
    ->whereNumber('id')
    ->name('posts.show');

Route::post('posts/{id}/chirp', [PostController::class, 'chirp'])
    ->whereNumber('id')
    ->name('posts.chirps')
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
    ->only(['edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

//Route::resource('posts', PostController::class)
//    ->only(['index', 'create', 'store', 'destroy'])
//    ->middleware(['auth', 'verified']);

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
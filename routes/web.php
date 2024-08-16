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

Route::group([
    'prefix' => '/posts/{post}',
    'as' => 'posts.',
], function () {
    Route::get('/', [PostController::class, 'show'])
        ->name('show');
    Route::resource('chirps', ChirpController::class)
        ->only(['store', 'show', 'update', 'destroy'])
        ->middleware(['auth', 'verified']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});


require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
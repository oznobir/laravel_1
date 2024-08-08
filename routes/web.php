<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\NamesController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('chirps', ChirpController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

//Route::resource('posts', PostsController::class)
//    ->only(['index', 'create', 'store', 'destroy'])
//    ->middleware(['auth', 'verified']);

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
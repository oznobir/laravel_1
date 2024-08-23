<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\NameController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [IndexController::class, 'index'])
    ->name('index')
    ->middleware('auth:admin');

Route::resource('posts', UserController::class)
    ->only(['index', 'show', 'create', 'store', 'destroy', 'update'])
    ->middleware('auth:admin');

Route::resource('users', PostController::class)
    ->only(['index', 'show', 'create', 'store', 'destroy', 'update'])
    ->middleware('auth:admin');

Route::resource('names', NameController::class)
            ->only(['index', 'store', 'create', 'show', 'edit', 'update', 'destroy'])
            ->middleware('auth:admin');

Route::get('login', [AuthController::class, 'index'])
    ->name('login')
    ->middleware('guest');

Route::post('login', [AuthController::class, 'login'])
    ->name('login')
    ->middleware('guest');
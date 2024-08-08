<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\NamesController;
use App\Http\Controllers\Admin\PostsController;
use Illuminate\Support\Facades\Route;



Route::prefix('admin')->group(function () {
    Route::name('admin.')->group(function () {

        Route::get('/', function () {
            return view('admin.index');
        })->name('index');

        Route::resource('posts', PostsController::class)
            ->only(['index', 'show', 'create', 'store', 'destroy', 'update'])
            ->middleware(['auth:admin']);

        Route::resource('names', NamesController::class)
            ->only(['index', 'store', 'create', 'show', 'edit', 'update', 'destroy'])
            ->middleware(['auth:admin']);

        Route::get('login', [AuthController::class, 'index'])->name('login');

        Route::post('login_post', [AuthController::class, 'login'])->name('login_post');


    });
});
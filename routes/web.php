<?php

use App\Http\Controllers\NamesController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/names', [NamesController::class, 'index']);
Route::get('/names/{id}', [NamesController::class, 'show'])->whereNumber('id');
Route::get('/names/create/new', [NamesController::class, 'createNew']);
Route::get('/names/update/{id}', [NamesController::class, 'update'])->whereNumber('id');
Route::get('/names/delete/{id}', [NamesController::class, 'delete'])->whereNumber('id');

Route::get('/posts', [PostsController::class, 'index']);
Route::get('/posts/new', [PostsController::class, 'create']);
Route::get('/posts/delete/last', [PostsController::class, 'deleteLast']);

Route::get('/user/{id}', function ($userId) {
    echo 'id пользователя - ' . $userId;
});


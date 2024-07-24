<?php

use App\Http\Controllers\NamesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/names', [NamesController::class, 'index']);
Route::get('/names/{id}', [NamesController::class, 'show'])->whereNumber('id');
Route::get('/names/create/new', [NamesController::class, 'createNew']);
Route::get('/names/update/{id}', [NamesController::class, 'update'])->whereNumber('id');
Route::get('/names/delete/{id}', [NamesController::class, 'delete'])->whereNumber('id');

Route::get('/user/{id}', function ($userId) {
    echo 'id пользователя - ' . $userId;
});


<?php

use App\Http\Controllers\NamesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/names', [NamesController::class, 'index']);

Route::get('/user/{id}', function ($userId) {
    echo 'id пользователя - ' . $userId;
});


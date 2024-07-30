<?php

use App\Http\Controllers\NamesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

require __DIR__.'/auth.php';


Route::get('/', function () {
    return view('index');
});

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/names', [NamesController::class, 'index']);
    Route::get('/names/{id}', [NamesController::class, 'show'])->whereNumber('id');
    Route::get('/names/update/{id}', [NamesController::class, 'update'])->whereNumber('id');
    Route::get('/names/delete/{id}', [NamesController::class, 'delete'])->whereNumber('id');

    Route::post('/names/create', [NamesController::class, 'create']);
    Route::view('names/new', 'post.name');

    Route::get('/posts', [PostsController::class, 'index']);
    Route::get('/posts/delete/{id}', [PostsController::class, 'delete'])->whereNumber('id');
    Route::get('/posts/delete/last', [PostsController::class, 'deleteLast']);

    Route::post('/posts/create', [PostsController::class, 'create']);
    Route::view('posts/new', 'post.post');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::get('/user/{id}', function ($userId) {
//    echo 'id пользователя - ' . $userId;
//});

require __DIR__ . '/auth.php';

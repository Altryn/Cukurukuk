<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);
Route::get('/about', function () {
    return view('about');
});
Route::get('/blogs', function () {
    return view('blogs');
});

Route::get('/register', [AuthController::class, 'register'])->name('register'); 
Route::post('/register', [AuthController::class, 'store']);
 
Route::get('/login', [AuthController::class, 'login'])->name('login'); 
Route::post('/login', [AuthController::class, 'authenticate']); 

Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); 

Route::resource('blogs', PostsController::class)->except(['index', 'show'])->middleware('auth');
Route::resource('blogs', PostsController::class)->only(['show','index','create','edit','update','store','destroy']);
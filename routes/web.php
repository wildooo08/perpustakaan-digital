<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\OnlyAdmin;
use App\Http\Middleware\OnlyClient;
use App\Http\Controllers\BookController;
use App\Http\Middleware\OnlyGuest;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::middleware(OnlyGuest::class)->group(function(){
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticating']);
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'registerProcess']);
});

Route::middleware('auth')->group(function(){
Route::get('logout', [AuthController::class, 'logout']);
Route::get('dashboard', [DashboardController::class, 'index'])->middleware( OnlyAdmin::class);
Route::get('profile', [UserController::class, 'profile'])->middleware(OnlyClient::class);
Route::get('books', [BookController::class, 'index']);
});
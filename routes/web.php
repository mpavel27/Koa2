<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'viewIndex'])->name('app.home');

Route::prefix('/login')->group(function () {
    Route::post('/validate', [LoginController::class, 'login']);
});

Route::prefix('/register')->group(function () {
    Route::post('/validate', [RegisterController::class, 'register']);
});

Route::get('/logout', [LoginController::class, 'logout']);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\ItemShop\MainController as ItemShopController;

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
    Route::get('/', [LoginController::class, 'viewLogin'])->name('login');
    Route::post('/validate', [LoginController::class, 'login']);
});

Route::prefix('/register')->group(function () {
    Route::post('/validate', [RegisterController::class, 'register']);
});

Route::prefix('/user')->middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'view'])->name('app.user');
    Route::get('/characters', [UserController::class, 'viewCharacters'])->name('app.user.characters');
    Route::post('/character-debug/{id}', [UserController::class, 'debugCharacter'])->name('app.user.character.debug');
});

Route::prefix('/ranking')->middleware('auth')->group(function () {
    Route::get('/', [RankingController::class, 'viewPlayers'])->name('app.ranking');
    Route::get('/players', [RankingController::class, 'viewPlayers'])->name('app.ranking.players');
    Route::get('/guilds', [RankingController::class, 'viewGuilds'])->name('app.ranking.guilds');
});

Route::get('/news/{id}', [MainController::class, 'viewNews'])->name('app.news');

Route::get('/download', [UserController::class, 'viewDownload'])->name('app.user.download')->middleware('auth');

Route::prefix('/board')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminController::class, 'viewIndex'])->name('app.admin.home');

    /* Events */
    Route::get('/events', [AdminController::class, 'viewEvents'])->name('app.admin.events');
    Route::get('/events/create', [AdminController::class, 'viewCreateEvents'])->name('app.admin.events.create');
    Route::post('/events/create/validate', [AdminController::class, 'createEvents'])->name('app.admin.events.create.validate');
    Route::post('/events/delete/validate', [AdminController::class, 'deleteEvents'])->name('app.admin.events.delete.validate');

    /* News */
    Route::get('/news', [AdminController::class, 'viewNews'])->name('app.admin.news');
    Route::get('/news/create', [AdminController::class, 'viewCreateNews'])->name('app.admin.news.create');
    Route::get('/news/manage/{id}', [AdminController::class, 'viewManageNews'])->name('app.admin.news.manage');
    Route::post('/news/manage/{id}/validate', [AdminController::class, 'manageNews'])->name('app.admin.news.manage.validate');
    Route::post('/news/create/validate', [AdminController::class, 'createNews'])->name('app.admin.news.create.validate');
    Route::post('/news/delete/validate', [AdminController::class, 'deleteNews'])->name('app.admin.news.delete.validate');
});

// Route::prefix('/ishop')->middleware('auth')->group(function () {
//     Route::get('/', [ItemShopController::class, 'viewItemShop'])->name('app.itemshop.home');
//     Route::get('/products', [ItemShopController::class, 'products'])->name('app.itemshop.products');
// });

// Route::get('/logmein/{player_id}/{sas}', [ItemShopController::class, 'login'])->name('app.itemshop.login');

// Route::get('/test', [ItemShopController::class, 'testview']);

// Route::get('/checkPort/{port}', [MainController::class, 'checkPortOpen']);

Route::get('/logout', [LoginController::class, 'logout'])->name('app.logout');

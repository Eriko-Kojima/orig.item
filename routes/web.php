<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\ItemController::class, 'home'])->name('home');

Route::prefix('items')->group(function () {
Route::get('/create', [App\Http\Controllers\ItemController::class, 'create']);
});

// 会員限定ルート 
Route::group(['middleware' => ['auth', 'can:isUser']], function() {

    Route::prefix('items')->group(function () {
        Route::post('/confirm', [App\Http\Controllers\ItemController::class, 'confirm']);
        Route::post('/store', [App\Http\Controllers\ItemController::class, 'store']);    
        Route::get('/complete', [App\Http\Controllers\ItemController::class, 'complete']);
    });
});

Auth::routes();

// 管理者限定ルート 
Route::group(['middleware'=> ['auth','can:isAdministrator']], function() {

    Route::prefix('admin')->group(function () {
        Route::get('/index', [App\Http\Controllers\ItemController::class, 'index']);
        Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
        Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
        Route::get('/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit']);
        Route::post('/update/{id}', [App\Http\Controllers\ItemController::class, 'update']);
        Route::post('/delete/{id}', [App\Http\Controllers\ItemController::class,'delete']);
    });

    Route::prefix('admin/member')->group(function () {    
        Route::get('/index', [App\Http\Controllers\UserController::class, 'index']);
        Route::get('/edit/{id}', [App\Http\Controllers\UserController::class, 'edit']);
        Route::post('/update/{id}', [App\Http\Controllers\UserController::class, 'update']);
        Route::post('/delete/{id}', [App\Http\Controllers\UserController::class,'delete']);
    });
});


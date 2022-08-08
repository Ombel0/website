<?php

use Illuminate\Support\Facades\Route;
use App\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/redirect', [App\Http\Controllers\HomeController::class, 'redirect']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/product', [App\Http\Controllers\AdminController::class, 'product']);

Route::post('/uploadproduct', [App\Http\Controllers\AdminController::class, 'uploadproduct']);

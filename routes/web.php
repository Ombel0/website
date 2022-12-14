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




Route::get('/search',[App\Http\Controllers\HomeController::class, 'search']);



Route::post('/addcart/{id}',[App\Http\Controllers\HomeController::class, 'addcart']);


Route::get('/showcart',[App\Http\Controllers\HomeController::class, 'showcart']);


Route::get('/delete/{id}',[App\Http\Controllers\HomeController::class, 'deletecart']);




Route::post('/order',[App\Http\Controllers\HomeController::class, 'confirmorder']);


//ROUTE  ADMIN

Route::get('/product', [App\Http\Controllers\AdminController::class, 'product']);

Route::post('/uploadproduct', [App\Http\Controllers\AdminController::class, 'uploadproduct']);

Route::get('/showproduct',[App\Http\Controllers\AdminController::class, 'showproduct']);
Route::get('/deleteproduct/{id}',[App\Http\Controllers\AdminController::class, 'deleteproduct']);
Route::get('/updateview/{id}',[App\Http\Controllers\AdminController::class, 'updateview']);

Route::post('/updateproduct/{id}',[App\Http\Controllers\AdminController::class, 'updateproduct']);

Route::get('/showorder',[App\Http\Controllers\AdminController::class, 'showorder']);
Route::get('/updatestatus/{id}',[App\Http\Controllers\AdminController::class, 'updatestatus']);

<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\source\IndexController;
use App\Http\Controllers\source\ProductController;


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

Route::get('/',[IndexController::class, 'index'] )->name('index');  
// Route::get('/', [App\Http\Controllers\source\indexController::class, 'index']);
//Route::get('/', [HomeController::class, 'index'])->name('home');
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//PRODUCT
Route::group(['prefix' => '/product'],function(){  
    Route::get('/',[ProductController::class, 'index'] )->name('product');
    Route::get('/{id}',[ProductController::class, 'show'] )->name('product.detail');
    Route::get('/category/{id}',[ProductController::class, 'showcategory'] )->name('product.showcategory');
});

<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\source\IndexController;
use App\Http\Controllers\source\OrderController;
use App\Http\Controllers\source\ProductController;
use App\Http\Controllers\source\CartController;


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
Route::get('search',[ProductController::class,'Search'])->name('product.search.pro');

Route::group(['prefix' => '/product'],function(){  
    Route::get('/',[ProductController::class, 'index'] )->name('product');
    Route::get('/{id}',[ProductController::class, 'show'] )->name('product.detail');
    Route::get('/category/{id}',[ProductController::class, 'showcategory'] )->name('product.showcategory');
    Route::get('/author/{id}',[ProductController::class, 'showauthor'] )->name('product.showauthor');
});

//ORDER
Route::group(['middleware' => ['auth:user']],function(){
    // CART
    Route::get('cart',[OrderController::class, 'index'])->name('order.cart');
    Route::get('cart/{id}',[OrderController::class, 'addToCart'])->name('order.addtocart');
    Route::post('cart/update',[OrderController::class, 'update'])->name('cart.update');
    Route::post('cart/update_ajax',[OrderController::class, 'updateAjax'])->name('cart.update.ajax');
    Route::get('cart/delete/{rowId}', [OrderController::class, 'remove'])->name('cart.delete');
    Route::get('checkout',[OrderController::class, 'checkout'])->name('order.checkout');
});

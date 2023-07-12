<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\source\IndexController;
use App\Http\Controllers\source\OrderController;
use App\Http\Controllers\source\ProductController;
use App\Http\Controllers\source\LoginController;
use App\Http\Controllers\source\UserController;
use App\Http\Controllers\source\AllController;






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
Auth::routes(); 
Route::get('/',[IndexController::class, 'index'] )->name('index');

// Route::get('/', [App\Http\Controllers\source\indexController::class, 'index']);
//Route::get('/', [HomeController::class, 'index'])->name('home');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => '/'],function(){

    //Login user
    Route::get('users/login',[LoginController::class,'loginForm'])->name("user.login");
    Route::post('users/login',[LoginController::class,'login'])->name("user.login.post");
    Route::get('users/logout',[LoginController::class,'logout'])->name("user.logout");
    Route::get('users/register',[LoginController::class,'registerForm'])->name("user.register");
    Route::post('users/register',[LoginController::class,'register'])->name("user.register.post");

    //profile
    Route::get('user/order-management',[UserController::class,'orderManagement'])->name("user.order_management");
    Route::get('user/account-management',[UserController::class,'accountManagement'])->name("user.account_management");
    Route::post('user/account-management',[UserController::class,'editUser'])->name("user.edit_account");
    Route::post('user/account-password',[UserController::class,'changePassword'])->name("user.change_password");


});





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
    Route::post('cart/add',[OrderController::class, 'addToCart'])->name('order.addtocart');
    Route::get('cart/{id}',[OrderController::class, 'addToCart1'])->name('order.addtocart1');
    // Route::post('cart/update',[OrderController::class, 'update'])->name('cart.update');
    Route::post('cart/update_ajax',[OrderController::class, 'updateAjax'])->name('cart.update.ajax');
    Route::get('cart/delete/{rowId}', [OrderController::class, 'remove'])->name('cart.delete');
    Route::get('checkout',[OrderController::class, 'checkout'])->name('order.checkout');
    Route::post('checkout_store',[OrderController::class, 'checkoutStore'])->name('order.checkout.store');
});



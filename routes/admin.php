<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;


Route::group(['prefix' => '/'],function(){
    Route::get('login',[Admin\LoginController::class, 'loginForm' ])->name('admin.login');
    Route::post('login',[Admin\LoginController::class, 'login' ])->name('admin.login.post');
    Route::get('logout',[Admin\LoginController::class, 'logout' ])->name('admin.logout');
  
    Route::group(['middleware' => ['auth:admin']],function(){
            // Route::get('/', function(){
            //     return view('admin.dashboard.index');
            // }) ->name('admin.dashboard');
            Route::get('/',[Admin\IndexsController::class,'index'])->name('admin.dashboard');
            // Product
            Route::group(['prefix' => '/product'],function(){
                Route::get('/',[Admin\ProductsController::class,'index'])->name('admin.product');
                Route::get('add',[Admin\ProductsController::class,'create'])->name('admin.product.create');
                Route::post('add-product',[Admin\ProductsController::class,'store'])->name('admin.product.store');
                Route::get('edit/{id}',[Admin\ProductsController::class,'edit'])->name('admin.product.edit');
                Route::post('update/{id}',[Admin\ProductsController::class,'update'])->name('admin.product.update');
                Route::get('show/{id}',[Admin\ProductsController::class,'show'])->name('admin.product.show');
                Route::get('destroy/{id}',[Admin\ProductsController::class,'destroy'])->name('admin.product.destroy');
            });
            // Oder
            Route::group(['prefix' => '/order'],function(){
                Route::get('/',[Admin\OrdersController::class,'index'])->name('admin.order');
                Route::get('/edit/{id}',[Admin\OrdersController::class,'show'])->name('admin.order.edit');
                Route::post('/update/{id}',[Admin\OrdersController::class,'update'])->name('admin.order.update');
                Route::get('destroy/{id}',[Admin\OrdersController::class,'destroy'])->name('admin.order.destroy');
            });
            // Category
            Route::group(['prefix' => '/category'],function(){
                Route::get('/',[Admin\CategorysController::class,'index'])->name('admin.category');
                Route::get('add',[Admin\CategorysController::class,'create'])->name('admin.category.create');
                Route::post('add-category',[Admin\CategorysController::class,'store'])->name('admin.category.store');
                Route::get('edit/{id}',[Admin\CategorysController::class,'edit'])->name('admin.category.edit');
                Route::post('update/{id}',[Admin\CategorysController::class,'update'])->name('admin.category.update');
                Route::get('show/{id}',[Admin\CategorysController::class,'show'])->name('admin.category.show');
                Route::get('destroy/{id}',[Admin\CategorysController::class,'destroy'])->name('admin.category.destroy');
            });
            // Banner
            Route::group(['prefix' => '/banner'],function(){
                Route::get('/',[Admin\BannersController::class,'index'])->name('admin.banner');
                Route::get('add',[Admin\BannersController::class,'create'])->name('admin.banner.create');
                Route::post('add-banner',[Admin\BannersController::class,'store'])->name('admin.banner.store');
                Route::get('edit/{id}',[Admin\BannersController::class,'edit'])->name('admin.banner.edit');
                Route::post('update/{id}',[Admin\BannersController::class,'update'])->name('admin.banner.update');
                Route::get('destroy/{id}',[Admin\BannersController::class,'destroy'])->name('admin.banner.destroy');
            });
            // Author
            Route::group(['prefix' => '/author'],function(){
                Route::get('/',[Admin\AuthorsController::class,'index'])->name('admin.author');
                Route::get('add',[Admin\AuthorsController::class,'create'])->name('admin.author.create');
                Route::post('add-author',[Admin\AuthorsController::class,'store'])->name('admin.author.store');
                Route::get('edit/{id}',[Admin\AuthorsController::class,'edit'])->name('admin.author.edit');
                Route::post('update/{id}',[Admin\AuthorsController::class,'update'])->name('admin.author.update');
                Route::get('show/{id}',[Admin\AuthorsController::class,'show'])->name('admin.author.show');
                Route::get('destroy/{id}',[Admin\AuthorsController::class,'destroy'])->name('admin.author.destroy');
            });
            // Produce
            Route::group(['prefix' => '/produce'],function(){
                Route::get('/',[Admin\ProducesController::class,'index'])->name('admin.produce');
                Route::get('add',[Admin\ProducesController::class,'create'])->name('admin.produce.create');
                Route::post('add-produce',[Admin\ProducesController::class,'store'])->name('admin.produce.store');
                Route::get('edit/{id}',[Admin\ProducesController::class,'edit'])->name('admin.produce.edit');
                Route::post('update/{id}',[Admin\ProducesController::class,'update'])->name('admin.produce.update');
                Route::get('show/{id}',[Admin\ProducesController::class,'show'])->name('admin.produce.show');
                Route::get('destroy/{id}',[Admin\ProducesController::class,'destroy'])->name('admin.produce.destroy');
            });
            // ProductImport

            Route::get('/product-import',[Admin\ProductImportsController::class,'index'])->name('admin.productimport');

            Route::group(['prefix' => '/product-import'],function(){
                Route::get('/',[Admin\ProductImportsController::class,'index'])->name('admin.productimport');
                Route::get('add',[Admin\ProductImportsController::class,'create'])->name('admin.productimport.create');
                Route::post('add-productimport',[Admin\ProductImportsController::class,'store'])->name('admin.productimport.store');
                //Route::get('edit/{id}',[Admin\ProductImportsController::class,'edit'])->name('admin.productimport.edit');
                //Route::post('update/{id}',[Admin\ProductImportsController::class,'update'])->name('admin.productimport.update');
                Route::get('show/{id}',[Admin\ProductImportsController::class,'show'])->name('admin.productimport.show');
                //Route::get('destroy/{id}',[Admin\ProductImportsController::class,'destroy'])->name('admin.productimport.destroy');
            });

            // User
            Route::group(['prefix' => '/user'],function(){
                Route::get('/',[Admin\UserController::class,'index'])->name('admin.user');
                Route::get('destroy/{id}',[Admin\UserController::class,'destroy'])->name('admin.user.destroy');
            });

    });
});

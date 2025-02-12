<?php

use App\Http\Controllers\Store\CategoryController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Store\StoreController;
use App\Http\Controllers\Store\ProductController;
use Illuminate\Support\Facades\Route;


//Site
Route::get('/', [HomeController::class, 'index'])->name('index.home');


//Store
Route::prefix('/store')->group(function (){
    Route::get('/home',[StoreController::class, 'index'])->name('home');
    Route::prefix('/products')->group(function () {
        Route::get('/index', [ProductController::class, 'index'])->name('store.products.index');
        Route::get('/create', [ProductController::class, 'create'])->name('store.products.create');
        Route::post('/create', [ProductController::class, 'store'])->name('store.products.store');
        Route::get('/show/{id}', [ProductController::class, 'show'])->name('store.products.show');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('store.products.edit');
        Route::put('/update/{id}', [ProductController::class, 'update'])->name('store.products.update');
        Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('store.products.destroy');
    });
    Route::prefix('/category')->group(function (){
        Route::get('/index',[CategoryController::class, 'index'])->name('store.category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('store.category.create');
        Route::post('/create', [CategoryController::class,'store'])->name('store.category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('store.category.edit');
        Route::put('/update/{id}', [CategoryController::class, 'update'])->name('store.category.update');
        Route::get('/show{id}', [CategoryController::class, 'show'])->name('store.category.show');
        Route::delete('/delete/{id}', [CategoryController::class, 'delete'])->name('store.category.delete');
    });
});


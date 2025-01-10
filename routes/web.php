<?php

use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Store\StoreController;
use App\Http\Controllers\Store\ProductController;
use Illuminate\Support\Facades\Route;


//Site
Route::get('/', [HomeController::class, 'index'])->name('index.home');

//Store
Route::get('/store',[StoreController::class, 'index'])->name('index.store');
Route::get('/store/products/index',[ProductController::class, 'index'])->name('index.store.products');
Route::get('/store/product/create',[ProductController::class, 'create'])->name('create.store.products');
Route::post('/store/product/create', [ProductController::class, 'store'])->name('store.store.products');
Route::get('/store/product/show/{id}', [ProductController::class, 'show'])->name('show.store.products');


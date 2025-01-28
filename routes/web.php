<?php

use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('welcome'); });

//Vistas de productos
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/producto/{categoria}', [ProductController::class, 'showProductsByCategory'])->name('products.showProductsByCategory');
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');


//PRODUCTS CATEGORIES
Route::get('/categories', [CategoryProduct::class, 'index'])->name('categoryProduct.index');
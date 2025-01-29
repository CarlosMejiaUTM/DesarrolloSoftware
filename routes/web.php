<?php

use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\PaymentController;

// Ruta principal redirige a products.index
Route::get('/', function () {
    return redirect()->route('products.index');
});

// Vistas de productos
Route::get('/products/search', [ProductController::class, 'search'])->name('products.index');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/producto/{categoria}', [ProductController::class, 'showProductsByCategory'])->name('products.showProductsByCategory');

// Carrito
Route::post('/cart/update/{id}', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
Route::post('/cart/remove/{id}', [CartController::class, 'removeItem']);
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

// Pago
Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
Route::post('/comprar', [PaymentController::class, 'comprar'])->name('payment.comprar');

// Dirección
Route::post('/address/store', [AddressController::class, 'store']);
Route::get('/address', [AddressController::class, 'getAddress']);

// Categorías de productos
Route::get('/categories', [CategoryProduct::class, 'index'])->name('categoryProduct.index');

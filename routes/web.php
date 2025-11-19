<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;

Route::get('/', [PageController::class, 'home']);
Route::get('/home', [PageController::class, 'home'])->name('home');
Route::get('/details/{id}', [PageController::class, 'details'])->name('details');
Route::get('/contact', [PageController::class, 'contact']);
Route::get('/offers', [PageController::class, 'offers']);

Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::put('/product/{id}/update', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{id}/delete', [ProductController::class, 'destroy'])->name('product.delete');




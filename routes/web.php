<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


// For clients/frontend
Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/show-product-details/{id}', [ProductController::class,'show'])->name('show');
Route::get('/about', [AboutController::class,'index'])->name('about');



// For Admin/backend
Route::get('/dashboard', [AdminDashboardController::class,'index'])->name('dashboard');
Route::get('/add-product', [ProductController::class,'create'])->name('add-product');
Route::get('/products', [ProductController::class,'index'])->name('products');
Route::get('/delete-products/{id}', [ProductController::class,'destroy'])->name('delete-products');
Route::get('/edit-product/{id}', [ProductController::class,'edit'])->name('edit');
Route::post('/store-product', [ProductController::class,'store'])->name('store');
Route::post('/update-product/{id}', [ProductController::class,'update'])->name('update');

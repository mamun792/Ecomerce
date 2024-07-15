<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Fontend\FontendController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubCategory\SubCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

Route::get('/',[FontendController::class,'indexs'])->name('home');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/logout', [ProfileController::class, 'logout'])->name('logout');
    Route::post('/purchase',[FontendController::class,'purchase'])->name('purchase');
    Route::get('/transaction',[FontendController::class,'transaction'])->name('transaction');
});

Route::middleware(['admin', 'auth'])->group(function () {
    
    Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');
    Route::resource('/category', CategoryController::class);
    Route::get('/subcategories', [CategoryController::class, 'getSubcategories'])->name('subcategories');

    Route::get('/subcategory', [SubCategoryController::class, 'index'])->name('subcategory.index');
    Route::get('/subcategory/create', [SubCategoryController::class, 'create'])->name('subcategory.create');
    Route::post('/subcategory', [SubCategoryController::class, 'store'])->name('subcategory.store');
   

    Route::resource('product',ProductController::class);
});

require __DIR__ . '/auth.php';

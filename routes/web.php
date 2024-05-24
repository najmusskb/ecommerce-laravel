<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;

Route::group(['prefix' => 'admin'], function() {
    Route::get('/dashboard', 'App\Http\Controllers\Backend\pagesController@index')->name('dashboard');

    // Brand Route for Crud
    Route::group(['prefix' => 'brand'], function() {
        Route::get('/manage', [BrandController::class, 'index'])->name('brand.manage');
        Route::get('/create', [BrandController::class, 'create'])->name('brand.create');
        Route::post('/store', [BrandController::class, 'store'])->name('brand.store');
        Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
        Route::put('/edit/{id}', [BrandController::class, 'update'])->name('brand.update');
        Route::DELETE ('/delete/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');
    });
});


Route::group(['prefix' => 'admin'], function() {
    Route::get('/dashboard', 'App\Http\Controllers\Backend\pagesController@index')->name('dashboard');

    // Brand Route for Crud
    Route::group(['prefix' => 'category'], function() {
        Route::get('/manage', [CategoryController::class, 'index'])->name('category.manage');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/edit/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::DELETE ('/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });
});


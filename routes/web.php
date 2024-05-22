<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BrandController;

Route::group(['prefix' => 'admin'], function() {
    Route::get('/dashboard', 'App\Http\Controllers\Backend\pagesController@index')->name('dashboard');

    // Brand Route for Route
    Route::group(['prefix' => 'brand'], function() {
        Route::get('/manage', [BrandController::class, 'index'])->name('brand.manage');
        Route::get('/create', [BrandController::class, 'create'])->name('brand.create');
        Route::post('/store', [BrandController::class, 'store'])->name('brand.store');
        Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
        Route::post('/edit/{id}', [BrandController::class, 'update'])->name('brand.update');
        Route::post('/delete/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');
    });
});


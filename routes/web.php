<?php

use Illuminate\Support\Facades\Route;
Route::group(['prefix'=> 'admin'],function(){
    route::get('/dashboard','App\Http\Controllers\Backend\pagesController@index')->name('dashboard');

    // Brand Route for Route
    Route::group(['prefix'=>'brand'],function(){
        Route::get('/manage','App\Http\Controllers\Backend\BrandController@index')->name('brand.manage');

        Route::get('/create','App\Http\Controllers\Backend\BrandController@create')->name('brand.create');

        Route::post('/store','App\Http\Controllers\Backend\BrandController@store')->name('brand.store');

        Route::get('/edit/{id}','App\Http\Controllers\Backend\BrandController@edit')->name('brand.edit');

        Route::post('/edit/{id}','App\Http\Controllers\Backend\BrandController@update')->name('brand.edit');

        Route::post('/delete/{id}','App\Http\Controllers\Backend\BrandController@destroy')->name('brand.destroy');

    });
});

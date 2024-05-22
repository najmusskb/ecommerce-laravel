<?php

use Illuminate\Support\Facades\Route;
Route::group(['prefix'=> 'admin'],function(){
    route::get('/dashboard','App\Http\Controllers\Backend\pagesController@index');

    route::get('/text','App\Http\Controllers\Backend\pagesController@text');
});

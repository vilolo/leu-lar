<?php

use Illuminate\Support\Facades\Route;

//不需要登录的接口
Route::namespace('Admin\\v1')->prefix('admin/v1')->group(function(){
    Route::get('/testNoLogin','TestController@testNoLogin');
    Route::post('/login','LoginController@login');
});

//需要登录的接口
Route::middleware('check_token')->namespace('Admin\\v1')->prefix('admin/v1')->group(function(){
    Route::get('/testLogin','TestController@testLogin');
});





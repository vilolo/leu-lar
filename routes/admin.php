<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Admin\\v1')->prefix('admin/v1')->group(function(){

    Route::prefix('auth')->group(function(){
        Route::post('login','AuthController@login');
        Route::post('me', 'AuthController@me');
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
    });

    Route::get('test','TestController@ttt');

});




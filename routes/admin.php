<?php

use Illuminate\Support\Facades\Route;

//http://leu.local/index.php/t
//Route::get('/t', 'Admin\v1\TestController@ttt');

Route::namespace('Admin\\v1')->prefix('admin/v1')->group(function(){

    //Route::post('test','TestController@ttt');

    Route::prefix('auth')->group(function(){
        Route::post('login','AuthController@login');
        Route::post('me', 'AuthController@me');
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
    });

    //NavigationController
    Route::prefix('navigation')->group(function(){
        Route::post('add','NavigationController@add');
    });

});




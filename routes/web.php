<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/','Admin\DashboardController@index')->name('dashboard');


Route::prefix('auth')->group(function () {
    route::get('/login', 'AuthController@index')->name('login');
    route::post('/login', 'AuthController@login');
    route::get('/register','AuthController@register')->name('register');
    route::post('/register','AuthController@register_p');
});

Route::prefix('admin')->group(function(){
    Route::prefix('jeniskasus')->group(function(){
        Route::get('/','Admin\JenisKasusController@index')->name('jeniskasus');
        Route::post('/','Admin\JenisKasusController@store');
        Route::post('/update/{d:id}', 'Admin\JenisKasusController@update');
        Route::post('/delete/{d:id}', 'Admin\JenisKasusController@delete');
    });

    Route::prefix('dahsboard')->group(function () {
        // Route::get('/','Admin\DashboardController@index')->name('dashboard');
    });

    Route::prefix('kondisikorban')->group(function () {
        Route::get('/','Admin\DashboardController@index')->name('dashboard');
        
    });
});
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

Route::prefix('auth')->group(function () {
    route::get('/login', 'AuthController@index')->name('login');
    route::post('/login', 'AuthController@login');
    route::get('/register','AuthController@register')->name('register');
    route::post('/register','AuthController@register_p');
});
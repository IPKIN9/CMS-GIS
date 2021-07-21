<?php

use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    route::get('/login', 'AuthController@index')->name('login');
    route::post('/login', 'AuthController@login');
    route::get('/register', 'AuthController@register')->name('register');
    route::post('/register', 'AuthController@register_p');
});
Route::prefix('/')->group(function () {
    route::get('/', 'AuthController@index')->name('login');
    route::post('/', 'AuthController@login');
    route::get('/register', 'AuthController@register')->name('register');
    route::post('/register', 'AuthController@register_p');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::prefix('jeniskasus')->group(function () {
            Route::get('/', 'Admin\JenisKasusController@index')->name('jeniskasus');
            Route::post('/', 'Admin\JenisKasusController@store');
            Route::post('/update/{d:id}', 'Admin\JenisKasusController@update');
            Route::get('/delete/{d:id}', 'Admin\JenisKasusController@delete');
        });

        Route::prefix('dahsboard')->group(function () {
            Route::get('/', 'Admin\DashboardController@index')->name('dashboard');
        });

        Route::prefix('jalan')->group(function () {
            Route::get('/', 'Admin\JalanController@index')->name('jalan');
            Route::post('/', 'Admin\JalanController@store');
            Route::post('/update/{id:id}', 'Admin\JalanController@update');
            Route::get('/delete/{id:id}', 'Admin\JalanController@destroy');
        });

        Route::prefix('kondisikorban')->group(function () {
            Route::get('/', 'Admin\KondisiKorbanController@index')->name('kondisikorban');
            Route::post('/', 'Admin\KondisiKorbanController@store');
            Route::post('/update/{d:id}', 'Admin\KondisiKorbanController@update');
            Route::get('/delete/{id:id}', 'Admin\KondisiKorbanController@destroy');
        });

        Route::resource('Kasus', 'Admin\KasusController')->except('create', 'show', 'update', 'destroy');
        Route::post('Kasus/Update', 'Admin\KasusController@update')->name('Kasus.update');
        Route::post('Kasus/Destroy', 'Admin\KasusController@destroy')->name('Kasus.destroy');
        Route::resource('Web Decsription', 'Admin\WebDescController')->except('create', 'show');

        Route::resource('Tkp', 'Admin\TkpController')
            ->except('create', 'show', 'update', 'destroy');
        Route::post('Tkp/Update', 'Admin\TkpController@update')->name('Tkp.update');
        Route::post('Tkp/Destroy', 'Admin\TkpController@destroy')->name('Tkp.destroy');

        Route::resource('ContactUs', 'Admin\ContactUsController')->except('create', 'show', 'update', 'destroy');
        Route::post('ContactUs/Update', 'Admin\ContactUsController@update')->name('ContactUs.update');
        Route::post('ContactUs/Destroy', 'Admin\ContactUsController@destroy')->name('ContactUs.destroy');
        Route::resource('Web_Decsription', 'Admin\WebDescController')
            ->except('create', 'show', 'update', 'destroy');
        Route::post('Web_Decsription/Update', 'Admin\WebDescController@update')->name('webdescription.update');
        Route::post('Web_Decsription/Destroy', 'Admin\WebDescController@destroy')->name('webdescription.destroy');
    });
    Route::get('/logout', 'AuthController@logout')->name('logout');
});

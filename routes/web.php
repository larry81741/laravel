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

Route::get('/', function () {
    return view('index');
});

Route::get('/news', 'NewsController@index');
//===============================聯絡我們===================================
Route::post('/contect_us/store', 'ContactUsController@store');
//===============================新增=======================================
Route::prefix('news')->group(function () {
    Route::get('/', 'FrontController@newsIndex');
    Route::get('/content/{id}', 'FrontController@newsContent');
});
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', 'HomeController@index');
    Route::prefix('news')->group(function () {
        Route::get('/', 'NewsController@index');
        Route::get('/create', 'NewsController@create');
        Route::post('/store', 'NewsController@store');
        Route::get('/edit/{id}', 'NewsController@edit');
        Route::post('/update/{id}', 'NewsController@update');
        Route::post('/delete/{id}', 'NewsController@delete');
    });

    Route::prefix('product')->group(function () {
        Route::get('/', 'ProductController@index');
        Route::get('/create', 'ProductController@create');
        Route::post('/store', 'ProductController@store');
        Route::get('/edit/{id}', 'ProductController@edit');
        Route::post('/update/{id}', 'ProductController@update');
        Route::post('/delete/{id}', 'ProductController@delete');
        Route::prefix('type')->group(function () {
            Route::get('/', 'ProductTypeController@index');
            Route::get('/create', 'ProductTypeController@create');
            Route::post('/store', 'ProductTypeController@store');
            Route::get('/edit/{id}', 'ProductTypeController@edit');
            Route::post('/update/{id}', 'ProductTypeController@update');
            Route::post('/delete/{id}', 'ProductTypeController@delete');
        });
    });
});
Route::prefix('product')->group(function () {
    Route::get('/', 'FrontController@productIndex');
    Route::get('/content/{id}', 'FrontController@productContent');
});


Route::get('/news/detail/{id}', 'NewsController@detail');
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

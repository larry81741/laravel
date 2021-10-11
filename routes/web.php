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
    return view('welcome');
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
        Route::get('/','HomeController@index');
        Route::prefix('news')->group(function () {
            Route::get('/', 'NewsController@index');
            Route::get('/create', 'NewsController@create');
            Route::post('/store', 'NewsController@store');
            Route::get('/edit/{id}', 'NewsController@edit');
            Route::post('/update/{id}', 'NewsController@update');
            Route::post('/delete/{id}', 'NewsController@delete');
        });
    });
Route::get('/news/detail/{id}', 'NewsController@detail');
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

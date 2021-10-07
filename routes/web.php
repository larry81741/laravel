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
//新增資料頁面
Route::get('/news/create', 'NewsController@create');
//儲存資料
Route::post('/news/store','NewsController@store');
//===============================修改=======================================
//編輯資料頁面
Route::get('/news/edit/{id}','NewsController@edit');
//更新資料
Route::post('/news/update/{id}', 'NewsController@update');
//===============================刪除=======================================
Route::get('/news/delete/{id}', 'NewsController@delete');



Route::get('/news/detail/{id}', 'NewsController@detail');


Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


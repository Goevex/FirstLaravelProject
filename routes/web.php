<?php

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

Route::Auth();


Route::get('/show/{id}', 'NewsController@selectOne')->name('news.select.one');
Route::patch('/update/{id}', 'NewsController@updateOne')->name('news.update.one');
Route::put('/insert', 'NewsController@insertOne')->name('news.insert.one');
Route::delete('/remove/{id}', 'NewsController@deleteOne')->name('news.delete.one');
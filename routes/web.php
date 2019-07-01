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

Auth::routes();

Route::get('/', 'PagesController@index')->name('page.index');

Route::group(['prefix' => 'admin-news'], function()
{
	Route::get('/', 'NewsController@newsIndex')->name('news.newsIndex');
	Route::get('/add', 'NewsController@newsAdd')->name('news.newsAdd');
	Route::get('/edit/{id}', 'NewsController@newsEdit')->name('news.newsEdit');
	Route::get('/delete/{id}', 'NewsController@newsDelete')->name('news.newsDelete');
	Route::post('/news-store', 'NewsController@newsStore')->name('news.newsStore');
	Route::post('/news-update', 'NewsController@newsUpdate')->name('news.newsUpdate');
});
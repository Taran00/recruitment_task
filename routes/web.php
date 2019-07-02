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

/*Auth::routes();*/

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/', 'PagesController@index')->name('page.index');

Route::group(['prefix' => 'admin-news', 'middleware' => 'auth'], function()
{
	Route::get('/', 'NewsController@newsIndex')->name('news.newsIndex');
	Route::get('/add', 'NewsController@newsAdd')->name('news.newsAdd');
	Route::get('/edit/{id}', 'NewsController@newsEdit')->name('news.newsEdit');
	Route::get('/delete/{id}', 'NewsController@newsDelete')->name('news.newsDelete');
	Route::post('/news-store', 'NewsController@newsStore')->name('news.newsStore');
	Route::post('/news-update', 'NewsController@newsUpdate')->name('news.newsUpdate');
});

Route::group(['prefix' => 'clients'], function()
{
	Route::get('/', 'ClientsController@clientsIndex')->name('clients.clientsIndex');
	Route::get('/simple-chart', 'ClientsController@chartIndex')->name('clients.chartIndex');
	Route::get('/turncate-client-db', 'ClientsController@turncateDb')->name('clients.turncateDb');
});

Route::group(['prefix' => 'csv'], function()
{
	Route::get('/csv-to-db/{file_name}', 'CsvFilesController@csvToDb')->name('csv.csvToDb');
	Route::post('/store-new-csv', 'CsvFilesController@storeNewCsv')->name('csv.storeNewCsv');
});
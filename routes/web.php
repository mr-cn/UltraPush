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

Route::get('/', function () {
	return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/market', 'HomeController@market')->name('market');
Route::get('/market/detail/{id}', 'HomeController@bookDetail')->name('bookDetail');
Route::get('/market/detail/{id}/feed', 'HomeController@bookFeed')->name('bookFeed');
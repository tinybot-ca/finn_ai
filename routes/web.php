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

Route::get('/', function () {
    return redirect('/presentation-for-linda');
});

Route::get('/home', function () {
    return redirect('/presentation-for-linda');
});

Route::get('/presentation-for-linda', 'HomeController@index');

Route::get('/comments/create', 'HomeController@create');
Route::post('/comments', 'HomeController@store');
Route::get('/comments/{comment}', 'HomeController@show');
Route::get('/comments/{comment}/edit', 'HomeController@edit');
Route::patch('/comments/{comment}', 'HomeController@update');
Route::get('/comments/{comment}/delete', 'HomeController@delete');
Route::delete('/comments/{comment}/delete', 'HomeController@destroy');
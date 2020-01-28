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
});

Route::get('test', function(){
    return "test";
});
Route::get('xyz',function(){
return view('xyz');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('categories/create','CategoryController@create')->middleWare('auth');
Route::post('categories/store','CategoryController@store')->middleWare('auth');
Route::get('categories','CategoryController@index');
Route::get('categories/{id}/show','CategoryController@show')->middleWare('auth');
Route::get('categories/{id}/edit','CategoryController@edit')->middleWare('auth');
Route::put('categories/{id}/update','CategoryController@update')->middleWare('auth');
Route::delete('categories/{id}/destroy','CategoryController@destroy')->middleWare('auth');

Route::resource('blogs','BlogController')->except([
    'index'
])->middleware('auth');
Route::get('blogs','BlogController@index');
Route::resource('tags','TagsController')->except([
    'index'
])->middleware('auth');
Route::get('tags','TagsController@index');

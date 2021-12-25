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

Route::get('/post','PostController@index')->name('post.index');
Route::get('/post/create','PostController@create')->name('post.create');
Route::post('/post','PostController@store')->name('post.store');
Route::get('/post/{id}','PostController@show')->name('post.show');
Route::get('/post/{id}/edit','PostController@edit')->name('post.edit');
Route::put('/post/{post}','PostController@update')->name('post.update');
Route::delete('/post/{id}','PostController@destroy')->name('post.destroy');
Route::get('/post/category/{category}','PostController@postWithCategory')->name('post.category');

/*
    建立controller並設定成resource
    建立model
    建立migration

*/
// Route::get('/category','CategoryController@index');
Route::resource('/category','CategoryController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

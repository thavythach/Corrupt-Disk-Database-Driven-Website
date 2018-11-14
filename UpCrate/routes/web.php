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
     return view('home');
 });

//Route::get('/', 'PagesController@proposal');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::get('/proposal', 'PagesController@proposal');
Route::get('/signin', 'PagesController@signin');

Route::get('/users/{id}', function($id){
    return 'This is user ' . $id;
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UsersController');

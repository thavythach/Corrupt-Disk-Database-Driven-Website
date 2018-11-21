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
use Illuminate\Http\Request;
use App\File;

//  Route::get('/', function () {
//      return view('home');
//  });

Route::get('/welcome', 'PagesController@landing');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::get('/proposal', 'PagesController@proposal');
Route::get('/signin', 'PagesController@signin');

// Route::get('/users/{id}', function($id){
//     return 'This is user ' . $id;
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/vault', 'FilesController@vault');
Route::post('/changePassword','UsersController@changePassword')->name('changePassword');
Route::post('renameFile', 'FilesController@rename');
Route::post('replaceFile', 'FilesController@replace');
Route::get('/deleteAccount', 'UsersController@delete');

Route::resource('users', 'UsersController');
Route::resource('files', 'FilesController');
Route::resource('owns', 'OwnsController');
Route::resource('groups', 'GroupAccessController');
Route::resource('groupFile', 'GroupFileController');
Route::get('/files/delete/{id}', 'FilesController@destroy');


Route::post('process', 'FilesController@store');

Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail/{email}','MailController@html_email');
Route::get('/friendShare', 'UsersController@friendShare');
Route::Post('/friendShare/process', 'UsersController@friendShareProcess');
Route::Post('/group/process', 'GroupAccessController@store');
Route::Post('/groupFile', 'GroupFileController@store');

Route::get('/loading', 'PagesController@loading');


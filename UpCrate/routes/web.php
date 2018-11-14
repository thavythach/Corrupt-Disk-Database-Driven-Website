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

Route::resource('files', 'FilesController');

Route::post('process', function (Request $request) {
    // cache the file
    $file = $request->file('file');

    // generate a new filename. getClientOriginalExtension() for the file extension
    $filename = $file->getClientOriginalName();
    $garbagefilename = $filename.time();

    // save to storage/app/photos as the new $filename
    $path = $file->storeAs('files', $garbagefilename);
    DB::insert('insert into file (id, file_path, visibility, name) values (?, ?, ?, ?)', [null, $path, 0,  $filename]);
    dd($path);
});

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
    return view('singleForm');
});
// Route::get('users', 'UserController@index');
// Route::delete('users/{id}','UserController@destroy')->name('users.destroy');

// Route::get('popup', 'App\Http\Controllers\UserController@ban');


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/' , 'UserController@index');
Route::post('/' , 'UserController@store');
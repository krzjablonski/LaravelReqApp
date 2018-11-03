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

Route::group(['prefix' => 'admin', 'middleware' => ['role:administrator']], function() {
    Route::resource('candidates', 'UserController');
});

Route::group(['prefix' => 'candidate', 'middleware' => ['role:administrator|candidate']], function() {
    Route::get('my-account', 'MyAccountController@show')->name('myaccount.show');
    Route::get('my-account/edit', 'MyAccountController@edit')->name('myaccount.edit');
    Route::patch('my-account', 'MyAccountController@update')->name('myaccount.update');
});

Route::get('storage/cv/{PESEL}/{filename}', 'CvController@show')->middleware('role:administrator|candidate');

Route::get('/', function(){
    return redirect()->route('login');
});

Auth::routes();

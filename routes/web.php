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
	return redirect()->route('admin.login');
});

//Admin Route Group
Route::group(['prefix' => 'admin'], function() {
	//Admin Auth Routes
	Route::get('login', 'AdminController@login')->name('admin.login');
    Route::post('authenticate', 'AdminController@authenticate')->name('admin.authenticate');
    Route::post('logout', 'AdminController@logout')->name('admin.logout');

    Route::group(['middleware' => 'admin'], function() {
    	//Properties
    	Route::get('property', 'PropertyController@index')->name('admin.property.index');
    	Route::get('property/create', 'PropertyController@create')->name('admin.property.create');
    	Route::post('property/store', 'PropertyController@store')->name('admin.property.store');
    	Route::get('property/{property}/edit', 'PropertyController@edit')->name('admin.property.edit');
    	Route::put('property/{property}/update', 'PropertyController@update')->name('admin.property.update');
    	Route::delete('property/{property}/destroy', 'PropertyController@destroy')->name('admin.property.destroy');
    	Route::get('property/import', 'PropertyController@import')->name('admin.property.import');
    	Route::post('property/import/handle', 'PropertyController@handleImport')->name('admin.property.import.handle');
    	//Users
    	Route::get('users', 'UserController@index')->name('admin.user.index');
    	Route::get('user/create', 'UserController@create')->name('admin.user.create');
    	Route::post('user/store', 'UserController@store')->name('admin.user.store');
    	Route::get('user/{user}/edit', 'UserController@edit')->name('admin.user.edit');
    	Route::put('user/{user}/update', 'UserController@update')->name('admin.user.update');
    	Route::delete('user/{user}/destroy', 'UserController@destroy')->name('admin.user.destroy');

    	
	});
});
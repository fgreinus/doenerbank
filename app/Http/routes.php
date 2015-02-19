<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['middleware' => 'admin', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {

	Route::get('/', [
		'as' => "admin_index",
		'uses' => "AdminController@getIndex"
	]);

	Route::get('/user/delete/{userId}', [
		'as' => "admin_user_delete",
		'uses' => "AdminController@getDeleteUser"
	]);

	Route::get('/user/edit/{userId}', [
		'as' => "admin_user_edit",
		'uses' => "AdminController@getEditUser"
	]);

	Route::group(['prefix' => 'orderday'], function() {

		Route::get('/', [
			'as' => 'admin_orderday_index',
			'uses' => 'OrderDayController@getIndex'
		]);

	});
});

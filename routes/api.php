<?php
use Illuminate\Http\Request;

Route::prefix('auth')->group(function () {
	Route::post('register', 'UserController@register');
	Route::post('login', 'AuthController@login');
	Route::get('refresh', 'AuthController@refresh');
	Route::group(['middleware' => 'auth:api'], function () {
		Route::get('user', 'AuthController@user');
		Route::get('logout', 'AuthController@logout');
	});
});

Route::group(['middleware' => 'auth:api'], function () {
	Route::prefix('user')->group(function () {
		Route::get('page', 'UserController@page');
		Route::get('edit/{id}', 'UserController@edit');
	});
	// Route::get('pegawai', 'PegawaiController@view')->name('pegawai');
	Route::prefix('pegawai')->group(function () {
		Route::get('page', 'PegawaiController@page');
		Route::get('trash', 'PegawaiController@trash');
		Route::get('edit/{id}', 'PegawaiController@edit');
		Route::post('update/{id}', 'PegawaiController@update');
		Route::post('delete/{id}', 'PegawaiController@delete');
		Route::post('delete-force/{id}', 'PegawaiController@deleteForce');
		Route::post('restore/{id}', 'PegawaiController@restore');
		Route::get('find', 'PegawaiController@find');
		Route::post('add', 'PegawaiController@add');
	});
});

<?php
use Illuminate\Http\Request;

Route::prefix('auth')->group(function () {
	Route::post('register', 'AuthController@register');
	Route::post('login', 'AuthController@login');
	Route::get('refresh', 'AuthController@refresh');
	Route::group(['middleware' => 'auth:api'], function () {
		Route::get('user', 'AuthController@user');
		Route::get('logout', 'AuthController@logout');
	});
});

Route::group([], function () {
	Route::get('pegawai', 'PegawaiController@view')->name('pegawai');
	Route::get('pegawai/page', 'PegawaiController@page');
	Route::get('pegawai/trash', 'PegawaiController@trash');
	Route::get('pegawai/edit/{id}', 'PegawaiController@edit');
	Route::post('pegawai/update/{id}', 'PegawaiController@update');
	Route::post('pegawai/delete/{id}', 'PegawaiController@delete');
	Route::post('pegawai/delete-force/{id}', 'PegawaiController@deleteForce');
	Route::post('pegawai/restore/{id}', 'PegawaiController@restore');
	Route::get('pegawai/find', 'PegawaiController@find');
	Route::post('pegawai/add', 'PegawaiController@add');
});

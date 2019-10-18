<?php
use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});

Route::group([], function () {
	Route::get('pegawai', 'PegawaiController@view')->name('pegawai');
	Route::get('pegawai/page', 'PegawaiController@page');
	Route::get('pegawai/edit/{id}', 'PegawaiController@edit');
	Route::post('pegawai/update/{id}', 'PegawaiController@update');
	Route::get('pegawai/find', 'PegawaiController@find');
	Route::post('pegawai/add', 'PegawaiController@add');
});

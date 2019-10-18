<?php
Route::get('/', function () {
	return view('content');
});

Auth::routes();

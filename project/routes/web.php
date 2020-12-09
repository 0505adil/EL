<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	Auth::logout();
    return view('home');
})->name('home');

Route::get('/registr', function () {
    return view('Auth.registr');
});
Route::get('/log', function () {
    return view('Auth.login');
})->name('log');

Route::get('/courses', function () {
    return view('courses');
});

Route::get('/courses','CoursesController@getData');

Route::get('/courses/get','CoursesController@insert');

Auth::routes();

Route::group( ['middleware' => 'auth', 'before' => 'auth' ],  function()
{
	   	Route::get('/basket', function () {
	    return view('basket');
	});

	Route::get('/basket','CoursesController@getOrders');

	Route::get('/basket/inc/{id}', 'CoursesController@inc')->name('basket/inc');

	Route::get('/basket/dec/{id}', 'CoursesController@dec')->name('basket/dec');
});
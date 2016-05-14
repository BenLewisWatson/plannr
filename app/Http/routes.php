<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
	Route::get('/job/create', function() { return view('job.create'); });
	Route::post('/job/create', 'JobController@createJob');
	Route::get('/job/{job}', 'JobController@showJob');
	Route::get('/jobs', 'JobController@showAllJobs');

	Route::get('/postcode/{postcode?}', function($postcode) {
		return (Postcode::lookup($postcode));
	});

	// Route::get('/job/create/modular', function() { return view('job.old-create'); });
	// Route::get('/job/create/map', function() { return view('job.map'); });
	
	Route::get('/client', 'ClientController@showAllClients');

	Route::get('/client/create', function() { return view('client.create'); });
	Route::post('/client/create', 'ClientController@createClient');
	
	Route::get('/client/{client?}', 'ClientController@showClient');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthCon1troller@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});

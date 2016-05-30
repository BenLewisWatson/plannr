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
	// Index
	Route::get('/', 'JobController@showAllJobs');

	// API
	Route::get('/api/search/client/{query}', 'APIController@filterClients');
	Route::get('/api/search/role/{query}', 'APIController@filterRoles');
	Route::get('/api/export/xls', 'APIController@exportXLS');
	Route::get('/api/export/csv', 'APIController@exportCSV');
	Route::get('/api/import/xls', 'APIController@importXLS');

	// Potcode Lookup
	// Deprecated
	Route::get('/postcode/{postcode?}', function($postcode) {
		return (Postcode::lookup($postcode));
	});
	
	Route::get('/api/import/csv', 'APIController@importCSV');

	// Search Controller
	Route::post('/search', 'SearchController@handleQuery');

	// Roles
	Route::group(['middleware' => ['auth']], function () {
		Route::get('/role/create', function() { return view('role.create'); });
		Route::post('/role/create', 'RoleController@createRole');
	});

	// Jobs
	Route::group(['middleware' => ['auth']], function () {
		Route::get('/job/create', function() { return view('job.create'); });
		Route::post('/job/create', 'JobController@createJob');
	});

	Route::get('/job', 'JobController@showAllJobs');
	Route::get('/job/{job}', 'JobController@showJob');
	Route::get('/job/map', 'JobController@showJobMap');
	Route::get('/job/map/ajax', 'JobController@showJobMapAjax');

	// Clients
	Route::group(['middleware' => ['auth']], function () {
		Route::get('/client/create', function() { return view('client.create'); });
		Route::post('/client/create', 'ClientController@createClient');
	});

	Route::get('/client', 'ClientController@showAllClients');
	Route::get('/client/{client?}', 'ClientController@showClient');
	Route::get('/search/client/{query?}', 'ClientController@filterClients');

	// Editor 
	Route::get('editor', function() { return view('editor'); });

	// Authentication routes
	Route::get('login', 'Auth\AuthController@getLogin');
	Route::post('login', 'Auth\AuthController@postLogin');
	Route::get('logout', 'Auth\AuthController@getLogout');

	// Registration Routes
	Route::get('register', 'Auth\AuthController@getRegister');
	Route::post('register', 'Auth\AuthController@postRegister');
	Route::group(['middleware' => 'web'], function () {
	    Route::auth();
	    Route::get('/', 'JobController@showAllJobs');
	});
});

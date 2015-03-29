<?php

/* Home */
Route::get('/',[
	'as' => 'home',
	'uses' => 'HomeController@index'
]);
Route::resource('home', 'HomeController');
Route::resource('results', 'ResultsController');


/*
*
* Auuthenticated group
*
*/
Route::group(array('before' => 'auth'), function(){
	/*
	/ CSRF group
	*/
	Route::group(array('before' => 'csrf'), function(){
		
	});

	Route::get('/contact-person/{registrationID}', [
		'as' => 'contact_person.show',
		'uses' => 'ContactPersonController@show'
	]);

	Route::get('/list-of-participants/export', ['as' => 'admin.export', 'uses' => 'AdminController@export']);

	Route::get('/list-of-participants', [
		'as' => 'dashboard',
		'uses' => 'AdminController@index'
	]);

	Route::get('/list-of-participants/juniors', [
		'as' => 'admin.showJuniors',
		'uses' => 'AdminController@showJuniors'
	]);


	Route::get('/list-of-participants/seniors', [
		'as' => 'admin.showSeniors',
		'uses' => 'AdminController@showSeniors'
	]);

	Route::get('/list-of-participants/contact_persons', [
		'as' => 'admin.showContactPersons',
		'uses' => 'AdminController@showContactPersons'
	]);

	/*  Sign out (GET) */
	Route::get('/sign-out', [
		'as' => 'sessions.signout',
		'uses' => 'SessionsController@destroy'
	]);
});

/*
*
* Unauthenticated group
*
*/
Route::group(array('before' => 'guest'), function(){
	/*
	/ CSRF group
	*/
	Route::group(array('before' => 'csrf'), function(){

		/* Sign in (POST) */
		Route::post('/admin', [
			'as' => 'sessions.store',
			'uses' => 'SessionsController@store'
		]);
			
	});

	/* Sign in (GET) */
	Route::get('/admin', [
		'as' => 'sessions.create',
		'uses' => 'SessionsController@create'
	]);
});
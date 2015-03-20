<?php

/* Home */
Route::get('/',[
	'as' => 'home',
	'uses' => 'HomeController@index'
]);


Route::resource('individual_registration', 'IndividualRegistrationController');

Route::get('another_person_registration/partcipant_registration/{contact_person_id}', ['as' => 'another_person_registration.createParticipantRegistration', 'uses' => 'AnotherPersonRegistrationController@createParticipantRegistration']);
Route::post('another_person_registration/partcipant_registration/{contact_person_id}', ['as' => 'another_person_registration.storeParticipantRegistration', 'uses' => 'AnotherPersonRegistrationController@storeParticipantRegistration']);
Route::resource('another_person_registration', 'AnotherPersonRegistrationController');

Route::get('group_registration/partcipants_registration/{contact_person_id}', ['as' => 'group_registration.createParticipantsRegistration', 'uses' => 'GroupRegistrationController@createParticipantsRegistration']);
Route::post('group_registration/partcipants_registration/{contact_person_id}', ['as' => 'group_registration.storeParticipantsRegistration', 'uses' => 'GroupRegistrationController@storeParticipantsRegistration']);
Route::resource('group_registration', 'GroupRegistrationController');


Route::resource('contact_person', 'ContactPersonController');
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
		Route::post('/sign-in', [
			'as' => 'sessions.store',
			'uses' => 'SessionsController@store'
		]);
			
	});

	/* Sign in (GET) */
	Route::get('/sign-in', [
		'as' => 'sessions.create',
		'uses' => 'SessionsController@create'
	]);
});
<?php

/* Home */
Route::get('/',[
	'as' => 'home',
	'uses' => 'HomeController@index'
]);


Route::resource('individual_registration', 'IndividualRegistrationController');
Route::get('another_person_registration/partcipant_registration/{contact_person_id}', ['as' => 'another_person_registration.createParticipantRegistration', 'uses' => 'AnotherPersonRegistrationController@createParticipantRegistration']);
Route::post('another_person_registration/partcipant_registration', ['as' => 'another_person_registration.storeParticipantRegistration', 'uses' => 'AnotherPersonRegistrationController@storeParticipantRegistration']);
Route::resource('another_person_registration', 'AnotherPersonRegistrationController');
Route::resource('group_registration', 'GroupRegistrationController');
Route::resource('results', 'ResultsController');
<?php namespace BCD\Forms;

use Laracasts\Validation\FormValidator;

class SignUpForm extends FormValidator {

	/**
	 * Validation rules for registering a participant
	 *
	 * @var array
	 */
	protected $rules = [
		'registration_type' => 'required',
		'first_name' => 'required|min:2',
		'last_name' => 'required|min:2',
		'birthdate' => 'required|date',
		'gender' => 'required',
		'complete_address_1' => 'required|min:2',
		'email_address' => 'required|email',
		'contact_number' => 'required',
		'race_shirt_size' => 'required',
		'terms' => 'required'
	];

} 
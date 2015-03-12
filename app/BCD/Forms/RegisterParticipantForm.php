<?php namespace BCD\Forms;

use Laracasts\Validation\FormValidator;

class RegisterParticipantForm extends FormValidator {

	/**
	 * Validation rules for registering a participant
	 *
	 * @var array
	 */
	protected $rules = [
		'registration_type' => 'required',
		'first_name' => 'required|max:60|min:2',
		'middle_name' => 'required|max:60|min:2',
		'last_name' => 'required|max:60|min:2',
		'birthdate' => 'required|date',
		'sex' => 'required',
		'street' => 'required|max:250|min:2',
		'city' => 'required|max:250|min:2',
		'province' => 'required|max:250|min:2',
		'email_address' => 'required|max:50|email|unique:participants',
		'contact_number' => 'required|max:20|min:11'
	];

} 
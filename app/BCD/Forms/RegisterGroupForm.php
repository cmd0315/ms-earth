<?php namespace BCD\Forms;

use Laracasts\Validation\FormValidator;

class RegisterGroupForm extends FormValidator {

	/**
	 * Validation rules for registering a participant
	 *
	 * @var array
	 */
	protected $rules = [
		'registration_type' => 'required',
		'first_name_1' => 'required|max:60|min:2',
		'middle_name_1' => 'required|max:60|min:2',
		'last_name_1' => 'required|max:60|min:2',
		'birthdate_1' => 'required|date',
		'sex_1' => 'required',
		'first_name_2' => 'required|max:60|min:2',
		'middle_name_2' => 'required|max:60|min:2',
		'last_name_2' => 'required|max:60|min:2',
		'birthdate_2' => 'required|date',
		'sex_2' => 'required',
		'first_name_3' => 'required|max:60|min:2',
		'middle_name_3' => 'required|max:60|min:2',
		'last_name_3' => 'required|max:60|min:2',
		'birthdate_3' => 'required|date',
		'sex_3' => 'required'

	];

} 
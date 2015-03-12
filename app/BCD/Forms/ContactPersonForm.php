<?php namespace BCD\Forms;

use Laracasts\Validation\FormValidator;

class ContactPersonForm extends FormValidator {

	/**
	 * Validation rules for adding a contact person
	 *
	 * @var array
	 */
	protected $rules = [
		'first_name' => 'required|max:60|min:2',
		'middle_name' => 'required|max:60|min:2',
		'last_name' => 'required|max:60|min:2',
		'street' => 'required|max:250|min:2',
		'city' => 'required|max:250|min:2',
		'province' => 'required|max:250|min:2',
		'email_address' => 'required|max:50|email|unique:contact_persons',
		'contact_number' => 'required|max:20|min:11'
	];

} 
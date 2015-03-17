<?php namespace BCD\Registrations;

class GroupRegistrationCommand {

	/**
	* @var mixed
	*/
	public $registration_id, $registration_type, $contact_person_id, $first_name_1, $middle_name_1, $last_name_1, $birthdate_1, $sex_1, $first_name_2, $middle_name_2, $last_name_2, $birthdate_2, $sex_2, $first_name_3, $middle_name_3, $last_name_3, $birthdate_3, $sex_3;

	/**
	* Constructor
	*
	* @param mixed
	*/
	function __construct($registration_id, $registration_type, $contact_person_id, $first_name_1, $middle_name_1, $last_name_1, $birthdate_1, $sex_1, $first_name_2, $middle_name_2, $last_name_2, $birthdate_2, $sex_2, $first_name_3, $middle_name_3, $last_name_3, $birthdate_3, $sex_3) 
	{
		$this->registration_id = $registration_id;
		$this->registration_type = $registration_type;
		$this->contact_person_id = $contact_person_id;
		$this->first_name_1 = $first_name_1;
		$this->middle_name_1 = $middle_name_1;
		$this->last_name_1 = $last_name_1;
		$this->birthdate_1 = $birthdate_1;
		$this->sex_1 = $sex_1;
		$this->first_name_2 = $first_name_2;
		$this->middle_name_2 = $middle_name_2;
		$this->last_name_2 = $last_name_2;
		$this->birthdate_2 = $birthdate_2;
		$this->sex_2 = $sex_2;
		$this->first_name_3 = $first_name_3;
		$this->middle_name_3 = $middle_name_3;
		$this->last_name_3 = $last_name_3;
		$this->birthdate_3 = $birthdate_3;
		$this->sex_3 = $sex_3;
	}
}
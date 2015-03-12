<?php namespace BCD\Registrations;

class IndividualRegistrationCommand {

	/**
	* @var mixed
	*/
	public $registration_id, $registration_type, $first_name, $middle_name, $last_name, $birthdate, $sex, $street, $city, $province, $email_address, $contact_number;

	/**
	* Constructor
	*
	* @param mixed
	*/
	function __construct($registration_id, $registration_type, $first_name, $middle_name, $last_name, $birthdate, $sex, $street, $city, $province, $email_address, $contact_number) 
	{
		$this->registration_id = $registration_id;
		$this->registration_type = $registration_type;
		$this->first_name = $first_name;
		$this->middle_name = $middle_name;
		$this->last_name = $last_name;
		$this->birthdate = $birthdate;
		$this->sex = $sex;
		$this->street = $street;
		$this->city = $city;
		$this->province = $province;
		$this->email_address = $email_address;
		$this->contact_number = $contact_number;
	}
}
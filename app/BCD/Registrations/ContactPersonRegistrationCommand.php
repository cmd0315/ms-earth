<?php namespace BCD\Registrations;

class ContactPersonRegistrationCommand {

	/**
	* @var mixed
	*/
	public $contact_person_id, $first_name, $middle_name, $last_name, $street, $city, $province, $email_address, $contact_number;

	/**
	* Constructor
	*
	* @param mixed
	*/
	function __construct($contact_person_id, $first_name, $middle_name, $last_name, $street, $city, $province, $email_address, $contact_number) 
	{
		$this->contact_person_id = $contact_person_id;
		$this->first_name = $first_name;
		$this->middle_name = $middle_name;
		$this->last_name = $last_name;
		$this->street = $street;
		$this->city = $city;
		$this->province = $province;
		$this->email_address = $email_address;
		$this->contact_number = $contact_number;
	}
}
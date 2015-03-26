<?php namespace BCD\Registrations;

class SignUpCommand {

	/**
	* @var mixed
	*/
	public $registration_id, $first_name, $last_name, $birthdate, $gender, $complete_address_1, $complete_address_2, $email_address, $contact_number, $race_shirt_size, $more_first_name, $more_last_name, $more_birthdate, $more_gender, $more_race_shirt_size;

	/**
	* Constructor
	*
	* @param mixed
	*/
	function __construct($registration_id, $first_name, $last_name, $birthdate, $gender, $complete_address_1, $complete_address_2, $email_address, $contact_number, $race_shirt_size, $more_first_name, $more_last_name, $more_birthdate, $more_gender, $more_race_shirt_size) 
	{
		$this->registration_id = $registration_id;
		$this->first_name = $first_name;
		$this->last_name = $last_name;
		$this->birthdate = $birthdate;
		$this->gender = $gender;
		$this->complete_address_1 = $complete_address_1;
		$this->complete_address_2 = $complete_address_2;
		$this->email_address = $email_address;
		$this->contact_number = $contact_number;
		$this->race_shirt_size = $race_shirt_size;
		$this->more_first_name = $more_first_name;
		$this->more_last_name = $more_last_name;
		$this->more_birthdate = $more_birthdate;
		$this->more_gender = $more_gender;
		$this->more_race_shirt_size = $more_race_shirt_size;
	}
}
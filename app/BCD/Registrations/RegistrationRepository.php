<?php namespace BCD\Registrations;

use BCD\Registrations\Registration;

class RegistrationRepository {

	/**
	* Persists a Registration
	*
	* @param Registration $registration
	* @return Registration
	*/
	public function save(Registration $registration) {
		return $registration->save();
	}

	/**
	* Code Generator
	*
	* Returns random string with 16 characters
	* 
	* @return String $code
	*/
	public function generateCode() {
		$code = bin2hex(openssl_random_pseudo_bytes(16));
		return $code;
	}

	/**
	* Registration ID Generator
	* 
	*
	* Returns a unique string to be used as the registration ID
	*
	* @return String $code
	*/
	public function generateRegistrationID() {
		$registration_id = $this->generateCode();
		$existing_code = Registration::whereRegistrationID($registration_id)->get();

		if(!$existing_code) {
			$registration_id = $this->generateRegistrationID();
		}

		return $registration_id;
	}

	/**
	* Return instance of Registration
	*
	* @param String $registration_id
	* @return Registration
	*/
	public function getRegistrationByRegID($registration_id) {

		return Registration::whereRegistrationID($registration_id)->firstOrFail();
	}

	/**
	* Return race shirt sizes
	*
	* @return Array
	*/
	public function getRaceShirtSizes() {

		return $race_shirt_sizes = ['S' => 'S', 'M' => 'M', 'L' => 'L', 'XL' => 'XL'];
	}

	/**
	* Return genders/sexes
	*
	* @return Array
	*/
	public function getGenders() {

		return $genders = ['0' => 'Male', '1' => 'Female'];
	}

}
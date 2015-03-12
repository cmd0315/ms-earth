<?php namespace BCD\ContactPersons;

use BCD\ContactPersons\ContactPerson;

class ContactPersonRepository {

	/**
	* Persists a ContactPerson
	*
	* @param ContactPerson $contact_person
	* @return ContactPerson
	*/
	public function save(ContactPerson $contact_person) {
		return $contact_person->save();
	}

	/**
	* Code Generator
	*
	* Returns random string with 10 characters
	* 
	* @return String $code
	*/
	public function generateCode() {
		$code = bin2hex(openssl_random_pseudo_bytes(10));
		return $code;
	}

	/**
	* ID Generator
	* 
	*
	* Returns a unique string to be used as the contact person's ID
	*
	* @return String $id
	*/
	public function generateID() {
		$id = $this->generateCode();
		$existing_code = ContactPerson::where('contact_person_id', $id)->get();

		if(!$existing_code) {
			$id = $this->generateID();
		}

		return $id;
	}


    public function getPersonByID($contact_person_id) {
        return ContactPerson::where('contact_person_id', $contact_person_id)->firstOrFail();
    }

}
<?php namespace BCD\Registrations;

use Laracasts\Commander\CommandHandler;
use BCD\ContactPersons\ContactPerson;
use BCD\ContactPersons\ContactPersonRepository;

class ContactPersonRegistrationCommandHandler implements CommandHandler {
	
	/**
	* @var ContactPersonRepository $contactPersonRepository
	*/
	protected $contactPersonRepository;

	/**
	* Constructor
	*
	* @param ContactPersonRepository $contactPersonRepository
	*/
	function __construct(ContactPersonRepository $contactPersonRepository) {
		$this->contactPersonRepository = $contactPersonRepository;
	}


	/**
	*
	* Handle the command
	*
	* @param ContactPersonRegistrationCommand $command
	* @return mixed
	*/
	public function handle($command) {
		// Create Object then store to repository
		$contact_person = ContactPerson::add(
			$command->contact_person_id, $command->first_name, $command->middle_name, $command->last_name, $command->street, $command->city, $command->province, $command->email_address, $command->contact_number
		);
		$this->contactPersonRepository->save($contact_person);

		// Send e-mail confirmation

		return $contact_person;
	}
}
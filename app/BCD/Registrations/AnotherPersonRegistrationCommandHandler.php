<?php namespace BCD\Registrations;

use Laracasts\Commander\CommandHandler;
use BCD\Registrations\Registration;
use BCD\Registrations\RegistrationRepository;
use BCD\Participants\Participant;
use BCD\Participants\ParticipantRepository;

class AnotherPersonRegistrationCommandHandler implements CommandHandler {

	/**
	* @var RegistrationRepository $registrationRepository
	*/
	protected $registrationRepository;
	
	/**
	* @var ParticipantRepository $participantRepository
	*/
	protected $participantRepository;

	/**
	* Constructor
	*
	* @param RegistrationRepository $registrationRepository
	* @param ParticipantRepository $participantRepository
	*/
	function __construct(RegistrationRepository $registrationRepository, ParticipantRepository $participantRepository) {
		$this->registrationRepository = $registrationRepository;
		$this->participantRepository = $participantRepository;
	}


	/**
	*
	* Handle the command
	*
	* @param AnotherPersonRegistrationCommand $command
	* @return mixed
	*/
	public function handle($command) {
		// Create Registration Object
		$registration = Registration::addAnotherPerson(
			$command->registration_id, $command->registration_type, $command->contact_person_id
		);

		// Create Participant object
		$participant = Participant::register(
			$command->registration_id, $command->first_name, $command->middle_name, $command->last_name,
			$command->birthdate, $command->sex, $command->street, $command->city, $command->province, $command->email_address, $command->contact_number
		);

		$this->registrationRepository->save($registration);
		$this->participantRepository->save($participant);

		// Send e-mail confirmation

		return $participant;
	}
}
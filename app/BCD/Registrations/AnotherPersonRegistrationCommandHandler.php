<?php namespace BCD\Registrations;

use Laracasts\Commander\CommandHandler;
use BCD\Registrations\Registration;
use BCD\Registrations\RegistrationRepository;
use BCD\Participants\Participant;
use BCD\Participants\ParticipantRepository;
use BCD\Mailers\UserMailer;

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
	* @var UserMailer $mailer
	*/
	protected $mailer;

	/**
	* Constructor
	*
	* @param RegistrationRepository $registrationRepository
	* @param ParticipantRepository $participantRepository
	* @param UserMailer $mailer
	*/
	function __construct(RegistrationRepository $registrationRepository, ParticipantRepository $participantRepository, UserMailer $mailer) {
		$this->registrationRepository = $registrationRepository;
		$this->participantRepository = $participantRepository;
		$this->mailer = $mailer;
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

		if($this->registrationRepository->save($registration) && $this->participantRepository->save($participant)) {
			// Send e-mail confirmation
			$mailUser = $this->mailer->confirmRegistration($command->registration_id);
		}

		// Send e-mail confirmation

		return $participant;
	}
}
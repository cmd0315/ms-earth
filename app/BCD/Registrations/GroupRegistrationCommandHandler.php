<?php namespace BCD\Registrations;

use Laracasts\Commander\CommandHandler;
use BCD\Registrations\Registration;
use BCD\Registrations\RegistrationRepository;
use BCD\Participants\Participant;
use BCD\Participants\ParticipantRepository;
use BCD\ContactPersons\ContactPersonRepository;
use BCD\Mailers\UserMailer;

class GroupRegistrationCommandHandler implements CommandHandler {

	/**
	* @var RegistrationRepository $registrationRepository
	*/
	protected $registrationRepository;
	
	/**
	* @var ParticipantRepository $participantRepository
	*/
	protected $participantRepository;

	/**
	* @var ContactPersonRepository $contactPersonRepository
	*/
	protected $contactPersonRepository;

	/**
	* @var UserMailer $mailer
	*/
	protected $mailer;

	/**
	* Constructor
	*
	* @param RegistrationRepository $registrationRepository
	* @param ParticipantRepository $participantRepository
	* @param ContactPersonRepository $contactPersonRepository
	* @param UserMailer $mailer
	*/
	function __construct(RegistrationRepository $registrationRepository, ParticipantRepository $participantRepository, ContactPersonRepository $contactPersonRepository, UserMailer $mailer) {
		$this->registrationRepository = $registrationRepository;
		$this->participantRepository = $participantRepository;
		$this->contactPersonRepository = $contactPersonRepository;
		$this->mailer = $mailer;
	}


	/**
	*
	* Handle the command
	*
	* @param GroupRegistrationCommand $command
	* @return Registration
	*/
	public function handle($command) {
		// Create Registration Object
		$registration = Registration::addAnotherPerson(
			$command->registration_id, $command->registration_type, $command->contact_person_id
		);

		$contactPerson = $this->contactPersonRepository->getPersonByID($command->contact_person_id);

		// Create Participant objects
		$participant_1 = Participant::register(
			$command->registration_id, $command->first_name_1, $command->middle_name_1, $command->last_name_1,
			$command->birthdate_1, $command->sex_1, $contactPerson->street, $contactPerson->city, $contactPerson->province, $contactPerson->email_address, $contactPerson->contact_number, $command->race_shirt_size_1
		);

		$participant_2 = Participant::register(
			$command->registration_id, $command->first_name_2, $command->middle_name_2, $command->last_name_2,
			$command->birthdate_2, $command->sex_2, $contactPerson->street, $contactPerson->city, $contactPerson->province, $contactPerson->email_address, $contactPerson->contact_number, $command->race_shirt_size_2
		);

		$participant_3 = Participant::register(
			$command->registration_id, $command->first_name_3, $command->middle_name_3, $command->last_name_3,
			$command->birthdate_3, $command->sex_3, $contactPerson->street, $contactPerson->city, $contactPerson->province, $contactPerson->email_address, $contactPerson->contact_number, $command->race_shirt_size_3
		);



		if($this->registrationRepository->save($registration) && $this->participantRepository->save($participant_1) && $this->participantRepository->save($participant_2) && $this->participantRepository->save($participant_3)) {
			// Send e-mail confirmation
			$mailUser = $this->mailer->confirmRegistration($command->registration_id);
		}

		return $registration;
	}
}
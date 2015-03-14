<?php namespace BCD\Registrations;

use Laracasts\Commander\CommandHandler;
use BCD\Registrations\Registration;
use BCD\Registrations\RegistrationRepository;
use BCD\Participants\Participant;
use BCD\Participants\ParticipantRepository;
use Mail;
class IndividualRegistrationCommandHandler implements CommandHandler {

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
	* @param IndividualRegistrationCommand $command
	* @return mixed
	*/
	public function handle($command) {
		// Create Registration Object
		$registration = Registration::addIndividual(
			$command->registration_id, $command->registration_type
		);

		// Create Participant object
		$participant = Participant::register(
			$command->registration_id, $command->first_name, $command->middle_name, $command->last_name,
			$command->birthdate, $command->sex, $command->street, $command->city, $command->province, $command->email_address, $command->contact_number
		);

		if($this->registrationRepository->save($registration) && $this->participantRepository->save($participant)) {
			$recipient = $this->participantRepository->getParticipantByRegID($command->registration_id)->name;

			Mail::send('emails.confirmation.message', ['recipient' => $recipient], function($message)
			{
			    $message->to('charissedalida@gmail.com', 'John Smith')->subject('Ms. Earth 2015 Fun Run Registration');
			});
		}
		// Send e-mail confirmation
	
		return $participant;
	}
}
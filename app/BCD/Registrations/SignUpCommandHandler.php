<?php namespace BCD\Registrations;

use Laracasts\Commander\CommandHandler;
use BCD\Registrations\Registration;
use BCD\Registrations\RegistrationRepository;
use BCD\Participants\Participant;
use BCD\Participants\ParticipantRepository;
use BCD\Mailers\UserMailer;

class SignUpCommandHandler implements CommandHandler {

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
	* @param SignUpCommand $command
	* @return mixed
	*/
	public function handle($command) {
		// Create Registration Object
		$registration = Registration::addRegistration(
			$command->registration_id
		);

		$registrationSave = $this->registrationRepository->save($registration);

		// Create Participant object
		$participant = Participant::register(
			$command->registration_id, $command->first_name, $command->last_name,
			$command->birthdate, $command->gender, $command->complete_address_1, $command->complete_address_2, $command->email_address, $command->contact_number, $command->race_shirt_size, 0
		);

		$participantSave = $this->participantRepository->save($participant);

		//Add Members
		$more_first_names = $command->more_first_name;
		$more_last_names = $command->more_last_name;
		$more_birthdates = $command->more_birthdate;
		$more_genders = $command->more_gender;
		$more_race_shirt_sizes = $command->more_race_shirt_size;

		if($more_first_names && $more_last_names && $more_birthdates && $more_genders && $more_race_shirt_sizes){
			$count = 0;
			foreach($command->more_first_name as $more_first_name) {
				$more_last_name = $more_last_names[$count];
				$more_birthdate = $more_birthdates[$count];
				$more_gender = $more_genders[$count];
				$more_race_shirt_size = $more_race_shirt_sizes[$count];

				if($more_first_name != '' && $more_last_name != '' && $more_birthdate != '' && $more_gender != '' && $more_race_shirt_size != '') {
					$member = Participant::register($command->registration_id, $more_first_name, $more_last_name, $more_birthdate, $more_gender, $command->complete_address_1, $command->complete_address_2, $command->email_address, $command->contact_number, $more_race_shirt_size, 1);
					$memberSave = $this->participantRepository->save($member);
				}
				$count++;
			}
		}


		// if($registrationSave && $participantSave) {
		// 	// Send e-mail confirmation
		// 	$mailUser = $this->mailer->confirmRegistration($command->registration_id);
		// }

		return $participantSave;
	}
}
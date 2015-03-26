<?php
use BCD\Core\CommandBus;
use BCD\Forms\SignUpForm;
use BCD\Registrations\RegistrationRepository;
use BCD\Registrations\SignUpCommand;
use BCD\Participants\ParticipantRepository;
use Laracasts\Validation\FormValidationException;

class HomeController extends BaseController {

	use CommandBus;

	/**
	* @var SignUpForm $signUpForm
	*/
	private $signUpForm;

	/**
	* @var RegistrationRepository $registrations
	*/
	private $registrations;

	/**
	* @var ParticipantRepository $participants
	*/
	private $participants;


	/**
	* Constructor
	*
	* @param SignUpForm $signUpForm
	* @param RegistrationRepository $registrations
	* @param ParticipantRepository $participants
	*/
	function __construct(SignUpForm $signUpForm, RegistrationRepository $registrations, ParticipantRepository $participants) {
		$this->signUpForm = $signUpForm;
		$this->registrations = $registrations;
		$this->participants = $participants;

		$this->beforeFilter('csrf', ['on' => 'post']);
	}

	public function index()
	{
		$genders = $this->registrations->getGenders();
		$race_shirt_sizes = $this->registrations->getRaceShirtSizes();
		$max_replicate = 10;
		return View::make('home', ['pageTitle' => 'Home'], compact('genders', 'race_shirt_sizes', 'max_replicate'));
	}

	public function store() {
		// Check form for error
		try {
			$this->signUpForm->validate(Input::all());
		}
		catch(FormValidationException $error) {
			$url = URL::route('home') . '#sign-up';
			return Redirect::to($url)->withInput()->withErrors($error->getErrors());
		}

		// Extract post data
		extract(Input::only('first_name', 'last_name', 'birthdate', 'gender', 'complete_address_1', 'complete_address_2', 'email_address', 'contact_number', 'race_shirt_size', 'more_first_name', 'more_last_name', 'more_birthdate', 'more_gender', 'more_race_shirt_size'));

		$registration_id = $this->registrations->generateRegistrationID();

		// Execute command to insert participant data
		$registration = $this->execute(
			new SignUpCommand($registration_id, $first_name, $last_name, $birthdate, $gender, $complete_address_1, $complete_address_2, $email_address, $contact_number, $race_shirt_size, $more_first_name, $more_last_name, $more_birthdate, $more_gender, $more_race_shirt_size)
		);

		/** 
		* If registration is successful, 
		* go to results page to display results of registration; otherwise,
		* Display Flash error message
		*/
		if($registration) {
			return Redirect::route('results.show', $registration_id);
		}
		else {
			Flash::error('Error! Cannot complete registration.');
		}

		return Redirect::route('home.index');

	}

}

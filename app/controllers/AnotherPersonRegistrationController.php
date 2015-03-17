<?php
use BCD\Core\CommandBus;
use BCD\Forms\RegisterParticipantForm;
use BCD\Forms\ContactPersonForm;
use BCD\Registrations\RegistrationRepository;
use BCD\Participants\ParticipantRepository;
use BCD\ContactPersons\ContactPersonRepository;
use BCD\Registrations\ContactPersonRegistrationCommand;
use BCD\Registrations\AnotherPersonRegistrationCommand;
use Laracasts\Validation\FormValidationException;

class AnotherPersonRegistrationController extends \BaseController {

	use CommandBus;

	/**
	* @var ContactPersonForm $contactPersonForm
	*/
	private $contactPersonForm;

	/**
	* @var RegisterParticipantForm $registerParticipantForm
	*/
	private $registerParticipantForm;

	/**
	* @var RegistrationRepository $registrations;
	*/
	private $registrations;

	/**
	* @var ContactPersonRepository $contact_persons;
	*/
	private $contact_persons;

	/**
	* @var ParticipantRepository $participants
	*/
	private $participants;


	/**
	* Constructor
	*
	* @param ContactPersonForm $contactPersonForm
	* @param RegisterParticipantForm $registerParticipantForm
	* @param RegistrationRepository $registrations
	* @param ContactPersonRepository $contact_persons
	* @param ParticipantRepository $participants
	*/
	function __construct(ContactPersonForm $contactPersonForm, RegisterParticipantForm $registerParticipantForm, RegistrationRepository $registrations, ContactPersonRepository $contact_persons, ParticipantRepository $participants) {
		$this->contactPersonForm = $contactPersonForm;
		$this->registerParticipantForm = $registerParticipantForm;
		$this->registrations = $registrations;
		$this->contact_persons = $contact_persons;
		$this->participants = $participants;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('forms.contact_person', ['pageTitle' => 'Register Another Person']);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @param String $contact_person_id
	 * @return Response
	 */
	public function createParticipantRegistration($contact_person_id)
	{
		$contact_person = $this->contact_persons->getPersonByID($contact_person_id);
		return View::make('forms.another_person', ['pageTitle' => 'Register Another Person'], compact('contact_person'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Check form for error
		try {
			$this->contactPersonForm->validate(Input::all());
		}
		catch(FormValidationException $error) {
			return Redirect::back()->withInput()->withErrors($error->getErrors());
		}

		// Extract post data
		extract(Input::only('first_name', 'middle_name', 'last_name', 'street', 'city', 'province', 'email_address', 'contact_number'));

		$contact_person_id = $this->contact_persons->generateID();

		// Execute command to insert contact person data
		$registration = $this->execute(
			new ContactPersonRegistrationCommand($contact_person_id, $first_name, $middle_name, $last_name, $street, $city, $province, $email_address, $contact_number)
		);

		/** 
		* If registration is successful, 
		* go to form for registering participant
		* Display Flash error message
		*/
		if($registration) {
			return Redirect::route('another_person_registration.createParticipantRegistration', $contact_person_id);
		}
		else {
			Flash::error('Failed to register!');
		}

		return Redirect::route('another_person_registration.create');
	}
	

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param String $contact_person_id
	 * @return Response
	 */
	public function storeParticipantRegistration($contact_person_id)
	{
		// Check form for error
		try {
			$this->registerParticipantForm->validate(Input::all());
		}
		catch(FormValidationException $error) {
			return Redirect::back()->withInput()->withErrors($error->getErrors());
		}

		// Extract post data
		extract(Input::only('first_name', 'middle_name', 'last_name', 'birthdate', 'sex', 'street', 'city', 'province', 'email_address', 'contact_number', 'registration_type'));

		$registration_id = $this->registrations->generateRegistrationID();

		// Execute command to insert contact person data
		$registration = $this->execute(
			new AnotherPersonRegistrationCommand($registration_id, $registration_type, $contact_person_id, $first_name, $middle_name, $last_name, $birthdate, $sex, $street, $city, $province, $email_address, $contact_number)
		);

		/** 
		* If registration is successful, 
		* go to results page
		* Display Flash error message
		*/
		if($registration) {
			return Redirect::route('results.show', $registration_id);
		}
		else {
			Flash::error('Failed to register!');
		}

		return Redirect::route('another_person_registration.createParticipantRegistration');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}

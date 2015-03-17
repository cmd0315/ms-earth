<?php
use BCD\Core\CommandBus;
use BCD\Forms\RegisterGroupForm;
use BCD\Forms\ContactPersonForm;
use BCD\Registrations\RegistrationRepository;
use BCD\Participants\ParticipantRepository;
use BCD\ContactPersons\ContactPersonRepository;
use BCD\Registrations\ContactPersonRegistrationCommand;
use BCD\Registrations\GroupRegistrationCommand;
use Laracasts\Validation\FormValidationException;

class GroupRegistrationController extends \BaseController {

	use CommandBus;

	/**
	* @var ContactPersonForm $contactPersonForm
	*/
	private $contactPersonForm;

	/**
	* @var RegisterGroupForm $registerParticipantForm
	*/
	private $registerGroupForm;

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
	* @param RegisterGroupForm $registerGroupForm
	* @param RegistrationRepository $registrations
	* @param ContactPersonRepository $contact_persons
	* @param ParticipantRepository $participants
	*/
	function __construct(ContactPersonForm $contactPersonForm, RegisterGroupForm $registerGroupForm, RegistrationRepository $registrations, ContactPersonRepository $contact_persons, ParticipantRepository $participants) {
		$this->contactPersonForm = $contactPersonForm;
		$this->registerGroupForm = $registerGroupForm;
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
		return View::make('forms.group_contact_person', ['pageTitle' => 'Register Group']);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @param String $contact_person_id
	 * @return Response
	 */
	public function createParticipantsRegistration($contact_person_id)
	{
		$contact_person = $this->contact_persons->getPersonByID($contact_person_id);
		return View::make('forms.group', ['pageTitle' => 'Register Group'], compact('contact_person'));
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
			return Redirect::route('group_registration.createParticipantsRegistration', $contact_person_id);
		}
		else {
			Flash::error('Failed to register!');
		}

		return Redirect::route('group_registration.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param String $contact_person_id
	 * @return Response
	 */
	public function storeParticipantsRegistration($contact_person_id)
	{
		// Check form for error
		try {
			$this->registerGroupForm->validate(Input::all());
		}
		catch(FormValidationException $error) {
			return Redirect::back()->withInput()->withErrors($error->getErrors());
		}

		// Extract post data
		extract(Input::only('first_name_1', 'middle_name_1', 'last_name_1','birthdate_1', 'sex_1', 'first_name_2', 'middle_name_2', 'last_name_2', 'birthdate_2', 'sex_2', 'first_name_3', 'middle_name_3', 'last_name_3', 'birthdate_3', 'sex_3', 'registration_type'));

		$registration_id = $this->registrations->generateRegistrationID();


		// Execute command to insert contact person data
		$registration = $this->execute(
			new GroupRegistrationCommand($registration_id, $registration_type, $contact_person_id, $first_name_1, $middle_name_1, $last_name_1, $birthdate_1, $sex_1, $first_name_2, $middle_name_2, $last_name_2, $birthdate_2, $sex_2, $first_name_3, $middle_name_3, $last_name_3, $birthdate_3, $sex_3)
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

		return Redirect::route('group_registration.createParticipantsRegistration');
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

<?php
use BCD\Core\CommandBus;
use BCD\Forms\RegisterParticipantForm;
use BCD\Registrations\RegistrationRepository;
use BCD\Registrations\IndividualRegistrationCommand;
use BCD\Participants\ParticipantRepository;
use Laracasts\Validation\FormValidationException;

class IndividualRegistrationController extends \BaseController {

	use CommandBus;

	/**
	* @var RegisterParticipantForm $registerParticipantForm
	*/
	private $registerParticipantForm;

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
	* @param RegisterParticipantForm $registerEmployeeForm
	* @param RegistrationRepository $registrations
	* @param ParticipantRepository $participants
	*/
	function __construct(RegisterParticipantForm $registerParticipantForm, RegistrationRepository $registrations, ParticipantRepository $participants) {
		$this->registerParticipantForm = $registerParticipantForm;
		$this->registrations = $registrations;
		$this->participants = $participants;

		$this->beforeFilter('csrf', ['on' => 'post']);
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
		return View::make('individual.create', ['pageTitle' => 'Individual Registration']);
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
			$this->registerParticipantForm->validate(Input::all());
		}
		catch(FormValidationException $error) {
			return Redirect::back()->withInput()->withErrors($error->getErrors());
		}

		// Extract post data
		extract(Input::only('first_name', 'middle_name', 'last_name', 'birthdate', 'sex', 'street', 'city', 'province', 'email_address', 'contact_number', 'registration_type'));

		$registration_id = $this->registrations->generateRegistrationID();

		// Execute command to insert participant data
		$registration = $this->execute(
			new IndividualRegistrationCommand($registration_id, $registration_type, $first_name, $middle_name, $last_name, $birthdate, $sex, $street, $city, $province, $email_address, $contact_number)
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
			Flash::error('Failed to register!');
		}

		return Redirect::route('individual_registration.create');
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

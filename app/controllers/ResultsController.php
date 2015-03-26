<?php

use BCD\Registrations\RegistrationRepository;

class ResultsController extends \BaseController {

	/**
	* @var RegistrationRepository $registrations
	*/
	private $registrations;

	/**
	* Constructor
	*
	* @param RegistrationRepository $registrations
	*/
	function __construct(RegistrationRepository $registrations) {
		$this->registrations = $registrations;
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  String  $registration_id
	 * @return Response
	 */
	public function show($registration_id)
	{
		$registration = $this->registrations->getRegistrationByRegID($registration_id);
		
		return View::make('results', ['pageTitle' => 'Results'], compact('registration'));
	}


}

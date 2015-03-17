<?php
use BCD\ContactPersons\ContactPersonRepository;

class ContactPersonController extends \BaseController {

	/**
	* @var ContactPersonRepository $contactPersonRepository
	*/

	/**
	* Constructor
	*
	* @param ContactPersonRepository $contactPersonRepository
	*/
	function __construct(ContactPersonRepository $contactPersonRepository) {
		$this->contactPersonRepository = $contactPersonRepository;
		$this->beforeFilter('auth');
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
	 * Display the specified resource.
	 *
	 * @param  String  $contact_person_id
	 * @return Response
	 */
	public function show($contact_person_id)
	{
		$contact_person = $this->contactPersonRepository->getPersonByID($contact_person_id);

		return View::make('admin.contact-person-profile', ['pageTitle' => 'Contact Person Information'], compact('contact_person'));
	}


}

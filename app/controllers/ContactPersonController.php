<?php
use BCD\Participants\ParticipantRepository;

class ContactPersonController extends \BaseController {

	/**
	* @var ParticipantRepository $participantRepository
	*/

	/**
	* Constructor
	*
	* @param ParticipantRepository $participantRepository
	*/
	function __construct(ParticipantRepository $participantRepository) {
		$this->participantRepository = $participantRepository;
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  String  $registration_id
	 * @return Response
	 */
	public function show($registration_id)
	{
		$contact_person = $this->participantRepository->getContactPerson($registration_id);
		$members = $this->participantRepository->getMembers($registration_id);
		return View::make('admin.contact-person-profile', ['pageTitle' => 'Contact Person Information'], compact('contact_person', 'members'));
	}


}

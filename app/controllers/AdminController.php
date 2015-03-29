<?php
use BCD\ExportToExcel;
use BCD\Registrations\RegistrationRepository;
use BCD\Participants\ParticipantRepository;

class AdminController extends \BaseController {

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
	* @param RegistrationRepository $registrations
	* @param ParticipantRepository $participants
	*/
	function __construct(RegistrationRepository $registrations, ParticipantRepository $participants) {
		$this->registrations = $registrations;
		$this->participants = $participants;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$participants = $this->participants->getAllParticipants();
		$maleCount = sizeof($this->participants->getMaleParticipants($participants));
		$femaleCount = (sizeof($participants)) - $maleCount;

		$currentRow = 0;
		return View::make('admin.participants-list', ['pageTitle' => 'All'], compact('participants', 'currentRow', 'maleCount', 'femaleCount'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function showJuniors()
	{
		$participants = $this->participants->getJuniorParticipants();
		$maleCount = sizeof($this->participants->getMaleParticipants($participants));
		$femaleCount = (sizeof($participants)) - $maleCount;
		$currentRow = 0;
		return View::make('admin.participants-list', ['pageTitle' => 'Juniors'], compact('participants', 'currentRow', 'maleCount', 'femaleCount'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function showSeniors()
	{
		$participants = $this->participants->getSeniorParticipants();
		$currentRow = 0;
		$maleCount = sizeof($this->participants->getMaleParticipants($participants));
		$femaleCount = (sizeof($participants)) - $maleCount;
		return View::make('admin.participants-list', ['pageTitle' => 'Seniors'], compact('participants', 'currentRow', 'maleCount', 'femaleCount'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function showContactPersons()
	{
		$participants = $this->participants->getAllContactPersons();
		$currentRow = 0;
		$maleCount = sizeof($this->participants->getMaleParticipants($participants));
		$femaleCount = (sizeof($participants)) - $maleCount;
		$contactPerson = 0;
		return View::make('admin.participants-list', ['pageTitle' => 'Seniors'], compact('participants', 'currentRow', 'maleCount', 'femaleCount', 'contactPerson'));
	}

	/**
	* Export list of employees to Excel
	*
	* @return Excel
	*/
	public function export() 
	{
		$rejectReasons = $this->participants->getCSVReport();

		$excel = new ExportToExcel($rejectReasons, 'List of Participants for Ms. Earth 2015');

		return $excel->export();
	}



}

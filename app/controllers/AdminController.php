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
	public function showKids()
	{
		$participants = $this->participants->getKidParticipants();
		$maleCount = sizeof($this->participants->getMaleParticipants($participants));
		$femaleCount = (sizeof($participants)) - $maleCount;
		$currentRow = 0;
		return View::make('admin.participants-list', ['pageTitle' => 'Kids'], compact('participants', 'currentRow', 'maleCount', 'femaleCount'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function showTeens()
	{
		$participants = $this->participants->getTeenParticipants();
		$maleCount = sizeof($this->participants->getMaleParticipants($participants));
		$femaleCount = (sizeof($participants)) - $maleCount;
		$currentRow = 0;
		return View::make('admin.participants-list', ['pageTitle' => 'Teens'], compact('participants', 'currentRow', 'maleCount', 'femaleCount'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function showAdults()
	{
		$participants = $this->participants->getAdultParticipants();
		$currentRow = 0;
		$maleCount = sizeof($this->participants->getMaleParticipants($participants));
		$femaleCount = (sizeof($participants)) - $maleCount;
		return View::make('admin.participants-list', ['pageTitle' => 'Adults'], compact('participants', 'currentRow', 'maleCount', 'femaleCount'));
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

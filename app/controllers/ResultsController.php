<?php

use BCD\Participants\ParticipantRepository;

class ResultsController extends \BaseController {

	/**
	* @var ParticipantRepository $participants
	*/
	private $participants;

	/**
	* Constructor
	*
	* @param ParticipantRepository $participants
	*/
	function __construct(ParticipantRepository $participants) {
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
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  String  $registration_id
	 * @return Response
	 */
	public function show($registration_id)
	{
		$participant = $this->participants->getParticipantByRegID($registration_id);

		return View::make('results', ['pageTitle' => 'Congratulations!'], compact('participant'));
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

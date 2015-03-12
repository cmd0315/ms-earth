<?php namespace BCD\Participants;

use BCD\Participants\Participant;

class ParticipantRepository {

	/**
	* Persists a Participant
	*
	* @param Participant $participant
	* @return Participant
	*/
	public function save(Participant $participant) {
		return $participant->save();
	}

	
	public function getParticipantByRegID($registration_id) {
		return Participant::whereRegistrationID($registration_id)->firstOrFail();
	}

	
}
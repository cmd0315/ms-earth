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

	/**
	* Get all participants
	*
	* @return Participant
	*/
	public function getAllParticipants() {
		return Participant::withTrashed()->where('registration_id', '!=', '')->orderBy('created_at', 'ASC')->get();
	}

	public function getKidParticipants() {
		$kids = [];

		foreach($this->getAllParticipants() as $participant) {
			if(strcasecmp($participant->category, 'Kids') === 0) {
				array_push($kids, $participant);
			}
		}

		return $kids;
	}

	public function getTeenParticipants() {
		$teens = [];

		foreach($this->getAllParticipants() as $participant) {
			if(strcasecmp($participant->category, 'Teens') === 0) {
				array_push($teens, $participant);
			}
		}

		return $teens;
	}

	public function getAdultParticipants() {
		$adults = [];

		foreach($this->getAllParticipants() as $participant) {
			if(strcasecmp($participant->category, 'Adults') === 0) {
				array_push($adults, $participant);
			}
		}

		return $adults;
	}

	public function getSeniorParticipants() {
		$seniors = [];

		foreach($this->getAllParticipants() as $participant) {
			if(strcasecmp($participant->category, 'Seniors') === 0) {
				array_push($seniors, $participant);
			}
		}

		return $seniors;
	} 
	
}
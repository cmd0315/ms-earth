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

	public function getJuniorParticipants() {
		$kids = [];

		foreach($this->getAllParticipants() as $participant) {
			if(strcasecmp($participant->category, 'Juniors') === 0) {
				array_push($kids, $participant);
			}
		}

		return $kids;
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

	public function getMaleParticipants($participants) {
		$males = [];

		foreach($participants as $participant) {
			if($participant->sex == 0) {
				array_push($males, $participant);
			}
		}

		return $males;
	}

	public function getFemaleParticipants($participants) {
		$females = [];

		foreach($participants as $participant) {
			if($participant->sex > 0) {
				array_push($females, $participant);
			}
		}

		return $females;
	}


	/**
	* Return formatted results of table rows, to be used for exporting to excel
	*
	* @return array
	*/
	public function getCSVReport() {
		$participants = $this->getAllParticipants();

		$csvArray = [];
		$count = 0;

		foreach($participants as $participant) {

			$participantArray = [
				'#' => ++$count,
				'Registration ID' => $participant->registration->registration_id,
				'Registration Type' => $participant->registration->reg_type,
				'Date Registered' => $participant->created_at->toDateTimeString(),
				'First Name' => $participant->first_name,
				'Middle Name' => $participant->middle_name,
				'Last Name' => $participant->last_name,
				'Birthdate' => $participant->birthdate,
				'Sex' => $participant->segment,
				'Street' => $participant->street,
				'City' => $participant->city,
				'Province' => $participant->province,
				'Email Address' => $participant->email_address,
				'Contact Number' => $participant->contact_number
			];

			if($participant->registration->contactPerson) {
				$participantArray['Contact Person'] = $participant->registration->contactPerson->name;
			}

			array_push($csvArray, $participantArray);
		}

		return $csvArray;
	}
	
}
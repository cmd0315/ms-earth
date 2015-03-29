<?php namespace BCD\Mailers;

use BCD\Registrations\RegistrationRepository;
use BCD\Participants\ParticipantRepository;

use View, PDF;
class UserMailer extends Mailer {

	/**
	* @var RegistrationRepository $registrations
	*/
	protected $registrations;

	/**
	* @var ParticipantRepository $participants
	*/
	protected $participants;


	/**
	* Constructor
	*
	* @var RegistrationRepository $registrations
	* @var ParticipantRepository $participants
	*/
	function __construct(RegistrationRepository $registrations, ParticipantRepository $participants) {
		$this->registrations = $registrations;
		$this->participants = $participants;
	}


	
	/**
	* Get Registration Information
	*
	* @var String $registration_id
	* @return Registration
	*/
	public function getRegistrationInfo($registration_id) {
		return $registration = $this->registrations->getRegistrationByRegID($registration_id);

	}

	/**
	* Get Email Recipient
	*
	* @var Registration $registration
	* @return Participant
	*/
	public function getRecipient($registration_id) {
		return $contact_person = $this->participants->getContactPerson($registration_id);

	}


	/**
	* Get Email Attachment
	*
	* @var Registration $registration
	* @var String $recipientName
	* @return PDF
	*/
	public function getPDFAttachment($registration, $recipientName) {

		$view = View::make('pdfs.waiver', ['pageTitle' => 'Waiver Form'], compact('registration', 'recipientName'));
		return $pdf = PDF::load($view, 'Letter')->output();
	}



	/**
	* Send Confirmation Message
	*
	* @var String $registration_id
	* @return UserMailer
	*/
	public function confirmRegistration($registration_id) {

		$view = 'emails.confirmation';
		$subject = 'Miss Earth Fun Run Registration';

		$registration = $this->getRegistrationInfo($registration_id);

		$recipient = $this->getRecipient($registration_id);
		$recipientEmailAddress = $recipient->email_address;
		$recipientName = $recipient->name;

		$attachment = $this->getPDFAttachment($registration, $recipientName);
		$attachmentName = "Waiver Form.pdf";

		return $this->sendTo($recipientEmailAddress, $recipientName, $subject, $view, compact('recipientName', 'registration'), $attachment, $attachmentName);

	}
}
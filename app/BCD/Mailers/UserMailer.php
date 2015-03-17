<?php namespace BCD\Mailers;

use BCD\Registrations\RegistrationRepository;

use View, PDF;
class UserMailer extends Mailer {

	/**
	* @var RegistrationRepository $registrations
	*/

	protected $registrations;


	/**
	* Constructor
	*
	* @var RegistrationRepository $registrations
	*/
	function __construct(RegistrationRepository $registrations) {
		$this->registrations = $registrations;
	}


	
	/**
	* Get Email Recipient
	*
	* @var String $registration_id
	* @return Registration
	*/
	public function getRegistrationInfo($registration_id) {
		$registration = $this->registrations->getRegistrationByRegID($registration_id);

		return $registration;
	}

	/**
	* Get Email Recipient
	*
	* @var Registration $registration
	* @return Participant or ContactPerson
	*/
	public function getRecipient($registration) {
		$contact_person = $registration->contact_person;

		if($contact_person) {
			return $recipient = $contact_person;
		}
		else {
			$recipients = $registration->participants;

			return $recipient = $recipients[0];
		}
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

		$recipient = $this->getRecipient($registration);
		$recipientEmail = $recipient->email_address;
		// $recipientEmail = 'charissedalida@gmail.com';
		$recipientName = $recipient->name;

		$attachment = $this->getPDFAttachment($registration, $recipientName);
		$attachmentName = "Waiver Form.pdf";

		$this->sendTo($recipientEmail, $recipientName, $subject, $view, compact('recipientName', 'registration'), $attachment, $attachmentName);

	}
}
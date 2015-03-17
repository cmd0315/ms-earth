<?php namespace BCD\Mailers;

use Mail;

abstract class Mailer {

	public function sendTo($recipientEmail, $recipientName, $subject, $view, $data = [], $attachment, $attachmentName) {

		Mail::send($view, $data, function($message) use($recipientEmail, $recipientName, $subject, $attachment, $attachmentName)
		{
		    $message->to($recipientEmail, $recipientName)->subject($subject);
		    $message->attachData($attachment, $attachmentName);
		});

	}
}
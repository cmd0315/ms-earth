<?php namespace BCD\ContactPersons;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Eloquent, Carbon;

class ContactPerson extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'contact_persons';


	/**
	 * The fields that are allowed to be filled.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'contact_person_id', 'first_name', 'middle_name', 'last_name', 'street', 'city', 'province', 'email_address', 'contact_number'];

	 /**
    * Required for softdeletion of records
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    /**
    * Register a contact_person
    *
    * @param String
    * @return Contact Person
    */
    public static function add($contact_person_id, $first_name, $middle_name, $last_name, $street, $city, $province, $email_address, $contact_number) {
        $contact_person = new static(compact('contact_person_id', 'first_name', 'middle_name', 'last_name', 'street', 'city', 'province', 'email_address', 'contact_number'));
 
        return $contact_person;

        //raise an event
    }

}

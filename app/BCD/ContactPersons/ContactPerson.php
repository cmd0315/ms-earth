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
     * Specify the kind of relationship between the registration and contact person model from the perspective of the contact person model
     *
     * @return dependency between the two models
     */
    public function registration()
    {
        return $this->belongsTo('BCD\Registrations\Registration', 'contact_person_id', 'contact_person_id')->withTrashed(); //include soft deleted accounts
    }

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

    /**
    * Return concatenated first, middle, and last names of ContactPerson
    *
    * @return String
    */
    public function getNameAttribute() {

        return $name = ucfirst($this->first_name) . ' ' . ucfirst($this->middle_name) . ' ' . ucfirst($this->last_name);
    }
    

    /**
    * Return concatenated street, city, and provincial addresses of ContactPerson
    *
    * @return String $name
    */
    public function getAddressAttribute() {
        return $address = ucfirst($this->street) . ', ' . ucfirst($this->city) . ', ' . ucfirst($this->province);
    }

}

<?php namespace BCD\Registrations;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Eloquent, Carbon;

class Registration extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'registrations';


	/**
	 * The fields that are allowed to be filled.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'registration_id', 'registration_type', 'contact_person_id'];

	 /**
    * Required for softdeletion of records
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    /**
     * Specify the kind of relationship between the account and employee model from the perspective of the account model
     *
     * @return dependency between the two models
     */
    public function participants()
    {
        return $this->hasOne('BCD\Participants\Participant', 'registration_id', 'registration_id');
    }

     /**
     * Specify the kind of relationship between the account and employee model from the perspective of the account model
     *
     * @return dependency between the two models
     */
    public function contact_persons()
    {
        return $this->hasMany('BCD\ContactPersons\ContactPersons', 'contact_person_id', 'contact_person_id');
    }

    /**
    * Add registration entry
    *
    * @param String
    * @return Registration
    */
    public static function addIndividual($registration_id, $registration_type) {
        $registration = new static(compact('registration_id', 'registration_type'));
 
        return $registration;

        //raise an event
    }

}

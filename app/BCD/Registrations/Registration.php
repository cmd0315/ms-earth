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
	protected $fillable = ['id', 'registration_id'];

	 /**
    * Required for softdeletion of records
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    /**
     * Specify the kind of relationship between the registration and participant model from the perspective of the registration model
     *
     * @return dependency between the two models
     */
    public function participants()
    {
        return $this->hasMany('BCD\Participants\Participant', 'registration_id', 'registration_id');
    }

    /**
    * Add registration entry
    *
    * @param String $registration_id
    * @return Registration
    */
    public static function addRegistration($registration_id) {
        $registration = new static(compact('registration_id'));
 
        return $registration;

        //raise an event
    }


    /**
    * Return re-structured registration type
    *
    * @return String
    */
    public function getRegTypeAttribute() {
        $reg_type = 'Individual';

        if($this->registration_type == 1) {
            $reg_type = 'APerson';
        }
        else if($this->registration_type == 2) {
            $reg_type = 'Group';
        }
        else {
            $reg_type = $reg_type;
        }

        return $reg_type;
    }

    /**
    * Return date registered
    *
    * @return String
    */
   public function getDateRegisteredAttribute() {
        $year = date('Y', strtotime($this->created_at));
        $month = date('m', strtotime($this->created_at));
        $day = date('j', strtotime($this->created_at));
        $hr = date('g', strtotime($this->created_at));
        $min = date('i', strtotime($this->created_at));
        $sec = date('s', strtotime($this->created_at));
        
        return Carbon::create($year, $month, $day, $hr, $min, $sec)->toCookieString();
    }

}

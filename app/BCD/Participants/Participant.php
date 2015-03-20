<?php namespace BCD\Participants;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Eloquent, Carbon;

class Participant extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'participants';


	/**
	 * The fields that are allowed to be filled.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'registration_id', 'first_name', 'middle_name', 'last_name', 'birthdate', 'sex', 'street', 'city', 'province', 'email_address', 'contact_number', 'race_shirt_size'];

	 /**
    * Required for softdeletion of records
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    /**
     * Specify the kind of relationship between the registration and participant model from the perspective of the participant model
     *
     * @return dependency between the two models
     */
    public function registration()
    {
        return $this->belongsTo('BCD\Registrations\Registration', 'registration_id', 'registration_id')->withTrashed(); //include soft deleted accounts
    }

    /**
    * Register a participant
    *
    * @param String
    * @return Participant
    */
    public static function register($registration_id, $first_name, $middle_name, $last_name, $birthdate, $sex, $street, $city, $province, $email_address, $contact_number, $race_shirt_size) {
        $participant = new static(compact('registration_id', 'first_name', 'middle_name', 'last_name', 'birthdate', 'sex', 'street', 'city', 'province', 'email_address', 'contact_number', 'race_shirt_size'));
 
        return $participant;

        //raise an event
    }

    /**
    * Get age
    *
    * @return int
    */
    public function getAgeAttribute() {
        $birthdate = Carbon::parse($this->birthdate);
        $age = Carbon::createFromDate($birthdate->year, $birthdate->month, $birthdate->day)->age;
        return $age;
    }

    /**
    * Return race category that the Participant qualifies for
    *
    * @return String
    */
    public function getCategoryAttribute() {
        $category = 'Seniors';

        if($this->age <= 39) {
            $category = 'Juniors';
        }
        else {
            $category = $category;
        }

        return strtoupper($category);
    }
    
    /**
    * Return race segment that the Participant qualifies for
    *
    * @return String
    */
    public function getSegmentAttribute() {
        $segment = 'Male';

        if($this->sex > 0) {
            $segment = 'Female';
        }
        else {
            $segment = $segment;
        }

        return $segment;
    }

    /**
    * Return concatenated first, middle, and last names of Participant
    *
    * @return String
    */
    public function getNameAttribute() {
        return $name = ucfirst($this->first_name) . ' ' . ucfirst($this->middle_name) . ' ' . ucfirst($this->last_name);
    }

    /**
    * Return concatenated first, middle, and last names of Participant
    *
    * @return String 
    */
    public function getAddressAttribute() {
        return $address = ucfirst($this->street) . ', ' . ucfirst($this->city) . ', ' . ucfirst($this->province);
    }

}

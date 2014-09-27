<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Team extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'teams';
        
        public $errors;
        
        protected $fillable = [
            'name',
            'motto',
            'leader',
            'members',
            'tournaments',
            'imageurl',
        ];
        
        public static $rules = [
            'name'          => 'required|unique:teams',
            'motto'         => 'required',
            'leader'        => 'required',
            'members'       => 'required',
            'tournaments'   => '',
            'imageurl'      => '',
        ];
        
        public static $rulesUpdate = [
            'name'          => 'required',
            'motto'         => 'required',
            'leader'        => 'required',
            'members'       => 'required',
            'tournaments'   => '',
            'imageurl'      => '',
        ];
        
        public static $errorMessages = [
            'required' => 'Obligatoriskt fält',
            'unique' => 'Detta används redan av någon annan!',
        ];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
        
        public function setImageurlAttribute($value){
            $this->attributes['imageurl'] = (empty($value)) ? null : $value;
        }
        public function setTournamentsAttribute($value){
            //Allow null, and automatically json encode if not
            $this->attributes['tournaments'] = (empty($value)) ? null : json_encode($value);
        }
        public function setMembersAttribute($value){
            //Json encode since this is an array of members we are storing
            $this->attributes['members'] = json_encode($value);
        }
        
        public function getTournamentsAttribute(){
            return json_decode($this->attributes['tournaments'],true);
        }
        public function getMembersAttribute(){
            return json_decode($this->attributes['members'],true);
        }
        
        public function isValid()
        {
            //dd($this->attributes);
            $validation = Validator::make($this->attributes, static::$rules,static::$errorMessages);
            
            if ($validation->passes()) return true;

            $this->errors = $validation->messages();
            return false;
            
        }
        
        public function isValidUpdate()
        {
            
            $ruleset = static::$rulesUpdate;
            $ruleset['name'].='|unique:teams,name,'.$this->id; //Unique to all but this team
            $validation = Validator::make($this->attributes, $ruleset, static::$errorMessages);
            
            //Validate that all user exist
            foreach ($this->members as $member){
                if(!User::whereNickname($member)->count()){
                    $this->errors = $validation->messages();
                    $this->errors->add('missingmember','Användare '.$member.' finns inte!');
                    return false;
                }
            }
            
            if ($validation->passes()) return true;
            
            $this->errors = $validation->messages();
            
            return false;
            
        }
}

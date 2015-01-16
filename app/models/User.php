<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
        
        public $errors;
        
        protected $fillable = [
            'email',
            'forename',
            'lastname',
            'ssid',
            'streetaddress',
            'postalcode',
            'city',
            'phone',
            'password',
            'nickname',
            'avatarurl',
        ];
        
        public static $rules = [
            'email'         => 'required|unique:users|email',
            'forename'      => 'required|noshit',
            'lastname'      => 'required|noshit',
            'ssid'          => 'required|numeric|min:8|noshit',
            'streetaddress' => 'required|noshit',
            'postalcode'    => 'required|noshit',
            'city'          => 'required|noshit',
            'phone'         => 'required|noshit',
            'password'      => 'required|min:8|noshitpwd',
            'nickname'      => 'required|min:3|unique:users|noshit',
            'avatarurl'     => '',
            'membertype'    => 'noshit',
            'memberperiod'  => 'noshit',
            'accounttype'   => 'noshit',
            'status'        => 'noshit',
        ];
        
        public static $rulesUpdate = [
            'email'         => 'required|email',
            'forename'      => 'required|noshit',
            'lastname'      => 'required|noshit',
            'ssid'          => '|noshit',
            'streetaddress' => 'required|noshit',
            'postalcode'    => 'required|noshit',
            'city'          => 'required|noshit',
            'phone'         => 'required|noshit',
            'password'      => 'noshitpwd|min:8|required',
            'nickname'      => 'required|min:2|noshit',
            'avatarurl'     => '',
            'membertype'    => 'noshit',
            'memberperiod'  => 'noshit',
            'accounttype'   => 'noshit',
            'status'        => 'noshit',
        ];
        
        public static $errorMessages = [
            'required' => 'Obligatoriskt fält',
            'unique' => 'Detta används redan av någon annan!',
            'numeric' => 'Bara siffror!',
            'min' => 'Minst :min tecken!',
            'max' => 'Som mest :max tecken!',
            'email' => 'Se till att mata in en giltig epostaddress!',
            'noshit' => 'Du har tecken som inte är tillåtna. Lista ut vilka och ta bort dem!',
            'noshitpwd' => 'Du har tecken som inte är tillåtna. Lista ut vilka och ta bort dem!',
        ];

	protected $hidden = array('password', 'remember_token');

        public function mkevents(){
            return $this->belongsToMany('Mkevent');
        }
        
        public function teams(){
            return $this->belongsToMany('Team');
        }
        
        public function setPasswordAttribute($value){
            $this->attributes['password'] = Hash::make($value);
        }
        
        public function isValid()
        {
            $validation = Validator::make($this->attributes, static::$rules,static::$errorMessages);
            
            if ($validation->passes()) return true;

            $this->errors = $validation->messages();
            
            return false;
            
        }
        
        public function isValidUpdate()
        {
            
            $ruleset = static::$rulesUpdate;
            $ruleset['email'].='|unique:users,email,'.$this->id; //Unique to all but this user
            $ruleset['nickname'].='|unique:users,nickname,'.$this->id; //Unique to all but this user
            $validation = Validator::make($this->attributes, $ruleset, static::$errorMessages);
            
            if ($validation->passes()) return true;
            
            $this->errors = $validation->messages();
            
            return false;
            
        }
        
        public function fullname()
        {
            return $this->forename.' "'.$this->nickname.'" '.$this->lastname;
        }
        
        public function crew()
        {
            if($this->accounttype=='admin' || $this->accounttype=='crew') return true;
            return false;
        }
        
        public function admin()
        {
            if($this->accounttype=='admin') return true;
            return false;
        }

}

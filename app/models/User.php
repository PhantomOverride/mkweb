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
            'forename'      => 'required',
            'lastname'      => 'required',
            'ssid'          => 'required|numeric|min:8',
            'streetaddress' => 'required',
            'postalcode'    => 'required',
            'city'          => 'required',
            'phone'         => 'required',
            'password'      => 'required|min:8',
            'nickname'      => 'required|min:3|unique:users',
            'avatarurl'     => '',
            'membertype'    => '',
            'memberperiod'  => '',
            'accounttype'   => '',
            'status'        => '',
        ];
        
        public static $rulesUpdate = [
            'email'         => 'required|email',
            'forename'      => 'required',
            'lastname'      => 'required',
            'ssid'          => '',
            'streetaddress' => 'required',
            'postalcode'    => 'required',
            'city'          => 'required',
            'phone'         => 'required',
            'password'      => 'required|min:8',
            'nickname'      => 'required|min:2',
            'avatarurl'     => '',
            'membertype'    => '',
            'memberperiod'  => '',
            'accounttype'   => '',
            'status'        => '',
        ];
        
        public static $errorMessages = [
            'required' => 'Obligatoriskt fält',
            'unique' => 'Detta används redan av någon annan!',
            'numeric' => 'Bara siffror!',
            'min' => 'Minst :min tecken!',
            'max' => 'Som mest :max tecken!',
            'email' => 'Se till att mata in en giltig epostaddress!',
        ];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
        
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

}

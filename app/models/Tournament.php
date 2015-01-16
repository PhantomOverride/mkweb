<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Tournament extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tournaments';
        
        public $errors;
        
        protected $fillable = [
            'name',
            'shortname',
            'imageurl',
        ];
        
        public static $rules = [
            'name'          => 'required|unique:tournaments|noshit',
            'shortname'     => 'required|unique:tournaments|noshit',
            'imageurl'      => '',
        ];
        
        public static $rulesUpdate = [
            'name'          => 'required|noshit',
            'shortname'     => 'required|noshit',
            'imageurl'      => '',
        ];
        
        public static $errorMessages = [
            'required' => 'Obligatoriskt fält',
            'unique' => 'Detta används redan av en annan turnering!',
            'noshit' => 'Ogiltiga tecken!',
        ];

	public function mkevents(){
            return $this->belongsToMany('Mkevent');
        }
        
        public function teams(){
            return $this->belongsToMany('Team');
        }
        
        public function setImageurlAttribute($value){
            $this->attributes['imageurl'] = (empty($value)) ? null : $value;
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
            $ruleset['name'].='|unique:tournaments,name,'.$this->id; //Unique to all but this tournament
            $ruleset['shortname'].='|unique:tournaments,shortname,'.$this->id;
            $validation = Validator::make($this->attributes, $ruleset, static::$errorMessages);
            
            if ($validation->passes()) return true;
            
            $this->errors = $validation->messages();
            
            return false;
            
        }
}

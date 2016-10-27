<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Livepost extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'liveposts';
        
        protected $fillable = ['header','text','order'];
        
        public static $rules = [
            'header'         => 'required',
            'text'      => 'required',
            'order'      => 'required',
        ];
        
        public static $rulesUpdate = [
            'header'         => 'required',
            'text'      => 'required',
            'order'      => 'required',
        ];
        
        public static $errorMessages = [
            'required' => 'Obligatoriskt fält'
        ];
        
        public function isValidUpdate()
        {
            
            $ruleset = static::$rulesUpdate;
            $validation = Validator::make($this->attributes, $ruleset, static::$errorMessages);
            
            if ($validation->passes()) return true;
            
            $this->errors = $validation->messages();
            
            return false;
            
        }
        
        public function isValid()
        {
            $validation = Validator::make($this->attributes, static::$rules,static::$errorMessages);
            
            if ($validation->passes()) return true;

            $this->errors = $validation->messages();
            
            return false;
            
        }
        
}

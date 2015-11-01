<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Purchase extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'purchases';
        
        protected $fillable = ['paymentType','paid','products'];
        
        public static $rules = [
            'paymentType'         => 'required',
            'paid'      => 'required',
            'products'      => 'required',
        ];
        
        public static $errorMessages = [
            'required' => 'Obligatoriskt fält',
            'unique' => 'Fältet måste var unikt! Detta värde finns redan.',
        ];
        
        
        
        public function isValid()
        {
            $validation = Validator::make($this->attributes, static::$rules,static::$errorMessages);
            
            if ($validation->passes()) return true;

            $this->errors = $validation->messages();
            
            return false;
            
        }
        
}

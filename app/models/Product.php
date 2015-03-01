<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Product extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'products';
        
        protected $fillable = ['name','price','imageurl','start','stop','type'];
        
        public static $rules = [
            'name'         => 'required',
            'price'      => 'required',
            'imageurl'      => 'required',
            'start'          => 'required',
            'stop'          => 'required',
            'type'          => 'required',
        ];
        
        public static $errorMessages = [
            'required' => 'Obligatoriskt fält',
            'unique' => 'Fältet måste var unikt! Detta värde finns redan.',
        ];
        
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
        
}

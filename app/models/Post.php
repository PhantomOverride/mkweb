<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Post extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'posts';
        
        protected $fillable = ['title','content','posted','imageurl'];
        
        public static $rules = [
            'title'         => 'required|unique:posts',
            'content'      => 'required',
            'author'      => 'required',
            'posted'          => 'required',
        ];
        
        public static $rulesUpdate = [
            'title'         => 'required',
            'content'      => 'required',
            'author'      => 'required',
            'posted'          => 'required',
        ];
        
        public static $errorMessages = [
            'required' => 'Obligatoriskt fält',
            'unique' => 'Fältet måste var unikt! Detta värde finns redan.',
        ];
        
        public function setImageurlAttribute($value){
            $this->attributes['imageurl'] = (empty($value)) ? null : $value;
        }
        
        public function isValidUpdate()
        {
            
            $ruleset = static::$rulesUpdate;
            $ruleset['title'].='|unique:posts,title,'.$this->id; //Unique to all but this post
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

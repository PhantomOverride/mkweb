<?php

class Mkevent extends Eloquent {
    
    protected $table = 'mkevents';
    
	protected $fillable = ['title','year','imageurl'];
        
        public function tournaments(){
            return $this->belongsToMany('Tournament');
        }
        public function teams(){
            return $this->belongsToMany('Team');
        }
        public function users(){
            return $this->belongsToMany('User');
        }
        
        public function isValid(){
            return (!empty($this->name) && !empty($this->year));
        }
        
        public function isValidUpdate(){
            return $this->isValid();
        }
}
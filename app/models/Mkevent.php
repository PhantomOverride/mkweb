<?php

class Mkevent extends Eloquent {
    
    protected $table = 'mkevents';
    
	protected $fillable = [];
        
        public function tournaments(){
            return $this->belongsToMany('Tournament');
        }
        public function teams(){
            return $this->belongsToMany('Team');
        }
        public function users(){
            return $this->belongsToMany('User');
        }
}
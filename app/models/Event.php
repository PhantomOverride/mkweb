<?php

class Event extends \Eloquent {
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
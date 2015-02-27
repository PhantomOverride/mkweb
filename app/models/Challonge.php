<?php

class Challonge extends \Eloquent {
	protected $fillable = [];
        
        //This model interfaces with Challonge.
        
          public function __construct($challongeKey, $challongeAccount) {
            $this->challongeKey = $challongeKey;
            $this->challongeAccount = $challongeAccount;
          }
        
        public function isSetUp(){
            return ($this->challongeKey && $this->challongeAccount);
        }
        
        public function request($path = '', $params=array(), $method='get'){
            
            $params['api_key'] = $this->challongeKey;
            
            $curl_handle=curl_init();
            
            curl_close($curl_handle);
        }
        
        public function getTournaments(){
            if($this->isSetUp()){
                dd(true);
            }
        }
        
}
<?php

class EventController extends BaseController {
    
        protected $event;
        
    
        public function __construct(Event $event)
        {
            $this->event = $event;
        }

        public function index()
	{
		$events = $this->event->orderBy('id','desc')->get();
                return View::make('events.index', ['events' => $events])->with('nav',Page::navbar());
	}
        
        public function show($name)
        {
                $this->event = Event::whereTitle($name)->first();
                return View::make('events.show')->with('event',$this->event)->with('nav',Page::navbar());
            
        }
        
        public function edit($name=null){
            if($name != null){
                $this->event = $this->event->whereTitle($name)->first();
            }
            else{
                //We will init empty form
            }
            
            return View::make('events.edit')->with('event',$this->event)->with('nav',Page::navbar());
            
        }
        
        
        public function update($name=null){
            
            if($name != null){
                $this->event = $this->event->whereTitle($name)->first();
            }
            else{
                // Do nothing if new event
            }
            
            $newevent = Request::all();
            
            $this->event->fill($newevent);
            
            if($name != null && $this->event->isValidUpdate()){
                $this->event->save();
                $message = '<p class="box-rounded notis">Ändringarna av sidan har sparats!</p>';
                return Redirect::to('events/'.$this->event->title)->with('message',$message);
            }
            else if($this->event->isValid()){
                $this->event->save();
                $message = '<p class="box-rounded notis">Ändringarna av sidan har sparats!</p>';
                return Redirect::to('events/'.$this->event->title)->with('message',$message);
            }
            else{
                return Redirect::back()->withInput()->withErrors($this->event->errors)->with('nav',Page::navbar());
            }
        }

}

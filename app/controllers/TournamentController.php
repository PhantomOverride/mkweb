<?php

class TournamentController extends BaseController {
    
        protected $tournament;
        
    
        public function __construct(Tournament $tournament)
        {
            $this->tournament = $tournament;
        }

        public function index()
	{
            //We want to display all tournaments which are valid for the latest event
            
            $e = Mkevent::orderBy('id','desc')->first();
            
            $tournaments = $e->tournaments()->get();
            
            //$tournaments = $this->tournament->orderBy('id','desc')->get();
            //$tournaments = $this->tournament->all();
            return View::make('tournaments.index', ['tournaments' => $tournaments])->with('nav',Page::navbar());
	}
        
        public function show($name)
        {
                $this->tournament = Tournament::whereName($name)->first();
                if($this->tournament == null) return Redirect::to('/tournaments');
                return View::make('tournaments.show')->with('tournament',$this->tournament)->with('nav',Page::navbar());
            
        }
        
        public function edit($name=null){
            if($name != null){
                $this->tournament = $this->tournament->whereName($name)->first();
            }
            else{
                //We will init empty form
            }
            return View::make('tournaments.edit')->with('tournament',$this->tournament)->with('nav',Page::navbar());
            
        }
        
        
        public function update($name=null){
            if($name != null){
                $this->tournament = $this->tournament->whereName($name)->first();
            }
            else{
                // Do nothing if new tournament
            }
            
            $newtournament = Request::all();
            
            $this->tournament->name = $newtournament['name'];
            $this->tournament->shortname = $newtournament['shortname'];
            $this->tournament->imageurl = $newtournament['imageurl'];
            
            if($name != null && $this->tournament->isValidUpdate()){
                $this->tournament->save();
                $message = '<p class="box-rounded notis">Ändringarna av sidan har sparats!</p>';
                return Redirect::to('tournaments/'.$this->tournament->name)->with('message',$message);
            }
            else if($this->tournament->isValid()){
                $this->tournament->save();
                $message = '<p class="box-rounded notis">Ändringarna av sidan har sparats!</p>';
                return Redirect::to('tournaments/'.$this->tournament->name)->with('message',$message);
            }
            else{
                return Redirect::back()->withInput()->withErrors($this->tournament->errors)->with('nav',Page::navbar());
            }
        }

}

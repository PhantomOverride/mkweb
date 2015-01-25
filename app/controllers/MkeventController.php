<?php

class MkeventController extends BaseController {
    
        protected $mkevent;
        
    
        public function __construct(Mkevent $mkevent)
        {
            $this->mkevent = $mkevent;
        }

        public function index()
	{
		$mkevents = $this->mkevent->orderBy('id','desc')->get();
                //$mkevents = $this->mkevent->all();
                return View::make('mkevents.index', ['mkevents' => $mkevents])->with('nav',Page::navbar());
	}
        
        public function show($name)
        {
                $this->mkevent = Mkevent::whereName($name)->first();
                if($this->mkevent == null) return Redirect::to('/mkevents');
                
                return View::make('mkevents.show')->with('mkevent',$this->mkevent)->with('nav',Page::navbar());
            
        }
        
        public function edit($name=null){
            if($name != null){
                $this->mkevent = $this->mkevent->whereName($name)->first();
            }
            else{
                //We will init empty form
            }
            return View::make('mkevents.edit')->with('mkevent',$this->mkevent)->with('nav',Page::navbar());
            
        }
        
        
        public function update($name=null){
            if($name != null){
                $this->mkevent = $this->mkevent->whereName($name)->first();
            }
            else{
                // Do nothing if new mkevent
            }
            
            $newmkevent = Request::all();
            
            $this->mkevent->name = $newmkevent['name'];
            $this->mkevent->year = $newmkevent['year'];
            $this->mkevent->imageurl = $newmkevent['imageurl'];
            
            if($name != null && $this->mkevent->isValidUpdate()){
                $this->mkevent->save();
                $message = '<p class="box-rounded notis">Ändringarna av sidan har sparats!</p>';
                return Redirect::to('mkevents/'.$this->mkevent->name)->with('message',$message);
            }
            else if($this->mkevent->isValid()){
                $this->mkevent->save();
                $message = '<p class="box-rounded notis">Ändringarna av sidan har sparats!</p>';
                return Redirect::to('mkevents/'.$this->mkevent->name)->with('message',$message);
            }
            else{
                return Redirect::back()->withInput()->withErrors($this->mkevent->errors)->with('nav',Page::navbar());
            }
        }

}

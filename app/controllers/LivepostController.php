<?php

class LivepostController extends BaseController {
    
        protected $livepost;
        
    
        public function __construct(Livepost $livepost)
        {
            $this->livepost = $livepost;
        }
        
        public function index()
	{
		$liveposts = $this->livepost->where('order', '!=', 0)->orderBy('id','desc')->get();
                return View::make('liveposts.index', ['liveposts' => $liveposts])->with('nav',Page::navbar());
	}
        
        public function show($id)
        {
                $this->livepost = Livepost::whereId($id)->first();
                return View::make('liveposts.show')->with('livepost',$this->livepost)->with('nav',Page::navbar());
            
        }
        
        
        public function edit($id=null){
            if($id != null){
                $this->livepost = $this->livepost->whereId($id)->first();
            }
            else{
                //We will init empty form
            }
            
            return View::make('liveposts.edit')->with('livepost',$this->livepost)->with('nav',Page::navbar());
            
        }
        
        public function remove($id=null){
            if($id != null){
                $this->livepost = $this->livepost->whereId($id)->first();
                $this->livepost->delete();
            }
            else{
                //Do nothing
            }
            
            $message = '<p class="box-rounded notis">Live-posten har raderats!</p>';
            return Redirect::to('crew/')->with('message',$message);
            
        }
        
        public function update($id=null){
            
            if($id != null){
                $this->livepost = $this->livepost->whereId($id)->first();
            }
            else{
                // Do nothing if new post
            }
            
            $newlivepost = Input::only(['header','text','order']);
            
            $this->livepost->fill($newlivepost);
            
            if($id != null && $this->livepost->isValidUpdate()){
                $this->livepost->save();
                $message = '<p class="box-rounded notis">Ändringarna av liveposten har sparats!</p>';
                return Redirect::to('liveposts/'.$this->livepost->id)->with('message',$message);
            }
            else if($this->livepost->isValid()){
                $this->livepost->save();
                $message = '<p class="box-rounded notis">Ändringarna av liveposten har sparats!</p>';
                return Redirect::to('liveposts/'.$this->livepost->title)->with('message',$message);
            }
            else{
                return Redirect::back()->withInput()->withErrors($this->livepost->errors)->with('nav',Page::navbar());
            }
        }

}

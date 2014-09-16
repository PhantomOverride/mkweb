<?php

class CrmController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
    
        protected $page;
        
    
        public function __construct(Page $page)
        {
            $this->page = $page;
        }

	public function showWelcome()
	{
		return View::make('hello');
	}
        
        public function show($urlname,$suburlname=null)
        {
            $nav = $this->page->navbar();
            //$page = isset($suburlname) ? $suburlname : $urlname;
            if (isset($suburlname))
            {
                $pageurlname = $suburlname;
                $parentpageurlname = $urlname;
                
                $thispage = Page::whereUrlname($pageurlname)->whereParentname($parentpageurlname)->first();
                
                $parentpage = Page::whereUrlname($parentpageurlname)->first();
                return View::make('page')->with('page',$thispage)->with('parentpage',$parentpage)->with('nav',$nav);
            }
            else
            {
                $pageurlname = $urlname;
                
                $thispage = Page::whereUrlname($pageurlname)->first();
                return View::make('page')->with('page',$thispage)->with('nav',$nav);
            }
            
        }
        
        public function edit($urlname=null,$suburlname=null){
            if($suburlname == null && $urlname != null){
                $thispage = $this->page->whereUrlname($urlname)->first();
            }
            else if($suburlname == null && $urlname == null){
                $thispage = $this->page; //We will init empty form
                
            }
            else{
                $thispage = $this->page->whereUrlname($suburlname)->whereParentname($urlname)->first();
            }
            
            return View::make('page.edit')->with('page',$thispage)->with('nav',$this->page->navbar());
            
        }
        
        
        public function update($urlname=null,$suburlname=null){
            
            if($suburlname == null && $urlname != null){
                $this->page = $this->page->whereUrlname($urlname)->first();
            }
            else if($suburlname == null && $urlname == null){
                // Do nothing if new page
            }
            else{
                $this->page = $this->page->whereUrlname($suburlname)->whereParentname($urlname)->first();
            }
            
            $newpage = Input::only(['urlname','name','title','content','parentname','order','linkto']);
            
            //I think this is debug code which made it into production. I'll just comment it out...
            /*
            foreach($newpage as $field){
                $field = empty($field) ? null : $field;
                echo $field;
            }
            */
            
            $this->page->fill($newpage);
            $this->page->save();
            $savemsg = '<p class="box-rounded notis">Ändringarna av sidan har sparats!</p>';
            return Redirect::back()->with('message',$savemsg);
        }

}

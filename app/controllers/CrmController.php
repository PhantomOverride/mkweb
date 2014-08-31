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

}

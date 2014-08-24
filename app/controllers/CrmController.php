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

	public function showWelcome()
	{
		return View::make('hello');
	}
        
        public function show($urlname,$suburlname=null)
        {
            //$page = isset($suburlname) ? $suburlname : $urlname;
            if (isset($suburlname))
            {
                $pageurlname = $suburlname;
                $parentpageurlname = $urlname;
                
                $thispage = Page::whereUrlname($pageurlname)->whereParentname($parentpageurlname)->first();
                
                $parentpage = Page::whereUrlname($parentpageurlname)->first();
                return View::make('page')->with('page',$thispage)->with('parentpage',$parentpage);
            }
            else
            {
                $pageurlname = $urlname;
                
                $thispage = Page::whereUrlname($pageurlname)->first();
                return View::make('page')->with('page',$thispage);
            }
            
        }

}

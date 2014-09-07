<?php

class CrewController extends BaseController {
    
    public function index(){
        return View::make('crew.index')->with('nav',Page::navbar());
    }
    
}

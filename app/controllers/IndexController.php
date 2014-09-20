<?php

class IndexController extends BaseController {

        public function index(){
            return View::make('index')->with('nav',Page::navbar());
        }

}

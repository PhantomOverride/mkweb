<?php

class IndexController extends BaseController {

        public function index(){
            return View::make('index')->with('posts',Post::orderBy('id','DESC')->take(3)->get())->with('nav',Page::navbar());
        }

}

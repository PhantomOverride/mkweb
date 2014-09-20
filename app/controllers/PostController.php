<?php

class PostController extends BaseController {
    
        protected $post;
        
    
        public function __construct(Post $post)
        {
            $this->post = $post;
        }

        public function index()
	{
		$posts = $this->post->all();
                return View::make('posts.index', ['posts' => $posts])->with('nav',Page::navbar());
	}
        
        public function show($urlname)
        {
                $this->post = Post::whereTitle($urlname)->first();
                return View::make('posts.show')->with('post',$this->post)->with('nav',Page::navbar());
            
        }
        
        public function edit($urlname=null){
            if($urlname != null){
                $this->post = $this->post->whereTitle($urlname)->first();
            }
            else{
                //We will init empty form
            }
            
            return View::make('posts.edit')->with('post',$this->post)->with('nav',Page::navbar());
            
        }
        
        
        public function update($urlname=null){
            
            if($urlname != null){
                $this->post = $this->post->whereTitle($urlname)->first();
            }
            else{
                // Do nothing if new post
            }
            
            $newpost = Input::only(['title','content','posted','imageurl']);
            
            $this->post->fill($newpost);
            
            $this->post->author = Auth::user()->fullname();
            if($urlname != null && $this->post->isValidUpdate()){
                $this->post->save();
                $message = '<p class="box-rounded notis">Ändringarna av sidan har sparats!</p>';
                return Redirect::to('posts/'.$this->post->title)->with('message',$message);
            }
            else if($this->post->isValid()){
                $this->post->save();
                $message = '<p class="box-rounded notis">Ändringarna av sidan har sparats!</p>';
                return Redirect::to('posts/'.$this->post->title)->with('message',$message);
            }
            else{
                return Redirect::back()->withInput()->withErrors($this->post->errors)->with('nav',Page::navbar());
            }
        }

}

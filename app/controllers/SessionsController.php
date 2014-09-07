<?php

class SessionsController extends BaseController {
    public function create(){
        
        if(Auth::check()) return Redirect::route('users.show',Auth::user()->nickname);
        
        return View::make('sessions.create')->with('nav',Page::navbar());
    }
    
    public function store(){
        
        if(Auth::attempt(Input::only('email','password'))){
            return Redirect::route('users.show',Auth::user()->nickname);
        }
        
        return Redirect::back()->withInput()->with('message','<p>Försök att mata in rätt! Du stavade nog fel i lösenordet! Eller något. Typ.</p>');
    }
    
    public function destroy(){
        
        Auth::logout();
        
        return Redirect::to('login')->with('message','<p class="notice">Hejdå! Du är nu utloggad. Om du tycker det är tråkigt att vara utloggad kan du ju alltid logga in igen...</p>');
    }
    
}

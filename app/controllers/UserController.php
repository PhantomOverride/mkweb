<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    
        
    
         protected $user;
    
        public function __construct(User $user)
        {
            $this->user = $user;
        }
    
    
	public function index()
	{
		$users = $this->user->all();
                return View::make('users.index', ['users' => $users])->with('nav',Page::navbar());
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create')->with('nav',Page::navbar());
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
            Input::merge(array_map('trim', Input::all()));
            $input = Input::all();
            
		if(!$this->user->fill($input)->isValid())
                {
                    return Redirect::back()->withInput()->withErrors($this->user->errors)->with('nav',Page::navbar());
                }
                
                $this->user->save();
                
                return Redirect::route('users.index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($nickname)
	{
		$user = $this->user->whereNickname($nickname)->first();
                        
                //Message to show to logged in users
                if(Auth::check() && Auth::user()->nickname == $nickname){
                    $message = '<p class="box-rounded notis">Tänk på att det är bara du som kan se dina kontaktuppgifter! Din publika profil visar mindre.</p>';
                }
                //Crew should also get msg
                else if(Auth::check() && Auth::user()->crew()){
                    $message = '<p class="box-rounded notis">Som CREW kan du se och ändra användarprofiler. Tänk på att detta är ett produktionssytem.</p>';
                }
                else{
                    $message = null;
                }

                return View::make('users.show', ['user' => $user])->with('message',$message)->with('nav',Page::navbar());
                
                //return View::make('users.show', ['user' => $user])->with('nav',Page::navbar());
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($nickname)
	{
            if(Auth::check() && (Auth::user()->nickname == $nickname || Auth::user()->crew())){
                    
                //$user = Auth::user();
                
                $user = User::whereNickname($nickname)->first();

                return View::make('users.edit', ['user' => $user])->with('nav',Page::navbar());
            }
            else{
                return Redirect::to('login');
            }
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($nickname)
	{
		if(Auth::check() && (Auth::user()->nickname == $nickname || Auth::user()->crew())){
                    Input::merge(array_map('trim', Input::all(),['<']));
                    $input = Input::all();
                    
                    $this->user = $this->user->whereNickname($nickname)->first();
                    
                    
                    $this->user->forename = $input['forename'];
                    $this->user->lastname = $input['lastname'];
                    $this->user->streetaddress = $input['streetaddress'];
                    $this->user->postalcode = $input['postalcode'];
                    $this->user->city = $input['city'];
                    $this->user->phone = $input['phone'];
                    $this->user->email = $input['email'];
                    $this->user->nickname = $input['nickname'];
                    
                    //Do not set new password if field is empty.
                    if(!empty($input['password'])) $this->user->password = $input['password'];
                   
                   
                    if(!Hash::check($input['oldpassword'],Auth::user()->password) && !Auth::user()->crew()){
                        //If password check does not match
                        $message = '<p class="box-rounded notis">Du måste ange ditt nuvarande lösenord för att spara.</p>';
                        return Redirect::back()->withInput()->with('message',$message);
                    }
                    elseif(!$this->user->isValidUpdate())
                    {
                        return Redirect::back()->withInput()->withErrors($this->user->errors)->with('nav',Page::navbar());
                    }
                    else{
                        $this->user->update();
                        $message = '<p class="box-rounded notis">Din profil är uppdaterad!</p>';
                        return Redirect::route('users.show',$this->user->nickname)->with('message',$message);
                    }
                }
                else{
                    return Redirect::to('login');
                }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
        
        


}

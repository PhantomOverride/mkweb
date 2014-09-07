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
                
                unset($user->id);
                unset($user->ssid);
                unset($user->status);
                unset($user->created_at);
                unset($user->updated_at);
                
                //If we are logged in and are viewing our own profile, pass more information
                if(Auth::check() && Auth::user()->nickname == $nickname){
                    $message = '<p class="box-rounded notis">Tänk på att det är bara du som kan se dina kontaktuppgifter! Din publika profil visar mindre.</p>';
                    return View::make('users.show', ['user' => $user])->with('message',$message)->with('nav',Page::navbar());
                }
                
                //Else pass less information
                unset($user->email);
                unset($user->forename);
                unset($user->lastname);
                unset($user->postalcode);
                unset($user->streetaddress);
                unset($user->phone);
                unset($user->membertype);
                unset($user->memberperiod);
                return View::make('users.show', ['user' => $user])->with('nav',Page::navbar());
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if(Auth::guest()) Redirect::to('login');
                
                $user = Auth::user();
                
                unset($user->id);
                unset($user->ssid);
                unset($user->status);
                unset($user->created_at);
                unset($user->updated_at);
                
                return View::make('users.edit', ['user' => $user])->with('nav',Page::navbar());
                
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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

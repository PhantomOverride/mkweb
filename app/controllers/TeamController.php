<?php

class TeamController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    
        
    
         protected $team;
    
        public function __construct(Team $team)
        {
            $this->team = $team;
        }
    
    
	public function index()
	{
		$teams = $this->team->all();
                return View::make('teams.index', ['teams' => $teams])->with('nav',Page::navbar());
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('teams.create')->with('nav',Page::navbar());
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
            
            $this->team->members = [Auth::user()->nickname];
            
		if(!$this->team->fill($input)->isValid())
                {
                    return Redirect::back()->withInput()->withErrors($this->team->errors)->with('nav',Page::navbar());
                }
                
                
                
                $this->team->save();
                
                return Redirect::route('teams.index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($teamname) //TODO
	{
            $this->team = $this->team->whereName($teamname)->first();
            return View::make('teams.show', ['team' => $this->team])->with('nav',Page::navbar());
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($teamname)
	{
            if(Auth::check() && (Auth::user()->nickname == $this->team->whereName($teamname)->first()->leader || Auth::user()->crew())){
                
                $this->team = $this->team->whereName($teamname)->first();

                return View::make('teams.edit', ['team' => $this->team])->with('nav',Page::navbar());
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
        
        public function addMember($teamname, $membername=null){
            if($teamname!=null && Auth::check() && (Auth::user()->nickname == $this->team->whereName($teamname)->first()->leader || Auth::user()->crew())){
                
                $this->team = $this->team->whereName($teamname)->first();
                
                    if($membername==null){
                        return View::make('teams.addmember')->with('users',User::all())->with('team',$this->team)->with('nav',Page::navbar());
                    }
                    
                    //$this->team->members[] = $membername;
                    
                    $members = $this->team->members;
                    $members[] = $membername;
                    $members = array_unique($members,SORT_STRING);
                    
                    $this->team->members = $members;
                    
                    if(!$this->team->isValidUpdate())
                    {
                        return Redirect::back()->withInput()->withErrors($this->team->errors)->with('nav',Page::navbar());
                    }
                    
                    $this->team->update();
                    $message = '<p class="box-rounded notis">Ditt lag uppdaterades!</p>';
                    return Redirect::route('teams.show',$this->team->name)->with('message',$message);
                    
            }
            else{
                    return Redirect::to('login');
            }
        }
        
        public function removeMember($teamname, $membername=null){
            if($teamname!=null && Auth::check() && (Auth::user()->nickname == $this->team->whereName($teamname)->first()->leader || Auth::user()->crew())){
                
                $this->team = $this->team->whereName($teamname)->first();
                
                    if($membername==null){
                        return View::make('teams.removemember')->with('users',User::whereIn('nickname',$this->team->members)->get())->with('team',$this->team)->with('nav',Page::navbar());
                    }

                    $members = $this->team->members;
                    $members = array_diff($members, [$membername]);
                    $members = array_unique($members,SORT_STRING);
                    
                    $this->team->members = $members;
                    if(!$this->team->isValidUpdate())
                    {
                        return Redirect::back()->withInput()->withErrors($this->team->errors)->with('nav',Page::navbar());
                    }
                    
                    $this->team->update();
                    $message = '<p class="box-rounded notis">Ditt lag uppdaterades!</p>';
                    return Redirect::route('teams.show',$this->team->name)->with('message',$message);
                    
            }
            else{
                    return Redirect::to('login');
            }
        }
        
        
	public function update($teamname)
	{
		if(Auth::check() && (Auth::user()->nickname == $this->team->whereName($teamname)->first()->leader || Auth::user()->crew())){
                    Input::merge(array_map('trim', Input::all(),['<']));
                    $input = Input::all();
                    
                    $this->team = $this->team->whereName($teamname)->first();
                    
                    $this->team->name = $input['name'];
                    $this->team->motto = $input['motto'];
                    $this->team->leader = $input['leader'];
                    $this->team->imageurl = $input['imageurl'];

                    if(!$this->team->isValidUpdate())
                    {
                        return Redirect::back()->withInput()->withErrors($this->team->errors)->with('nav',Page::navbar());
                    }
                    else{
                        $this->team->update();
                        $message = '<p class="box-rounded notis">Ditt lag uppdaterades!</p>';
                        return Redirect::route('teams.show',$this->team->name)->with('message',$message);
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

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
		$teams = $this->team->orderBy('id','desc')->get();
                return View::make('teams.index', ['teams' => $teams])->with('nav',Page::navbar());
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
            if(Auth::guest()){
                return Redirect::to('/login')->with('message','<p class="box-rounded notis">Du måste logga in för att skapa ett lag!</p>')->with('nav',Page::navbar());
            }
            else{
                return View::make('teams.create')->with('nav',Page::navbar());
            }
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
            
            if(Auth::guest()){
                return Redirect::to('/login')->with('message','<p class="box-rounded notis">Du måste logga in för att skapa ett lag!</p>')->with('nav',Page::navbar());
            }
            
            Input::merge(array_map('trim', Input::all()));
            $input = Input::all();
            
            //Array is deprecated
            //$this->team->members = [Auth::user()->nickname];
            
		if(!$this->team->fill($input)->isValid())
                {
                    return Redirect::back()->withInput()->withErrors($this->team->errors)->with('nav',Page::navbar());
                }
                
                $this->team->save();
                
                //Set leader
                $this->team->users()->save(Auth::user());
                
                return Redirect::route('teams.index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($teamname)
	{
            $this->team = $this->team->whereName($teamname)->first();
            if($this->team == null){
                return Redirect::to('/teams')->with('message','<p class="box-rounded notis">Kunde inte öppna laget. Förlåt :C!</p>')->with('nav',Page::navbar());
            }
            else{
                return View::make('teams.show', ['team' => $this->team])->with('nav',Page::navbar());
            }
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
        /*
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
                        return Redirect::route('teams.show',$teamname)->withInput()->with('message','<p class="box-rounded notis">Något gick snett.</p>')->with('nav',Page::navbar());
                    }
                    
                    $this->team->update();
                    $message = '<p class="box-rounded notis">Ditt lag uppdaterades!</p>';
                    return Redirect::route('teams.show',$this->team->name)->with('message',$message);
                    
            }
            else{
                    return Redirect::to('login');
            }
        }
        */
        
        //New addmember
        public function addMember($teamname, $membername=null){
            if($teamname!=null && Auth::check() && (Auth::user()->nickname == $this->team->whereName($teamname)->first()->leader || Auth::user()->crew())){
                
                $this->team = $this->team->whereName($teamname)->first();
                
                    if($membername==null){
                        return View::make('teams.addmember')->with('users',User::all())->with('team',$this->team)->with('nav',Page::navbar());
                    }
                    
                    //$this->team->members[] = $membername;
                    
                    $member = User::whereNickname($membername)->first();
                    
                    if(empty($member) || $this->team->users()->get()->contains($member))
                    {
                        return Redirect::route('teams.show',$teamname)->withInput()->with('message','<p class="box-rounded notis">Något gick snett.</p>')->with('nav',Page::navbar());
                    }
                    
                    $this->team->users()->attach($member);
                    
                    //$this->team->update();
                    $message = '<p class="box-rounded notis">Ditt lag uppdaterades!</p>';
                    return Redirect::route('teams.show',$this->team->name)->with('message',$message);
                    
            }
            else{
                    return Redirect::to('login');
            }
        }
        
        /*
        public function removeMember($teamname, $membername=null){
            if($teamname!=null && Auth::check() && (Auth::user()->nickname == $this->team->whereName($teamname)->first()->leader || Auth::user()->crew())){
                
                $this->team = $this->team->whereName($teamname)->first();
                    
                    if(empty($this->team->members)){
                        $message = '<p class="box-rounded notis">Det finns inga medlemar att ta bort!</p>';
                        return Redirect::route('teams.show',$this->team->name)->with('message',$message);
                    }
                    else if($membername==null){
                        return View::make('teams.removemember')->with('users',User::whereIn('nickname',$this->team->members)->get())->with('team',$this->team)->with('nav',Page::navbar());
                    }

                    $members = $this->team->members;
                    $members = array_diff($members, [$membername]);
                    $members = array_unique($members,SORT_STRING);
                    
                    $this->team->members = $members;
                    if(!$this->team->isValidUpdate())
                    {
                        return Redirect::route('teams.show',$teamname)->withInput()->with('message','<p class="box-rounded notis">Något gick snett.</p>')->with('nav',Page::navbar());
                    }
                    
                    $this->team->update();
                    $message = '<p class="box-rounded notis">Ditt lag uppdaterades!</p>';
                    return Redirect::route('teams.show',$this->team->name)->with('message',$message);
                    
            }
            else{
                    return Redirect::to('login');
            }
        }
        */
        
        
        //new removemember
        public function removeMember($teamname, $membername=null){
            if($teamname!=null && Auth::check() && (Auth::user()->nickname == $this->team->whereName($teamname)->first()->leader || Auth::user()->crew())){
                
                $this->team = $this->team->whereName($teamname)->first();
                    
                    if(!$this->team->users()->first()){
                        $message = '<p class="box-rounded notis">Det finns inga medlemar att ta bort!</p>';
                        return Redirect::route('teams.show',$this->team->name)->with('message',$message);
                    }
                    else if($membername==null){
                        return View::make('teams.removemember')->with('users',$this->team->users()->get())->with('team',$this->team)->with('nav',Page::navbar());
                    }

                    $member = User::whereNickname($membername)->first();
                    
                    if(empty($member))
                    {
                        return Redirect::route('teams.show',$teamname)->withInput()->with('message','<p class="box-rounded notis">Något gick snett.</p>')->with('nav',Page::navbar());
                    }
                    
                    $this->team->users()->detach($member);
                    $message = '<p class="box-rounded notis">Ditt lag uppdaterades!</p>';
                    return Redirect::route('teams.show',$this->team->name)->with('message',$message);
                    
            }
            else{
                    return Redirect::to('login');
            }
        }
        
        
        /*
        public function addTournament($teamname, $tournamentname=null){
            if($teamname!=null && Auth::check() && (Auth::user()->nickname == $this->team->whereName($teamname)->first()->leader || Auth::user()->crew())){
                
                $this->team = $this->team->whereName($teamname)->first();
                
                    if($tournamentname==null){
                        return View::make('teams.addtournament')->with('tournaments',Tournament::all())->with('team',$this->team)->with('nav',Page::navbar());
                    }
                    
                    $tournaments = $this->team->tournaments;
                    $tournaments[] = $tournamentname;
                    $tournaments = array_unique($tournaments,SORT_STRING);
                    
                    $this->team->tournaments = $tournaments;
                    
                    if(!$this->team->isValidUpdate())
                    {
                        return Redirect::route('teams.show',$teamname)->withInput()->with('message','<p class="box-rounded notis">Något gick snett vid ändring av turneringar.</p>')->with('nav',Page::navbar());
                    }
                    
                    $this->team->update();
                    $message = '<p class="box-rounded notis">Ditt lag uppdaterades!</p>';
                    return Redirect::route('teams.show',$this->team->name)->with('message',$message);
                    
            }
            else{
                    return Redirect::to('login');
            }
        }
         */
        
        //new addtournament
        public function addTournament($teamname, $tournamentname=null){
            if($teamname!=null && Auth::check() && (Auth::user()->nickname == $this->team->whereName($teamname)->first()->leader || Auth::user()->crew())){
                
                $this->team = $this->team->whereName($teamname)->first();
                
                    if($tournamentname==null){
                        $event = Mkevent::orderBy('id','desc')->first();
                        return View::make('teams.addtournament')->with('tournaments',$event->tournaments()->get())->with('team',$this->team)->with('nav',Page::navbar());
                    }
                    
                    $tournament = Tournament::whereName($tournamentname)->first();
                    
                    if(empty($tournament) || $this->team->tournaments()->get()->contains($tournament))
                    {
                        return Redirect::route('teams.show',$teamname)->withInput()->with('message','<p class="box-rounded notis">Något gick snett vid ändring av turneringar.</p>')->with('nav',Page::navbar());
                    }
                    
                    
                    $this->team->tournaments()->attach($tournament);
                    
                    $message = '<p class="box-rounded notis">Ditt lag uppdaterades!</p>';
                    return Redirect::route('teams.show',$this->team->name)->with('message',$message);
                    
            }
            else{
                    return Redirect::to('login');
            }
        }
        /*
        public function removeTournament($teamname, $tournamentname=null){
            if($teamname!=null && Auth::check() && (Auth::user()->nickname == $this->team->whereName($teamname)->first()->leader || Auth::user()->crew())){
                
                $this->team = $this->team->whereName($teamname)->first();
                
                    if(empty($this->team->tournaments)){
                        $message = '<p class="box-rounded notis">Det finns inga turneringar att ta bort!</p>';
                        return Redirect::route('teams.show',$this->team->name)->with('message',$message);
                    }
                    else if($tournamentname==null){
                        return View::make('teams.removetournament')->with('tournaments',Tournament::whereIn('name',$this->team->tournaments)->get())->with('team',$this->team)->with('nav',Page::navbar());
                    }

                    $tournaments = $this->team->tournaments;
                    $tournaments = array_diff($tournaments, [$tournamentname]);
                    $tournaments = array_unique($tournaments,SORT_STRING);
                    
                    $this->team->tournaments = $tournaments;

                    if(!$this->team->isValidUpdate())
                    {
                        return Redirect::route('teams.show',$teamname)->withInput()->with('message','<p class="box-rounded notis">Något gick snett vid borttagningen av en turnering.</p>')->with('nav',Page::navbar());
                    }
                    
                    $this->team->update();
                    $message = '<p class="box-rounded notis">Ditt lag uppdaterades!</p>';
                    return Redirect::route('teams.show',$this->team->name)->with('message',$message);
                    
            }
            else{
                    return Redirect::to('login');
            }
        }
        */
        
        //new removetournament
        public function removeTournament($teamname, $tournamentname=null){
            if($teamname!=null && Auth::check() && (Auth::user()->nickname == $this->team->whereName($teamname)->first()->leader || Auth::user()->crew())){
                
                $this->team = $this->team->whereName($teamname)->first();
                
                    if(!$this->team->tournaments()->first()){
                        $message = '<p class="box-rounded notis">Det finns inga turneringar att ta bort!</p>';
                        return Redirect::route('teams.show',$this->team->name)->with('message',$message);
                    }
                    else if($tournamentname==null){
                        return View::make('teams.removetournament')->with('tournaments',$this->team->tournaments()->get())->with('team',$this->team)->with('nav',Page::navbar());
                    }

                    $tournament = Tournament::whereName($tournamentname)->first();

                    if(empty($tournament))
                    {
                        return Redirect::route('teams.show',$teamname)->withInput()->with('message','<p class="box-rounded notis">Något gick snett vid borttagningen av en turnering.</p>')->with('nav',Page::navbar());
                    }
                    
                    $this->team->tournaments()->detach($tournament);
                    $message = '<p class="box-rounded notis">Ditt lag uppdaterades!</p>';
                    return Redirect::route('teams.show',$this->team->name)->with('message',$message);
                    
            }
            else{
                    return Redirect::to('login');
            }
        }
        
        public function delete($teamname){
            if(Auth::check() && (Auth::user()->nickname == $this->team->whereName($teamname)->first()->leader || Auth::user()->crew())){
                    $this->team = $this->team->whereName($teamname)->first();
                    $this->team->delete();
                    return Redirect::to('/teams');
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
                    $this->team->leadertags = $input['leadertags'];

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

@extends('v1-wrapper')

@if(isset($team))

    @section('title')
        Lagsida för {{{$team->name}}}
    @stop

    @section('contentname')
        Lag
    @stop

    @section('contenttitle')
        {{{$team->name}}}
        @if(Auth::check() && (Auth::user()->nickname == $team->leader || Auth::user()->crew()))
                {{ link_to_route('teams.edit',' [Redigera]',$team->name) }}
        @endif
    @stop

    @section('content')
        {{Session::get('message')}}
        
        <div>
            @if(!empty($team->imageurl))
                <p><img src="{{{$team->imageurl}}}" alt="avatar" height="160" width="160"></p>
            @else
                <p><img src="/avatars/team.png" alt="avatar" height="160" width="160"></p>
            @endif
            <h3>{{{$team->name}}}</h3>
            @if(Auth::check() && (Auth::user()->nickname == $team->leader || Auth::user()->crew()))
                {{ link_to_route('teams.edit','Redigera ditt lag',$team->name) }}
                <br />
            @endif
            <br>
                <table class="table table-striped">
                    
                    <tbody><tr>
                        <td>Lagnamn:</td>
                        <td><i class="icon-home"></i> {{{$team->name}}}</td>
                    </tr>
                    
                    <tr>
                        <td>Motto:</td>
                        <td><i class=""></i> {{{$team->motto}}}</td>
                    </tr>
                    <tr>
                        <td>Lagledare:</td>
                        <td><i class=""></i>{{{$team->leader}}}</td>
                    </tr>
                    <tr>
                        <td>Lagledarens IDs:</td>
                        @if(!empty($team->leadertags))
                            <td><i class=""></i>{{{$team->leadertags}}}</td>
                        @else
                            <td><i class=""></i>Inga IDs satta ännu!</td>
                        @endif
                    </tr>
                    <tr>
                        <td>Medlemmar:</td>
                        <td><i class=""></i>
                        @if(sizeof($team->users()->get()) > 0)
                            @foreach($team->users()->get() as $member)
                                {{{ $member->nickname }}}, 
                            @endforeach
                        @else
                            Det finns inga medlemmar!
                        @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Turneringar:</td>
                        <td><i class=""></i>
                        @if(sizeof($team->tournaments()->get()))
                            @foreach($team->tournaments()->get() as $tournament)
                                {{{ $tournament->name }}}, 
                            @endforeach
                        @else
                            Inget deltagande anmält ännu.
                        @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
            
            @if(Auth::check() && (Auth::user()->nickname == $team->leader || Auth::user()->crew()))
                {{ link_to('/teams/'.$team->name.'/addmember','Lägg till lagkamrater'); }}
                <br />
                {{ link_to('/teams/'.$team->name.'/removemember','Ta bort lagkamrater'); }}
                <br />
                <br />
                {{ link_to('/teams/'.$team->name.'/addtournament','Anmäl till turnering eller tävling'); }}
                <br />
                {{ link_to('/teams/'.$team->name.'/removetournament','Ta bort turneringsintresse'); }}
                <br />
                <br />
                <a href="#" onclick="if(window.confirm('Är du säker?')){window.location='/teams/{{$team->name}}/delete'}">Ta bort laget helt och hållet!</a>
                <!--{{ link_to('/teams/'.$team->name.'/delete','Ta bort laget helt och hållet'); }}-->
            @endif
            
        </div>
    @stop

@else

    @section('title')
        Laget finns inte
    @stop

    @section('contentname')
        Lag
    @stop

    @section('contenttitle')
        Finns inte
    @stop

    @section('content')
        Laget du sökte kunde inte hittas
    @stop
    
@endif

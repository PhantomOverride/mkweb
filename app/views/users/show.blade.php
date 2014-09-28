@extends('v1-wrapper')

@if(isset($user))

    @section('title')
        Profil för {{{$user->nickname}}}
    @stop

    @section('contentname')
        Profil
    @stop

    @section('contenttitle')
        {{{$user->nickname}}}
    @stop

    @section('content')
        @if(isset($message))
            {{ $message }}
        @endif
        
        @if(Auth::check() && (Auth::user()->nickname == $user->nickname || Auth::user()->crew()))
        
        <div>
            <p><img src="{{$user->avatarurl}}" alt="avatar" height="160" width="160"></p>
            <h3>{{$user->nickname}}</h3>
            {{ link_to_route('users.edit','Redigera din profil',$user->nickname) }}
            <h4>Stauts: {{{$user->accounttype}}}</h4>
            <br>
                <table class="table table-striped">
                    
                    <tbody><tr>
                        <td>Förnamn:</td>
                        <td><i class="icon-home"></i> {{{$user->forename}}}</td>
                    </tr>
                    
                    <tr>
                        <td>Efternamn:</td>
                        <td><i class=""></i> {{{$user->lastname}}}</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><i class=""></i>{{{$user->email}}}</td>
                    </tr>
                    <tr>
                        <td>Stad:</td>
                        <td><i class=""></i>{{{$user->city}}} </td>
                    </tr>
                    <tr>
                        <td>Address:</td>
                        <td><i class=""></i>{{{$user->streetaddress}}}</td>
                    </tr>
                    <tr>
                        <td>Postnummer:</td>
                        <td><i class=""></i>{{{$user->postalcode}}}</td>
                    </tr>
                    <tr>
                        <td>Telefonnummer:</td>
                        <td><i class=""></i>{{{$user->phone}}}</td>
                    </tr>
                    <tr>
                        <td>Medlemskap:</td>
                        <td><i class=""></i>{{{($user->memberype=='none') ? 'Ej Medlem' : 'Medlem'}}}</td>
                    </tr>
                    <tr>
                        <td>Medlemsperiod:</td>
                        <td><i class=""></i>{{{$user->memberperiod}}}</td>
                    </tr>
                    </tbody>
                </table>
        </div>
        
        @else
        
        <div>
            <p><img src="{{{$user->avatarurl}}}" alt="avatar" height="160" width="160"></p>
            <h3>{{{$user->nickname}}}</h3>
            <h4>Stauts: {{{$user->accounttype}}}</h4>
            <br>
                <table class="table table-striped">
                    
                    <tbody><tr>
                        <td>Stad:</td>
                        <td><i class="icon-home"></i> {{{$user->city}}}</td>
                    </tr>
                </tbody>
                </table>
        </div>
        
        @endif

    @stop

@else

    @section('title')
        User not found
    @stop

    @section('contentname')
        User
    @stop

    @section('contenttitle')
        Not found
    @stop

    @section('content')
        No such user :C
    @stop
    
@endif

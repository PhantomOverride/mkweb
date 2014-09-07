@extends('v1-wrapper')

@if(isset($user))

    @section('title')
        Profil för {{$user->nickname}}
    @stop

    @section('contentname')
        Profil
    @stop

    @section('contenttitle')
        {{$user->nickname}}
    @stop

    @section('content')
        @if(isset($message))
            {{ $message }}
        @endif
        
        @if(Auth::check() && Auth::user()->nickname == $user->nickname)
        
        <img src="{{$user->avatarurl}}" alt="avatar" />
        
        {{ link_to_route('users.edit','Redigera din profil',$user->nickname) }}
        
        <table>
            <tr>
                <td>Förnamn:</td>
                <td>{{$user->forename}}</td>
            </tr>
            <tr>
                <td>Efternamn:</td>
                <td>{{$user->lastname}}</td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>{{$user->email}}</td>
            </tr>
            <tr>
                <td>Stad:</td>
                <td>{{$user->city}}</td>
            </tr>
            <tr>
                <td>Adress:</td>
                <td>{{$user->streetaddress}}</td>
            </tr>
            <tr>
                <td>Postnummer:</td>
                <td>{{$user->postalcode}}</td>
            </tr>
            <tr>
                <td>Telefonnummer:</td>
                <td>{{$user->phone}}</td>
            </tr>
            <tr>
                <td>Nickname:</td>
                <td>{{$user->nickname}}</td>
            </tr>
            <tr>
                <td>Medlemsskap:</td>
                <td>{{($user->memberype=='none') ? 'Ej Medlem' : 'Medlem'}}</td>
            </tr>
            <tr>
                <td>Medlemsperiod:</td>
                <td>{{$user->memberperiod}}</td>
            </tr>
            <tr>
                <td>Kontotyp:</td>
                <td>{{$user->accounttype}}</td>
            </tr>
        </table>
        
        @else
        
        <img src="{{$user->avatarurl}}" alt="avatar" />
        
        <table>
            <tr>
                <td>
                    Nickname:
                </td>
                <td>
                    {{$user->nickname}}
                </td>
            </tr>
            <tr>
                <td>
                    Status:
                </td>
                <td>
                    {{$user->accounttype}}
                </td>
            </tr>
            <tr>
                <td>
                    Stad:
                </td>
                <td>
                    {{$user->city}}
                </td>
            </tr>
            
        </table>
        
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
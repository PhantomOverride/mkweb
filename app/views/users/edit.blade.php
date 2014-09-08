@extends('v1-wrapper')

@section('title')
    Redigera
@stop

@section('contentname')
    Redigera
@stop

@section('contenttitle')
    {{$user->nickname}}
@stop

@section('content')

@if(Session::has('message'))
    {{Session::get('message')}}
@endif

<p>
    Du kan här uppdatera din profil.
</p>
    {{Form::open(['route' => ['users.update',$user->nickname],'method'=>'PUT'])}}
    
    <div>
        {{Form::label('forename', 'Förnamn: ')}}
        {{Form::text('forename',$user->forename)}}
        {{$errors->first('forename', '<span class=error>:message</span>')}}
    </div>
    
    <div>
        {{Form::label('lastname', 'Efternamn: ')}}
        {{Form::text('lastname',$user->lastname)}}
        {{$errors->first('lastname', '<span class=error>:message</span>')}}
    </div>
    
    <div>
        {{Form::label('streetaddress', 'Adress: ')}}
        {{Form::text('streetaddress',$user->streetaddress)}}
        {{$errors->first('streetaddress', '<span class=error>:message</span>')}}
    </div>
    
    <div>
        {{Form::label('postalcode', 'Postnummer: ')}}
        {{Form::text('postalcode',$user->postalcode)}}
        {{$errors->first('postalcode', '<span class=error>:message</span>')}}
    </div>
    
    <div>
        {{Form::label('city', 'Stad: ')}}
        {{Form::text('city',$user->city)}}
        {{$errors->first('city', '<span class=error>:message</span>')}}
    </div>
    
    <div>
        {{Form::label('phone', 'Telefon: ')}}
        {{Form::text('phone',$user->phone)}}
        {{$errors->first('phone', '<span class=error>:message</span>')}}
    </div>
    
    <div>
        {{Form::label('email', 'E-post: ')}}
        {{Form::text('email',$user->email)}}
        {{$errors->first('email', '<span class=error>:message</span>')}}
    </div>
    
    <div>
        {{Form::label('nickname', 'Nickname: ')}}
        {{Form::text('nickname',$user->nickname)}}
        {{$errors->first('nickname', '<span class=error>:message</span>')}}
    </div>
    <div>
        {{Form::label('password', 'Nytt lösenord (Om du vill byta): ')}}
        {{Form::password('password')}}
        {{$errors->first('password', '<span class=error>:message</span>')}}
    </div>
    <div>
        {{Form::label('password', 'Bekräfta med nuvarande lösenord: ')}}
        {{Form::password('oldpassword')}}
        {{$errors->first('oldpassword', '<span class=error>:message</span>')}}
    </div>
    
    <div>{{Form::submit('Uppdatera')}}</div>
    
    {{Form::close()}}

@stop
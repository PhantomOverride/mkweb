@extends('v1-wrapper')

@section('title')
    Registrera
@stop

@section('contentname')
    Registrera
@stop

@section('contenttitle')
    Bli en av oss
@stop

@section('content')

    {{Form::open(['route' => 'users.store'])}}
    
    <div>
        {{Form::label('forename', 'Förnamn: ')}}
        {{Form::text('forename')}}
        {{$errors->first('forename', '<span class=error>:message</span>')}}
    </div>
    
    <div>
        {{Form::label('lastname', 'Efternamn: ')}}
        {{Form::text('lastname')}}
        {{$errors->first('lastname', '<span class=error>:message</span>')}}
    </div>
    
    <div>
        {{Form::label('ssid', 'Personnummer (YYMMDDXXXX): ')}}
        {{Form::text('ssid')}}
        {{$errors->first('ssid', '<span class=error>:message</span>')}}
    </div>
    
    <div>
        {{Form::label('streetaddress', 'Adress: ')}}
        {{Form::text('streetaddress')}}
        {{$errors->first('streetaddress', '<span class=error>:message</span>')}}
    </div>
    
    <div>
        {{Form::label('postalcode', 'Postnummer: ')}}
        {{Form::text('postalcode')}}
        {{$errors->first('postalcode', '<span class=error>:message</span>')}}
    </div>
    
    <div>
        {{Form::label('city', 'Stad: ')}}
        {{Form::text('city')}}
        {{$errors->first('city', '<span class=error>:message</span>')}}
    </div>
    
    <div>
        {{Form::label('phone', 'Telefon: ')}}
        {{Form::text('phone')}}
        {{$errors->first('phone', '<span class=error>:message</span>')}}
    </div>
    
    <div>
        {{Form::label('email', 'E-post: ')}}
        {{Form::text('email')}}
        {{$errors->first('email', '<span class=error>:message</span>')}}
    </div>
    
    <div>
        {{Form::label('nickname', 'Nickname: ')}}
        {{Form::text('nickname')}}
        {{$errors->first('nickname', '<span class=error>:message</span>')}}
    </div>
    
    <div>
        {{Form::label('password', 'Password: ')}}
        {{Form::password('password')}}
        {{$errors->first('password', '<span class=error>:message</span>')}}
    </div>
    
    <div>{{Form::submit('Registrera dig!')}}</div>
    
    {{Form::close()}}

@stop
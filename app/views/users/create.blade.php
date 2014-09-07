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
<p>
    Vad kul att du vill registrera dig hos oss! Det är vanlig vett och etikett som gäller för ditt konto här, så vi känner inte att det är så lönt att skriva någon uppsatts på 200 sidor om vad som gäller.
</p>
<p>
    Du behöver fylla i alla fälten. Tänk på att du INTE blir medlem i Sverok-föreningen genom att skapa ett konto. För att bli medlem och få medlemsförmåner får du kontakta oss på kontakt@mammaskallare.com, eller fånga någon av våra representanter!
</p>
<p>
    Nåväl. Var var vi. Jo! Registrering:
</p>
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
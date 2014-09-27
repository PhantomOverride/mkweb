@extends('v1-wrapper')

@section('title')
    Skapa lag
@stop

@section('contentname')
    Skapa lag
@stop

@section('contenttitle')
    Lycka till!
@stop

@section('content')
<p>
    Börja med att skapa laget. Du kan sen lägga till dina lagkamrater på lagsidan.
</p>
<p>
    Du kommer att bli satt som lagets ledare automatiskt när du skapar laget. Du kan ändra lagledare senare.
</p>

    {{Form::open(['route' => 'teams.store'])}}
    
    <div>
        {{Form::label('name', 'Lagnamn: ')}}
        {{Form::text('name')}}
        {{$errors->first('name', '<span class=error>:message</span>')}}
    </div>
    
    <div>
        {{Form::label('motto', 'Lagmotto: ')}}
        {{Form::text('motto')}}
        {{$errors->first('lastname', '<span class=error>:message</span>')}}
    </div>
    
    <div>
        {{Form::label('leader', 'Lagledare: ')}}
        {{Form::text('leader',Auth::user()->nickname,array('readonly'))}}
        {{$errors->first('leader', '<span class=error>:message</span>')}}
    </div>
    
    <div>
        {{Form::label('imageurl', 'Länk till logo: ')}}
        {{Form::text('imageurl')}}
        {{$errors->first('imageurl', '<span class=error>:message</span>')}}
    </div>
    
    <div>{{Form::submit('Registrera laget!')}}</div>
    
    {{Form::close()}}

@stop
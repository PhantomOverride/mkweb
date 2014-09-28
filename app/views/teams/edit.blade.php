@extends('v1-wrapper')

@section('title')
    Redigera lag
@stop

@section('contentname')
    Redigera lag
@stop

@section('contenttitle')
    {{{$team->name}}}
@stop

@section('content')

@if(Session::has('message'))
    {{Session::get('message')}}
@endif

<p>
    Dags att ändra laguppgifterna?
</p>

    {{$errors->first('missingmember', '<span class=error>:message</span>')}}

    {{Form::open(['route' => ['teams.update',$team->name],'method'=>'PUT'])}}
    
    <div>
        {{Form::label('name', 'Lagnamn: ')}}
        {{Form::text('name',$team->name)}}
        {{$errors->first('name', '<span class=error>:message</span>')}}
    </div>
    
    <div>
        {{Form::label('motto', 'Lagmotto: ')}}
        {{Form::text('motto',$team->motto)}}
        {{$errors->first('motto', '<span class=error>:message</span>')}}
    </div>
    
    <div>
        {{Form::label('leader', 'Lagledare: ')}}
        {{Form::text('leader',$team->leader)}}
        {{$errors->first('leader', '<span class=error>:message</span>')}}
    </div>
    
    <div>
        {{Form::label('leadertags', 'Lagledarens IDs: ')}}
        {{Form::text('leadertags',$team->leadertags)}}
        {{$errors->first('leadertags', '<span class=error>:message</span>')}}
    </div>
    
    <div>
        {{Form::label('imageurl', 'Länk till logo: ')}}
        {{Form::text('imageurl',$team->imageurl)}}
        {{$errors->first('imageurl', '<span class=error>:message</span>')}}
    </div>
    
    <div>{{Form::submit('Uppdatera laget!')}}</div>
    
    {{Form::close()}}

@stop
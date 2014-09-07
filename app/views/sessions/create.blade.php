@extends('v1-wrapper')

@section('title')
    Logga in
@stop

@section('contentname')
    Logga in
@stop

@section('contenttitle')
    Välkommen!
@stop

@section('content')

@if (isset($message))
{{ $message }}
@endif

{{Session::get('message')}}

{{ Form::open(['route'=>'sessions.store']) }}
<div>
    {{ Form::label('email','Email:') }}
    {{ Form::email('email') }}
</div>
<div>
    {{ Form::label('password','Lösenord:') }}
    {{ Form::password('password') }}
</div>
{{ Form::submit('Logga in') }}
{{ Form::close() }}
@stop
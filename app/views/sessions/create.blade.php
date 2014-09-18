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


<div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
    {{ Form::open(array('route'=>'sessions.store','class' => 'form-signin')) }}
        {{ Form::email('email',null,array('class' => 'form-control', 'placeholder' => 'Email address')) }}
        {{ Form::password('password',array('class' => 'form-control', 'placeholder' => 'Lösenord')) }}

        <label class="checkbox">
            <input value="remember-me" type="checkbox"> <span>Remember me</span>
        </label>
        {{ Form::submit('Logga in',array('class' => 'btn btn-lg btn-primary btn-block')) }}
    {{ Form::close() }}
</div>

    

@stop

@extends('v1-wrapper')

@if(isset($user))

    @section('title')
        User {{$user->nickname}}
    @stop

    @section('contentname')
        User
    @stop

    @section('contenttitle')
        {{$user->nickname}}
    @stop

    @section('content')
        @foreach($user->toArray() as $key => $value)
        <div>
            {{$key}} - {{$value}}
        </div>
        @endforeach
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
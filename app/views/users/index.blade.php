@extends('v1-wrapper')

@section('title')
    Användare
@stop

@section('contentname')
    Användare
@stop

@section('contenttitle')
    Dessa är med oss
@stop

@section('content')

<h2>Registred Users</h2>

Bli en av oss? {{link_to_route('users.create','Registrera!')}}

@foreach ($users as $user)
<li> {{ link_to("/users/{$user->nickname}",$user->nickname) }} </li>
@endforeach

@stop
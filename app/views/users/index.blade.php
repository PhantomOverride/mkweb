@extends('mktest')

@section('title')
Users
@stop

@section('content')

<h2>Registred Users</h2>

@foreach ($users as $user)
<li> {{ link_to("/users/{$user->nickname}",$user->nickname) }} </li>
@endforeach

@stop
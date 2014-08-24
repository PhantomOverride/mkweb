@extends('mktest')

@section('title')
Users
@stop

@section('content')

<h2>Registred Users</h2>

Want to have a new user? {{link_to_route('users.create','Sign up!')}}

@foreach ($users as $user)
<li> {{ link_to("/users/{$user->nickname}",$user->nickname) }} </li>
@endforeach

@stop
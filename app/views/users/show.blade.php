@extends('mktest')

@section('title')
Users
@stop

@section('content')

<h2>Registred Users</h2>

@if(isset($user))

@foreach($user->toArray() as $key => $value)
<div>
    {{$key}} - {{$value}}
</div>
@endforeach

@else
User not found
@endif

@stop
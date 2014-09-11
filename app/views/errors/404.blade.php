@extends('v1-wrapper')

@section('title')
Fel
@stop

@section('contentname')
Fel
@stop

@section('contenttitle')
Fel
@stop

@section('content')
Det du försökte ladda finns inte. Fy! <a href="{{Request::referrer()}}">Gå tillbaka.</a>
@stop
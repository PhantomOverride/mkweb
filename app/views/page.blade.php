@extends('v1-wrapper')

@section('title')
    {{$page->name}}
@stop

@section('contentname')
    {{$page->name}}
@stop

@section('contenttitle')
    {{$page->title}}
@stop

@section('content')
        <p>{{$page->content}}</p>
@stop
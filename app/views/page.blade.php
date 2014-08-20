@extends('mktest')

@section('title')
{{$page->name}}
@stop

@section('content')

<h2>Page Name: {{$page->name}}</h2>
<h3>Page Title: {{$page->title}}</h3>
<p>{{$page->content}}</p>

<hr />

@if ($page->parentid == -1)
<small>This page is a main page</small>
@else
<small>This is a subpage. The parent page is {{$parentpage->name}}</small>
@endif


@stop
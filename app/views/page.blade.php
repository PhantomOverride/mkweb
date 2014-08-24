@extends('mktest')

@section('title')
    @if (isset($page))
        {{$page->name}}
    @endif
@stop

@section('content')
    @if (isset($page))
        <h2>Page Name: {{$page->name}}</h2>
        <h3>Page Title: {{$page->title}}</h3>
        <p>{{$page->content}}</p>

        <hr />

        @if ($page->parentname == null)
        <small>This page is a main page</small>
        @else
        <small>This is a subpage. The parent page is {{$parentpage->name}}</small>
        @endif
    @else
        Sidan du försöker nå finns tyvärr inte :C.
    @endif
@stop
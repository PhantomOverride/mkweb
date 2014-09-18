@extends('v1-wrapper')

@section('title')
    {{$page->name}}
@stop

@section('contentname')
    {{$page->name}}
@stop

@section('contenttitle')
    {{$page->title}}
    @if(Auth::check() && Auth::user()->crew())
            @if(!empty($page->parentname))
            [{{link_to('/crew/pageedit/'.$page->parentname.'/'.$page->urlname,'Redigera')}}]
            @else
            [{{link_to('/crew/pageedit/'.$page->urlname,'Redigera')}}]
            @endif
    @endif
@stop

@section('content')
    @if(Auth::check() && Auth::user()->crew())
        <div class="box-rounded notis">
            Eftersom att du är CREW kan du 
            @if(!empty($page->parentname))
            {{link_to('/crew/pageedit/'.$page->parentname.'/'.$page->urlname,'redigera')}}
            @else
            {{link_to('/crew/pageedit/'.$page->urlname,'redigera')}}
            @endif
            den här sidan.
        </div>
    @endif
        <p>{{$page->content}}</p>
@stop
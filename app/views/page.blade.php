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
    @if(Auth::check() && Auth::user()->crew())
        <div class="box-rounded notis">
            Eftersom att du är CREW kan du redigera den här sidan. Vill du
            @if(!empty($page->parentname))
            {{link_to('/crew/pageedit/'.$page->parentname.'/'.$page->urlname,'Redigera')}}
            @else
            {{link_to('/crew/pageedit/'.$page->urlname,'Redigera')}}
            @endif
            ?
        </div>
    @endif
        <p>{{$page->content}}</p>
@stop
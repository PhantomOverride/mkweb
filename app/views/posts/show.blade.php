@extends('v1-wrapper')

@section('title')
    {{$post->title}}
@stop

@section('contentname')
    {{$post->title}}
@stop

@section('contenttitle')
    @if(Auth::check() && Auth::user()->crew() && $post->title != null)
            [{{link_to('/posts/'.$post->title.'/edit','Redigera')}}]
    @endif
@stop

@section('content')
    @if(Auth::check() && Auth::user()->crew())
        <div class="box-rounded notis">
            Eftersom att du är CREW kan du 
            [{{link_to('/posts/'.$post->title.'/edit','redigera')}}]
            den här sidan.
        </div>
    @endif
        <p>{{$post->content}}</p>
        <p><small>Publicerat {{$post->posted}} av {{$post->author}}.</small></p>
@stop
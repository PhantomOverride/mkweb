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

        
        @if(!empty($post->imageurl))
                <img class="img-responsive" src="{{ $post->imageurl }}" alt="" />
                <hr />
        @endif
        
        <p>
            {{ $post->content }}
        </p>
        <!-- <a class="btn btn-primary" href="{{'/posts/'.$post->title}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->
        <hr />
        <p class="lead">
            <span class="glyphicon glyphicon-time"></span> &nbsp; "{{ $post->title }}" publicerades {{$post->posted}} 
            av {{ $post->author }}
        </p>
@stop
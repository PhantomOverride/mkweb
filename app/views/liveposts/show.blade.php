@extends('v1-wrapper')

@section('title')
    {{$livepost->header}}
@stop

@section('contentname')
    {{$livepost->header}}
@stop

@section('contenttitle')
    @if(Auth::check() && Auth::user()->crew() && $livepost->title != null)
            [{{link_to('/liveposts/'.$livepost->id.'/edit','Redigera')}}]
    @endif
@stop

@section('content')
    @if(Auth::check() && Auth::user()->crew())
        <div class="box-rounded notis">
            Eftersom att du är CREW kan du 
            [{{link_to('/liveposts/'.$livepost->id.'/edit','redigera')}}]
            den här sidan.
        </div>
    @endif

        <p>
            {{ $livepost->text }}
        </p>

@stop
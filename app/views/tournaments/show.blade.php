@extends('v1-wrapper')

@section('name')
    {{$tournament->name}}
@stop

@section('contentname')
    {{$tournament->name}}
@stop

@section('contentname')
    @if(Auth::check() && Auth::user()->crew() && $tournament->name != null)
            [{{link_to('/tournaments/'.$tournament->name.'/edit','Redigera')}}]
    @endif
@stop

@section('content')
    @if(Auth::check() && Auth::user()->crew())
        <div class="box-rounded notis">
            Eftersom att du är CREW kan du 
            [{{link_to('/tournaments/'.$tournament->name.'/edit','redigera')}}]
            den här sidan.
        </div>
    @endif

        
        @if(!empty($tournament->imageurl))
                <img class="img-responsive" src="{{ $tournament->imageurl }}" alt="" />
                <hr />
        @endif
        
        <p>
            {{ $tournament->name }}
        </p>
        <!-- <a class="btn btn-primary" href="{{'/tournaments/'.$tournament->name}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->
        <hr />
        <p class="lead">
            <span class="glyphicon glyphicon-time"></span> &nbsp; "{{ $tournament->shortname }}"
        </p>
@stop
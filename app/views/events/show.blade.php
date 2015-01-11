@extends('v1-wrapper')

@section('name')
    {{$event->name}}
@stop

@section('contentname')
    {{$event->name}}
@stop

@section('contentname')
    @if(Auth::check() && Auth::user()->crew() && $event->name != null)
            [{{link_to('/events/'.$event->name.'/edit','Redigera')}}]
    @endif
@stop

@section('content')
    @if(Auth::check() && Auth::user()->crew())
        <div class="box-rounded notis">
            Eftersom att du är CREW kan du 
            [{{link_to('/events/'.$event->name.'/edit','redigera')}}]
            den här sidan.
        </div>
    @endif

        
        @if(!empty($event->imageurl))
                <img class="img-responsive" src="{{ $event->imageurl }}" alt="" />
                <hr />
        @endif
        
        <p>
            {{ $event->name }}
        </p>
        <!-- <a class="btn btn-primary" href="{{'/events/'.$event->name}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->
        <hr />
        <p class="lead">
            <span class="glyphicon glyphicon-time"></span> &nbsp; "{{ $event->year }}"
        </p>
@stop
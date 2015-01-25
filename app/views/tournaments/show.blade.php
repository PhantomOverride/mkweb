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
            Turnering {{ $tournament->name }}, förkortat {{ $tournament->shortname }}.
        </p>
@stop
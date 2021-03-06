@extends('v1-wrapper')

@section('name')
    {{$mkevent->name}}
@stop

@section('contentname')
    {{$mkevent->name}}
@stop

@section('contentname')
    @if(Auth::check() && Auth::user()->crew() && $mkevent->name != null)
            [{{link_to('/mkevents/'.$mkevent->name.'/edit','Redigera')}}]
    @endif
@stop

@section('content')
    @if(Auth::check() && Auth::user()->crew())
        <div class="box-rounded notis">
            Eftersom att du är CREW kan du 
            [{{link_to('/mkevents/'.$mkevent->name.'/edit','redigera')}}]
            den här sidan.
        </div>
    @endif

        
        @if(!empty($mkevent->imageurl))
                <img class="img-responsive" src="{{ $mkevent->imageurl }}" alt="" />
                <hr />
        @endif
        
        <p>
            Evenemang {{ $mkevent->name }}
        </p>
        <p>
            @if(($mkevent->tournaments()->first()))
            Turneringar:<br/>
            @foreach($mkevent->tournaments()->get() as $t)
            
            {{{$t->name}}}, 
            
            @endforeach
            @endif
        </p>

        <p class="lead">
            <span class="glyphicon glyphicon-time"></span> &nbsp; "{{ $mkevent->year }}"
        </p>
@stop
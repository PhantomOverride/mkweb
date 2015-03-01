@extends('v1-wrapper')

@section('title')
    {{$product->name}}
@stop

@section('contentname')
    {{$product->name}}
@stop

@section('contenttitle')
    @if(Auth::check() && Auth::user()->crew() && $product->name != null)
            [{{link_to('/products/'.$product->id.'/edit','Redigera')}}]
    @endif
@stop

@section('content')
    @if(Auth::check() && Auth::user()->crew())
        <div class="box-rounded notis">
            Eftersom att du är CREW kan du 
            [{{link_to('/products/'.$product->id.'/edit','redigera')}}]
            den här sidan.
        </div>
    @endif

        
        @if(!empty($product->imageurl))
                <img class="img-responsive" src="{{ $product->imageurl }}" alt="" />
                <hr />
        @endif
        
        <p>
            {{ $product->name }}
        </p>
@stop
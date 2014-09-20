@extends('v1-wrapper')

@section('title')
    Välkommen Till Verkligheten!
@stop

@section('contentname')
    Mammas Källare
@stop

@section('contenttitle')
    Välkommen!
@stop

@section('content')
    <!-- Kul att du läser källkoden! Har du roligt =)? -->

    <!-- Säg hej och sånt -->
    
    <p>
        Hej och välkommen till Mammas Källares krypin på internet!
    </p>
    
    <!-- Bloggposter/Nyhetsflöde -->
    
    @foreach($posts as $post)
        <br />
        <h3>
            {{ link_to('/posts/'.$post->title,$post->title) }}
        </h3>
        <p class="lead">
            <span class="glyphicon glyphicon-time"></span> Publicerad {{$post->posted}} 
            av {{ $post->author }}
        </p>
        <hr />
        @if(!empty($post->imageurl))
                <img class="img-responsive" src="{{ $post->imageurl }}" alt="" />
                <hr />
        @endif
        
        <p>
            {{ $post->content }}
        </p>
        <!-- <a class="btn btn-primary" href="{{'/posts/'.$post->title}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->
        <br />
    @endforeach
    
@stop
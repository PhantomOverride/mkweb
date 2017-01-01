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
    <!-- Kul att du läser källkoden! Vill du hjälpa till med utvecklingen? Kontakta oss! -->

    <!-- Säg hej och sånt -->
    
    <h3>Vad sysslar vi med?</h3>
    <p>
        Mammas Källare arrangerar spelrelaterade aktiviteter såsom spelkvällar med roll- och brädspel och LAN-partyn vid högskolan i Karlskrona.
        Alla får komma på våra event och vi välkomnar alla som vill hålla spelglädjen vid liv!
    </p>
    <p>Vårt största event är LAN:et och spelfesten WonderLAN som hålls terminsvis vid Blekinge Tekniska Högskola.</p>
    <br />
    
    <!-- Bloggposter/Nyhetsflöde -->
    
    @foreach($posts as $post)
        <h3>
            {{ link_to('/posts/'.$post->title,$post->title) }}
        </h3>
        
        @if(!empty($post->imageurl))
                <img class="img-responsive" src="{{ $post->imageurl }}" alt="" />
              <br />
        @endif
        
        <p>
            {{ $post->content }}
        </p>
        <hr />
        <p class="lead" style="margin-top:-15px;">
            <span class="glyphicon glyphicon-time"></span> &nbsp; Publicerad {{$post->posted}} 
            av {{ $post->author }}
        </p>
        
        <br />
    @endforeach
    
    <br />
    
    <hr />
    
    <p>
        Vill du läsa mer? Gamla nyheter finns i {{ link_to('/posts','Bloggarkivet') }}!
    </p>
    
@stop
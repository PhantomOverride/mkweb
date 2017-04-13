@extends('v1-wrapper')

@section('title')
Galleri {{$directory}}
@stop

@section('contentname')
Galleri {{$directory}}
@stop

@section('contenttitle')
Verkligheten i bilder
@stop

@section('meta-description')
Se bilder i {{$directory}}
@stop

@section('meta-twitter-image')
img/gallery/{{$directory}}/twitter.jpg
@stop

@section('meta-twitter-image-fail')
{{$directory}}
@stop

@section('meta-og-image')
img/gallery/{{$directory}}/og.jpg
@stop

@section('v1-custom-js')

<script>
$(document).ready(function(){
    var current;
    $(".galleryImageContainer").on("click",function(){
        current = this;
        set_image();
    });

    $("#viewer #close").on("click",function(){
        $("#viewer").hide();
    });

    $("#viewer #next").on("click",function(){
        var prev = current;
        current = $(current).next(".galleryImageContainer");
        if(current.length == 0){
            //Last image and restart the slideshow
            current = $(prev).siblings()[0];
        }
        set_image();
    });

    $("#viewer #previous").on("click",function(){
        var prev = current;
        current = $(current).prev(".galleryImageContainer");
        if(current.length == 0){
            //Last image and restart the slideshow
            current = $(prev).siblings();
            current = current[current.length - 1];
        }
        set_image();
    });

    function set_image(){
        var source = $(current).children("img").attr('src');
        $("#viewer_target").attr('src', source);
        $("#viewer").show();
    }
});
</script>
@stop

@section('content')
    {{Session::get('message')}}

    @if(Auth::check() && Auth::user()->crew())
        <div class="box-rounded notis">
            Eftersom att du är CREW kan du
            [{{link_to('/gallery/'. $directory .'/upload','ladda upp')}}]
            till den här sidan.
        </div>
    @endif

    <section id="viewer">
        <img src="/img/icons/close_128x128.png" alt="close" id="close" class="pointer" />
        <img src="/img/icons/arrow_right_128x128.png" alt="next" id="next" class="pointer"/>
        <img src="/img/icons/arrow_right_128x128.png" alt="previous" id="previous" class="pointer" />
        <img src="" id="viewer_target"/>
    </section>
    <section id="gallery">
    @foreach ($files as $file)
        <div class="galleryImageContainer">
            <img src="/img/gallery/{{$directory}}/{{$file}}" alt="" />
        </div>
    @endforeach
    </section>
@stop

@extends('v1-wrapper')

@section('title')
Galleri
@stop

@section('contentname')
Galleri
@stop

@section('contenttitle')
    Verklighetens ögonblick
@stop

@section('content')
    <section id="gallery">
    @foreach ($folders as $folder)
        <div class="galleryImageContainer">
            <a href="/gallery/{{$folder}}">
                <img src="/img/gallery/{{$folder}}/thumbnail.jpg" alt="" />
                <span>{{$folder}}</span>
            </a>
        </div>
    @endforeach
    </section>
@stop

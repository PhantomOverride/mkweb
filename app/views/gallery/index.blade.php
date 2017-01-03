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

@section('v1-custom-js')
<script>
</script>
@stop

@section('content')
    @foreach ($folders as $folder)
        {{$folder}}
    @endforeach
@stop

@extends('v1')
<?php
/*
    Master Version 1 template fields:
    v1-title            Full page title
    v1-headertext       Text in header image
    v1-headerslider     Images for image slider in header
    v1-navbar-1         Navbar under slider
    v1-navbar-2         Navbar at side
    v1-contentname      Name of the page
    v1-contenttitle     Pagetitle for content
    v1-content          Content of page
    v1-sponsor
*/

/*
    Wrapper template fields:
    title           Goes in page title
    contentname     Name of content
    contenttitle    Title of content
    content         The actual content
*/
?>

@section('v1-title')
Mammas Källare Titel: @yield('title')
@stop

@section('v1-headertext')
    Mammas Källare Headertext
@stop

@section('v1-contentname')
    @yield('contentname')
@stop

@section('v1-contenttitle')
    @yield('contenttitle')
@stop

@section('v1-content')
    @yield('content')
@stop

@section('v1-headerslider')
              <li><img src="/img/slide-1.jpg" alt=""></li>
              <li><img src="/img/slide-2.jpg" alt=""></li>
              <li><img src="/img/slide-3.jpg" alt=""></li>
@stop
@section('v1-sponsor')
Somecompany
Other company
Doge
Gooby
@stop
@section('v1-navbar-1')
    @if (isset($nav))
        @foreach ($nav as $main)
            @foreach ($main as $sub)
            <li>
                {{ link_to($sub['link'],$sub['name']); }}
            </li>
            @endforeach
        @endforeach
    @endif
@stop
@section('v1-navbar-2')
    @if (isset($nav))
        @foreach ($nav as $main)
            @foreach ($main as $sub)
                @if (empty($sub['parentname']))
                    <a href="{{$sub['link']}}" class="list-group-item {{Request::is(substr($sub['link'],1)) ? 'active' : ''}}">{{$sub['name']}}</a>
                @else    
                    <a href="{{$sub['link']}}" class="list-group-item {{Request::is(substr($sub['link'],1)) ? 'active' : ''}}">&nbsp;&nbsp;&nbsp;&nbsp;{{$sub['name']}}</a>
                @endif
            @endforeach
        @endforeach
    @endif
@stop
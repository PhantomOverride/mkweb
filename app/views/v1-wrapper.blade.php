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
<li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="index.html">News</a>
                    </li>
                    <li>
                        <a href="index.html">Wonderlan</a>
                    </li>
                    <li>
                        <a href="index.html">Pluton</a>
                    </li>
                    <li>
                        <a href="index.html">Brädspel</a>
                    </li>
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                    <li>
                        <a href="contact.html">login/signup</a>
                    </li>
                    <li>
                        <a href="contact.html">Profile</a>
                    </li>
@stop
@section('v1-navbar-2')
              <a href="#" class="list-group-item active">Home</a>
              <a href="#" class="list-group-item ">News</a>
              <a href="#" class="list-group-item ">Wonderlan</a>
              <a href="#" class="list-group-item ">Pluton</a>
              <a href="#" class="list-group-item ">Brädspel</a>
              <a href="#" class="list-group-item ">Brädspel</a>
              <a href="#" class="list-group-item ">Brädspel</a>
@stop
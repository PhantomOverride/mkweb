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
 *  v1-breadcrumbs
*/

/*
    Wrapper template fields:
    title           Goes in page title
    contentname     Name of content
    contenttitle    Title of content
    content         The actual content
*/

/*
    Twitter card and OG metadata fields
    v1-title                    Same title as the page has max 70 characters
    meta-description            Information om about the post or website
    meta-twitter-image          Image to use when linking to twitter
    meta-twitter-image-fail     Text to use if twitter fails to show image
    meta-og-image               Image to use when linking to facebook
    meta-url                    URL to website or a post on the website
*/
?>

@section('v1-title')
Mammas Källare: @yield('title')
@stop

@section('v1-headertext')
    Mammas Källare
@stop

@section('v1-contentname')
    @yield('contentname')
@stop

@section('v1-contenttitle')
    @yield('contenttitle')
@stop

@section('v1-content')
    @yield('content')
    <br />
@stop

@section('v1-headerslider')
              <li><img src="/img/slide-4.jpg" alt=""></li>
              <li><img src="/img/slide-5.jpg" alt=""></li>
              <li><img src="/img/slide-6.jpg" alt=""></li>
              <li><img src="/img/slide-7.jpg" alt=""></li>
              <li><img src="/img/slide-8.jpg" alt=""></li>
              <li><img src="/img/slide-1.jpg" alt=""></li>
              <li><img src="/img/slide-2.jpg" alt=""></li>
              <li><img src="/img/slide-3.jpg" alt=""></li>
@stop
@section('v1-login')
@if(Auth::guest())
{{ link_to('login','Logga in') }} &nbsp;-&nbsp; {{ link_to_route('users.create','Registrera') }}
@else
Hej {{ link_to_route('users.show',Auth::user()->nickname,Auth::user()->nickname) }}! &nbsp;-&nbsp; {{ link_to('logout','Logga ut') }}
@if(Auth::user()->crew())
 - {{link_to('/crew','CREW')}}
@endif
@endif
@stop
@section('v1-sponsor')
<div class="spons-entry">
    <p>
        Mammas Källare
    </p>
    <li> <a href="http://www.sverok.se">Sverok</a> </li>
</div>

<div class="spons-entry">
    <p>
        WonderLAN
    </p>
    <li> <a href="http://www.bth.se">BTH</a> </li>
    <li> <a href="http://www.subway.se">Subway</a> </li>
    <li> <a href="http://www.axis.se">AXIS</a> </li>
    <li> <a href="http://www.citynetwork.se">City Network</a> </li>
</div>


@stop
@section('v1-navbar-1')

    <?php $p = 2 ?>
    @if (isset($nav))
        @foreach ($nav as $main)
            @foreach ($main as $sub)
            @if (!isset($sub['parentname']))
            <?php if($p==0) $p=1; if($p!=2) echo '</ul></li>';  ?>
            <li class="dropdown">
                <a href="#" class="dropdown" >{{$sub['name']}} </a>
                <ul class="dropdown-menu" role="menu">
                    <li>{{ link_to($sub['link'],$sub['name']); }}</li>
            @else
            <?php $p = 0 ?>
            <li>
                {{ link_to($sub['link'],$sub['name']); }}
            </li>
            @endif
            @endforeach
        @endforeach
        <?php if($p==0) {$p=1;echo '</ul>'; } ?>
    @endif
@stop
@section('v1-navbar-1-old')
    @if (isset($nav))
        @foreach ($nav as $main)
            @foreach ($main as $sub)
            @if (!isset($sub['parentname']))
            <li>
                {{ link_to($sub['link'],$sub['name']); }}
            </li>
            @endif
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
@section('v1-breadcrumbs')
    <?php $last = sizeof(Request::segments());?>
    @if($last>1)
        @if(Request::segment(1)=='page')
            <li>Sida</li>
        @elseif(Request::segment(1)=='users')
            <li>Användare</li>
        @endif

        @for ($i=2;$i<=$last;$i++)
            <li <? if($i==$last) echo 'class="active"'; ?> ><a href="#">{{ urldecode(Request::segment($i)) }}</a></li>
        @endfor
    @else

    @endif
@stop

<?php
/*************************************
 *** Twitter cards and og metadata ***
 *************************************/
?>
@section('meta-description')
Vad sysslar vi med?
<br />
Mammas Källare arrangerar spelrelaterade aktiviteter såsom spelkvällar med roll- och brädspel och LAN-partyn vid högskolan i Karlskrona. Alla får komma på våra event och vi välkomnar alla som vill hålla spelglädjen vid liv!
<br />
Vårt största event är LAN:et och spelfesten WonderLAN som hålls terminsvis vid Blekinge Tekniska Högskola.
@stop
@section('meta-twitter-image', '')
@section('meta-twitter-image-fail','Välkommen till värkligheten')
@section('meta-url')
<?php
    if(isset($_SERVER['REDIRECT_URL'])){
        echo $_SERVER['REDIRECT_URL'];
    }
    else if(isset($_SERVER['SERVER_ADDR'])){
        echo $_SERVER['SERVER_ADDR'];
    }
?>
@stop
@section('meta-og-image', '')

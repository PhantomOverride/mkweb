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
              <li><img src="/img/slide-1.jpg" alt=""></li>
              <li><img src="/img/slide-2.jpg" alt=""></li>
              <li><img src="/img/slide-3.jpg" alt=""></li>
@stop
@section('v1-login')
@if(Auth::guest())
{{ link_to('login','Logga in') }} &nbsp;-&nbsp; {{ link_to_route('users.create','Registrera') }}
@else
Hej {{ link_to_route('users.show',Auth::user()->nickname,Auth::user()->nickname) }}! &nbsp;-&nbsp; {{ link_to('logout','Logga ut') }}
@endif
@stop
@section('v1-sponsor')
<div class="spons-entry">
    <p>
        Verksamhet:
    </p>
    <li> Företag A </li>
    <li> Organisation B </li>
</div>

<div class="spons-entry">
    <p>
        WonderLAN:
    </p>
    <li> Doge </li>
    <li> Other Doge </li>
    <li> Grumpy Cat </li>
</div>

<div class="spons-entry">
    <p>
        Pluton MK:
    </p>
    <li> Företag C </li>
    <li> Organisation D </li>
</div>


<div class="spons-entry">
    {{link_to('users',"Logga in!")}}
</div>
<br /><br />

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
    <li>Sida</li>
    @for ($i=2;$i<=$last;$i++)
        <li <? if($i==$last) echo 'class="active"'; ?> ><a href="#">{{ Request::segment($i) }}</a></li>
    @endfor
@stop

@extends('v1-wrapper')

@section('title')
    CREW
@stop

@section('contentname')
    CREW
@stop

@section('contenttitle')
    Dags för underhåll?
@stop

@section('content')

{{Session::get('message')}}

<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#crew-users">User Management</button>
<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#crew-content">Content Management</button>
<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#crew-post">Post Management</button>
<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#crew-tournament">Tournament Management</button>
<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#crew-tournamentoverview">Tournament Overview</button>

<a class="btn btn-info" href="/store">Store (not in use)</a>
<a class="btn btn-info" href="/kassa">Kassa</a>
<a class="btn btn-info" href="/products">Products</a>

<!-- Page edit section -->

<div id="crew-users" class='panel panel-default panel-body collapse'>
    <h2 class='page-header'><small>User Management</small></h2>
<table style="font-size:8pt;" class="table table-striped">
<thead>
    <tr>
            <td>Forename</td>
            <td>Lastname</td>
            <td>Phone</td>
            <td>Email</td>
            <td>nickname</td>
            <td>accounttype</td>
    </tr>
</thead><tbody>
    
    @foreach($users as $user)
        <tr>
            <td>{{$user->forename}}</td>
            <td>{{$user->lastname}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->email}}</td>
            <td>{{link_to('/users/'.$user->nickname,$user->nickname)}}</td>
            <td>{{$user->accounttype}}</td>
        </tr>
    @endforeach
</tbody>
</table>
</div>


<div id="crew-content" class='panel panel-default panel-body collapse'>
    <h2 class='page-header'><small>Content Management</small></h2>
<table style="font-size:8pt;" class="table table-striped">
<thead>
    <tr>
            <td>Urlname</td>
            <td>Name</td>
            <td>Parentname</td>
            <td>Order</td>
            <td>Linkto</td>
            <td>Edit</td>
    </tr>
</thead><tbody>
    
    @foreach($pages as $page)
        <tr>
            <td>{{$page->urlname}}</td>
            <td>{{$page->name}}</td>
            <td>{{$page->parentname or 'NULL'}}</td>
            <td>{{$page->order}}</td>
            <td>{{$page->linkto or 'NULL'}}</td>
            <td>{{link_to(($page->parentname==null)?'/crew/pageedit/'.$page->urlname:'/crew/pageedit/'.$page->parentname.'/'.$page->urlname,'Redigera')}}</td>
        </tr>
    @endforeach
    <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{link_to('/crew/pageedit/','Ny sida')}}</td>
        </tr>
</tbody>
</table>
</div>


<div id="crew-post" class='panel panel-default panel-body collapse'>
    <h2 class='page-header'><small>Post Management</small></h2>
<table style="font-size:8pt;" class="table table-striped">
<thead>
    <tr>
            <td>Title</td>
            <td>Author</td>
            <td>Posted</td>
            <td>Edit</td>
            <td>Remove</td>
    </tr>
</thead><tbody>
    @foreach ($posts as $post)
        <tr>
            <td>{{ link_to('/posts/'.$post->title,$post->title) }}</td>
            <td>{{ $post->author }}</td>
            <td>{{ $post->posted }}</td>
            <td>{{ link_to('/posts/'.$post->title.'/edit','Redigera') }}</td>
            <td>{{ link_to('/posts/'.$post->title.'/remove','Remove') }}</td>
        </tr>
    @endforeach
    <tr></tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>{{ link_to('/posts/create','Ny post') }}</td>
        </tr>
</tbody>
</table>
</div>


<div id="crew-tournament" class='panel panel-default panel-body collapse'>
    <h2 class='page-header'><small>Tournament Management</small></h2>
<table style="font-size:8pt;" class="table table-striped">
<thead>
    <tr>
            <td>Bild</td>
            <td>Namn</td>
            <td>Shortname</td>
            <td>Event</td>
    </tr>
</thead><tbody>
    @foreach ($tournaments as $tournament)
        <tr>
            <td><img style="width:25px;" src="{{ $tournament->imageurl }}" /></td>
            <td>{{ link_to('/tournaments/'.$tournament->name.'/edit',$tournament->name) }}</td>
            <td>{{ $tournament->shortname }}</td>
            @if(isset($tournament->mkevents[0]))
            <td>{{ $tournament->mkevents[0]->name }}</td>
            @else
            <td></td>
            @endif
        </tr>
    @endforeach
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>{{link_to('tournaments/create','Ny Turnering')}}</td>
        </tr>
</tbody>
</table>
</div>


<div id="crew-tournamentoverview" class='panel panel-default panel-body collapse'>
    <h2 class='page-header'><small>Tournament Overview</small></h2>
    @foreach($tournaments as $tournament)
        <h4>{{$tournament->name}}</h4>
        <table style="font-size:8pt;" class="table table-striped">
            <thead>
                <tr>
                        <td>Lagnamn</td>
                        <td>Ledare</td>
                        <td>Medlemmar</td>
                </tr>
            </thead>
            <tbody>
                @foreach($tournament->teams as $team)
                
                            <tr>
                                <td>{{ link_to('/teams/'.$team->name,$team->name) }}</td>
                                <td>{{ $team->leader }}</td>
                                <td>
                                @foreach($team->users as $member)
                                {{{$member->nickname}}} 
                                @endforeach
                                </td>
                            </tr>
                @endforeach
                </tbody>
                </table>
        <br /><br />
    @endforeach
</div>

@stop
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
<!-- Page edit section -->


<div class='panel panel-default panel-body'>
    <h2 class='page-header'><small>User Management</small></h2>
<table class="table table-striped">
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


<div class='panel panel-default panel-body'>
    <h2 class='page-header'><small>Content Management</small></h2>
<table class="table table-striped">
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

<div class='panel panel-default panel-body'>
    <h2 class='page-header'><small>Post Management</small></h2>
<table class="table table-striped">
<thead>
    <tr>
            <td>Title</td>
            <td>Author</td>
            <td>Posted</td>
            <td>Edit</td>
    </tr>
</thead><tbody>
    @foreach ($posts as $post)
        <tr>
            <td>{{ link_to('/posts/'.$post->title,$post->title) }}</td>
            <td>{{ $post->author }}</td>
            <td>{{ $post->posted }}</td>
            <td>{{ link_to('/posts/'.$post->title.'/edit','Redigera') }}</td>
        </tr>
    @endforeach
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>{{ link_to('/posts/create','Ny post') }}</td>
        </tr>
</tbody>
</table>
</div>

<div class='panel panel-default panel-body'>
    <h2 class='page-header'><small>Tournament Management (Liveredigering #TODO)</small></h2>
<table class="table table-striped">
<thead>
    <tr>
            <td>Bild</td>
            <td>Namn</td>
            <td>Shortname</td>
            <td></td>
    </tr>
</thead><tbody>
    @foreach ($tournaments as $tournament)
        <tr>
            <td><img style="width:25px;" src="{{ $tournament->imageurl }}" /></td>
            <td>{{ $tournament->name }}</td>
            <td>{{ $tournament->shortname }}</td>
            <td></td>
        </tr>
    @endforeach
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Ny Turnering (#todo)</td>
        </tr>
</tbody>
</table>
</div>

<div class='panel panel-default panel-body'>
    <h2 class='page-header'><small>Tournament Overview</small></h2>
    @foreach($tournaments as $tournament)
        <h3>{{$tournament->name}}</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                        <td>Lagnamn</td>
                        <td>Ledare</td>
                        <td>Medlemmar</td>
                </tr>
            </thead>
            <tbody>
                @foreach($teams as $team)
                        @if(!empty($team->tournaments) && in_array($tournament->name,$team->tournaments))
                            <tr>
                                <td>{{ link_to('/teams/'.$team->name,$team->name) }}</td>
                                <td>{{ $team->leader }}</td>
                                <td>{{ implode(', ',$team->members) }}</td>
                            </tr>
                        @endif
                    </tbody>
                    </table>
                @endforeach
    @endforeach
</div>

@stop
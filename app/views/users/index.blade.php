@extends('v1-wrapper')

@section('title')
    Användare
@stop

@section('contentname')
    Användare
@stop

@section('contenttitle')
    Dessa är med oss
@stop

@section('content')

<p>Bli en av oss? {{link_to_route('users.create','Registrera!')}} </p>



<h2 class='page-header'><small>Medlemmar</small></h2>
<table class="table table-striped">
<thead>
    <tr>
            <td>Avatar</td>
            <td>Nickname</td>
    </tr>
</thead><tbody>
    @foreach ($users as $user)
    @if($user->accounttype=='user')
        <tr>
            <td><img src='{{$user->avatarurl}}' height="50" width="50"/></td>
            <td>{{ link_to("/users/{$user->nickname}",$user->nickname) }}</td>
        </tr>
    @endif
    @endforeach
</tbody>
</table>

<br />

<h2 class='page-header'><small>CREW</small></h2>
<table class="table table-striped">
<thead>
    <tr>
            <td>Avatar</td>
            <td>Nickname</td>
    </tr>
</thead><tbody>
    @foreach ($users as $user)
    @if($user->accounttype=='crew')
        <tr>
            <td><img src='{{$user->avatarurl}}' height="50" width="50"/></td>
            <td>{{ link_to("/users/{$user->nickname}",$user->nickname) }}</td>
        </tr>
    @endif
    @endforeach
</tbody>
</table>

<br />

<h2 class='page-header'><small>Admins</small></h2>
<table class="table table-striped">
<thead>
    <tr>
            <td>Avatar</td>
            <td>Nickname</td>
    </tr>
</thead><tbody>
    @foreach ($users as $user)
    @if($user->accounttype=='admin')
        <tr>
            <td><img src='{{$user->avatarurl}}' height="50" width="50"/></td>
            <td>{{ link_to("/users/{$user->nickname}",$user->nickname) }}</td>
        </tr>
    @endif
    @endforeach
</tbody>
</table>

@stop
@extends('v1-wrapper')

@section('title')
    Lagkamrater
@stop

@section('contentname')
    Lagkamrater
@stop

@section('contenttitle')
    Ta bort
@stop

@section('content')

<p>
    Klicka på den användare som du ta bort från ditt lag.
</p>

<table class="table table-striped">
<thead>
    <tr>
            <td>Avatar</td>
            <td>Nickname</td>
    </tr>
</thead><tbody>
    @foreach ($users as $user)
        <tr>
            <td><img src='{{$user->avatarurl}}' height="50" width="50"/></td>
            <td>{{ link_to("/teams/{$team->name}/removemember/{$user->nickname}",$user->nickname) }}</td>
        </tr>
    @endforeach
</tbody>
</table>

@stop
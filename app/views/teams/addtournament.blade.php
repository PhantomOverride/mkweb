@extends('v1-wrapper')

@section('title')
    Turneringar
@stop

@section('contentname')
    Turneringar
@stop

@section('contenttitle')
    Lägg till
@stop

@section('content')

<p>
    Klicka på den turnering eller tävling som ditt lag vill kämpa i.
</p>

<table class="table table-striped">
<thead>
    <tr>
            <td></td>
            <td>Spel</td>
    </tr>
</thead><tbody>
    @foreach ($tournaments as $tournament)
        <tr>
            <td><img src='{{{$tournament->imageurl}}}' height="50" width="50"/></td>
            <td>{{ link_to("/teams/{$team->name}/addtournament/{$tournament->name}",$tournament->name) }}</td>
        </tr>
    @endforeach
</tbody>
</table>

@stop
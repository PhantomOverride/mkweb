@extends('v1-wrapper')

@section('title')
    Lag
@stop

@section('contentname')
    Lag
@stop

@section('contenttitle')
    Vem är på din sida?
@stop

@section('content')

<p>
    Nedan kan du se alla lag som är föranmälda till WonderLAN! Se till att skapa
    ditt lag med dina lagkamrater redan idag - så ni är redo och kan förbereda er!
</p>
<p>
    Du kan anmäla ditt lag till turneringarna direkt här på sidan. CREW kan komma
    att skicka information om tävlingsregler och turneringsschema via epost till
    lagledaren.
</p>
<p>
    <h2 style="text-align:center;">
        {{ link_to_route('teams.create','Registrera ditt lag nu!') }}
    </h2>
</p>
<br />

<table class="table table-striped">
<thead>
    <tr>
            <td>Logga</td>
            <td>Lagnamn</td>
            <td>Motto</td>
            <td>Lagledare</td>
    </tr>
</thead><tbody>
    @foreach ($teams as $team)
        <tr>
            @if(!empty($team->imageurl))
                <td><img src='{{{$team->imageurl}}}' height="50" width="50"/></td>
            @else
                <td><img src='/avatars/team.png' height="50" width="50"/></td>
            @endif
            <td>{{ link_to("/teams/{$team->name}",$team->name) }}</td>
            <td>{{{ $team->motto }}}</td>
            <td>{{{ $team->leader }}}</td>
        </tr>
    @endforeach
</tbody>
</table>

@stop
@extends('v1-wrapper')

@section('title')
    Mkeventarkiv
@stop

@section('contentname')
    Mkeventarkiv
@stop

@section('contenttitle')
    Vet du vad som hänt?
@stop

@section('content')

<table class="table table-striped">
<thead>
    <tr>
            <td>Mkeventnamn</td>
            <td>År</td>
            <td>Bild</td>
    </tr>
</thead><tbody>
    @foreach ($mkevents as $mkevent)
        <tr>
            <td>{{ link_to('/mkevents/'.$mkevent->name,$mkevent->name) }}</td>
            <td>{{ $mkevent->year }}</td>
            <td><img width=150px src="{{ $mkevent->imageurl }}" /></td>
        </tr>
    @endforeach
</tbody>
</table>


@stop
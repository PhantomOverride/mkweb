@extends('v1-wrapper')

@section('title')
    Eventarkiv
@stop

@section('contentname')
    Eventarkiv
@stop

@section('contenttitle')
    Vet du vad som hänt?
@stop

@section('content')

<table class="table table-striped">
<thead>
    <tr>
            <td>Eventnamn</td>
            <td>År</td>
            <td>Bild</td>
    </tr>
</thead><tbody>
    @foreach ($events as $event)
        <tr>
            <td>{{ link_to('/events/'.$event->name,$event->name) }}</td>
            <td>{{ $event->year }}</td>
            <td><img src="{{ $event->imageurl }}" /></td>
        </tr>
    @endforeach
</tbody>
</table>


@stop
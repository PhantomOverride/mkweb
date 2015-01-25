@extends('v1-wrapper')

@section('title')
    Evenemang
@stop

@section('contentname')
    Evenemang
@stop

@section('contenttitle')
    Det som hänt och det som komma skall.
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
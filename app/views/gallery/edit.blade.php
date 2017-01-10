@extends('v1-wrapper')

@section('title')
Galleri
@stop

@section('contentname')
Galleri
@stop

@section('contenttitle')
    Verkligheten för stunden
@stop
@section('v1-custom-js')
@stop

@section('content')
<p class="box-rounded notis">Du är just nu i ett produktionssystem, och dina ändringar kommer gå live direkt.
    Det finns antagligen ingen backup, och när du trycker spara så kommer materialet på mammaskallare.se och wonderlan.se ändras.
    Se till så det du sparar är sådant som ska finnas på sidan.
</p>
<br />

{{ Form::open(['url' => '/gallery/create']) }}

<table class="table table-striped">
    <tbody>
        <tr>
            <td>Header:</td>
            <td>
                {{ Form::text('header') }}
            </td>
        </tr>
        <tr>
            <td>Name:</td>
            <td>
                {{ Form::text('name') }}
            </td>
        </tr>
    </tbody>
</table>

{{ Form::submit() }}

{{ Form::close() }}

@stop

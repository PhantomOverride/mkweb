@extends('v1-wrapper')

@section('title')
Upload to {{$directory}}
@stop

@section('contentname')
Upload to {{$directory}}
@stop

@section('contenttitle')
    smid verkligheten
@stop

@section('content')
    <p class="box-rounded notis">Du är just nu i ett produktionssystem, och dina ändringar kommer gå live direkt.
        Det finns antagligen ingen backup, och när du trycker spara så kommer materialet på mammaskallare.se och wonderlan.se ändras.
        Se till så det du sparar är sådant som ska finnas på sidan.
    </p>
    <br />

    {{ Form::open(['url' => '/gallery/$directory/upload', 'files' => true]) }}

    <table class="table table-striped">
        <tbody>
            <tr>
                <td>Name:</td>
                <td>
                    {{ Form::text('name') }}
                </td>
            </tr>
            <tr>
                <td>Files:</td>
                <td>{{ Form::file('files[]',['multiple'=>true])}}</td>
            </tr>
        </tbody>
    </table>

    {{ Form::submit() }}

    {{ Form::close() }}
@stop

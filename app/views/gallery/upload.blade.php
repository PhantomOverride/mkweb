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
    @if ($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif
    {{Session::get('message')}}

    {{ Form::open(['url' => '/gallery/' . $directory . '/upload', 'files' => true]) }}

    <table class="table table-striped">
        <tbody>
            <tr>
                <td>Files:</td>
                <td>{{ Form::file('files[]',['multiple'=>true])}}</td>
            </tr>
        </tbody>
    </table>

    {{ Form::submit() }}

    {{ Form::close() }}

    <br />

    <h2>Hur skit funkar</h2>
    <p>
    <ul>Ladda upp bilderna som du vill visa :)</ul>
    <ul>Bilder med följande namn har speciella egenskaper i galleriet
        <li>thumbnail.jpg - Bilden som kommer att visas när man blädrar blan gallerier</li>
        <li>twitter.jpg - Bilden som ska användas på twitter cards. Bilden bör vara större än 280px i bredd och 150px i höjd. Bilden måste vara mindre än 1MB i storlek</li>
        <li>og.jpg - Bilden som visas på facebook. Rekomenderas att den är 1200 x 630. Minimum 600x315px. Bilden måste vara mindre än 8mb i storlek.</li>
    </ul>
    </p>
@stop

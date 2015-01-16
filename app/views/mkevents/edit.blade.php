@extends('v1-wrapper')

@section('title')
    Redigera {{$mkevent->name}}
@stop

@section('contentname')
    Mkevents
@stop

@section('contenttitle')
    {{$mkevent->name}}
@stop

@section('content')

<p class="box-rounded notis">Du är just nu i ett produktionssystem, och dina ändringar kommer gå live direkt.
    Det finns antagligen ingen backup, och när du trycker spara så kommer materialet på mammaskallare.se och wonderlan.se ändras.
    Se till så det du sparar är sådant som ska finnas på sidan.
</p>
<br />

{{Session::get('message')}}

@if(!empty($mkevent->title))
    {{ Form::open(['url'=>'/mkevents/'.$mkevent->name.'/update']) }}
@else
    {{ Form::open(['url'=>'/mkevents/update']) }}
@endif

<table class="table table-striped">
                    
                    <tbody><tr>
                        <td>Name:</td>
                        <td><i class="icon-home"></i> {{ Form::text('title',$mkevent->name) }} {{$errors->first('name', '<span class=error>:message</span>')}}</td>
                    </tr>
                    
                    <tr>
                        <td>Year:</td>
                        <td><i class=""></i> {{ Form::text('year',$mkevent->year) }} {{$errors->first('year', '<span class=error>:message</span>')}}</td>
                    </tr>
                    <tr>
                        <td>Image URL (if any):</td>
                        <td><i class=""></i>{{ Form::text('imageurl',$mkevent->imageurl) }} {{$errors->first('imageurl', '<span class=error>:message</span>')}}</td>
                    </tr>
                    </tbody>
                </table>
            {{Form::submit()}}
        
{{ Form::close() }}

<br />

<h2>Hur skit funkar</h2>
<p>
<ul>DET FINNS INGEN BACKUP. SE TILL ATT DU ÄR SÄKER PÅ VAD DU SKICKAR IN. Ctrl-C på allt innan man börjar ändra är en idé. Finns en featurereq om versioner, men det kommer ta ett tag.</ul>
<ul>Title: Titlen som visas överallt och i länken. Försök att inte ha specialtecken.</ul>
<ul>Content: Sidinnehållet. HTML-formattering gäller.</ul>
<ul>Published/Mkevented: Datumet som ska visas för publicering.</ul>
<ul>Imageurl: Länk till bilden som ska användas (om det finns någon, lämna annars blankt).</ul>
    
</p>

@stop
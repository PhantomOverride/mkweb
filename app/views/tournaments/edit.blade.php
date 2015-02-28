@extends('v1-wrapper')

@section('title')
    Redigera {{$tournament->name}}
@stop

@section('contentname')
    tournaments
@stop

@section('contenttitle')
    {{$tournament->name}}
@stop

@section('content')

<p class="box-rounded notis">Du är just nu i ett produktionssystem, och dina ändringar kommer gå live direkt.
    Det finns antagligen ingen backup, och när du trycker spara så kommer materialet på mammaskallare.se och wonderlan.se ändras.
    Se till så det du sparar är sådant som ska finnas på sidan.
</p>
<br />

{{Session::get('message')}}

@if(!empty($tournament->name))
    {{ Form::open(['url'=>'/tournaments/'.$tournament->name.'/update']) }}
@else
    {{ Form::open(['url'=>'/tournaments/update']) }}
@endif

<table class="table table-striped">
                    
                    <tbody><tr>
                        <td>Name:</td>
                        <td><i class="icon-home"></i> {{ Form::text('name',$tournament->name) }} {{$errors->first('name', '<span class=error>:message</span>')}}</td>
                    </tr>
                    
                    <tr>
                        <td>Shortname:</td>
                        <td><i class=""></i> {{ Form::text('shortname',$tournament->shortname) }} {{$errors->first('shortname', '<span class=error>:message</span>')}}</td>
                    </tr>
                    <tr>
                        <td>Image URL:</td>
                        <td><i class=""></i>{{ Form::text('imageurl',$tournament->imageurl) }} {{$errors->first('imageurl', '<span class=error>:message</span>')}}</td>
                    </tr>
                    <tr>
                        @if(isset($tournament->mkevents[0]))
                        <td>Eventname:</td>
                        <td><i class=""></i>{{ Form::text('mkevent',$tournament->mkevents[0]->name) }} {{$errors->first('mkevents', '<span class=error>:message</span>')}}</td>
                        @else
                        <td>Eventname (suggested):</td>
                        <td><i class=""></i>{{ Form::text('mkevent',$events->last()->name) }} {{$errors->first('mkevents', '<span class=error>:message</span>')}}</td>
                        @endif
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
<ul>Published/tournamented: Datumet som ska visas för publicering.</ul>
<ul>Imageurl: Länk till bilden som ska användas (om det finns någon, lämna annars blankt).</ul>
    
</p>

@stop
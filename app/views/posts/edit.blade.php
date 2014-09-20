@extends('v1-wrapper')

@section('title')
    Redigera {{$post->name}}
@stop

@section('contentname')
    Bloggposter
@stop

@section('contenttitle')
    {{$post->name}}
@stop

@section('content')

<p class="box-rounded notis">Du är just nu i ett produktionssystem, och dina ändringar kommer gå live direkt.
    Det finns antagligen ingen backup, och när du trycker spara så kommer materialet på mammaskallare.se och wonderlan.se ändras.
    Se till så det du sparar är sådant som ska finnas på sidan.
</p>
<br />

{{Session::get('message')}}

@if(!empty($post->title))
    {{ Form::open(['url'=>'/posts/'.$post->title.'/update']) }}
@else
    {{ Form::open(['url'=>'/posts/update']) }}
@endif

<table class="table table-striped">
                    
                    <tbody><tr>
                        <td>Title:</td>
                        <td><i class="icon-home"></i> {{ Form::text('title',$post->title) }}</td>
                    </tr>
                    
                    <tr>
                        <td>Content:</td>
                        <td><i class=""></i> {{ Form::text('content',$post->content) }}</td>
                    </tr>
                    <tr>
                        <td>Published/Posted (YYYY-MM-DD):</td>
                        <td><i class=""></i>{{ Form::text('posted',$post->posted) }}</td>
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
<ul>Published/Posted: Datumet som ska visas för publicering.</ul>
    
</p>

@stop
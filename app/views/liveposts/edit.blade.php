@extends('v1-wrapper')

@section('title')
    Redigera {{$livepost->header}}
@stop

@section('contentname')
    {{$livepost->header}}
@stop

@section('contenttitle')
    {{$livepost->header}}
@stop

@section('content')

<p class="box-rounded notis">Du är just nu i ett produktionssystem, och dina ändringar kommer gå live direkt.
    Det finns antagligen ingen backup, och när du trycker spara så kommer materialet på mammaskallare.se och wonderlan.se ändras.
    Se till så det du sparar är sådant som ska finnas på sidan.
</p>
<br />

{{Session::get('message')}}

@if(!empty($livepost->header))
    {{ Form::open(['url'=>'/liveposts/'.$livepost->id.'/update']) }}
@else
    {{ Form::open(['url'=>'/liveposts/update']) }}
@endif

<table class="table table-striped">
                    
                    <tbody><tr>
                        <td>Header:</td>
                        <td><i class="icon-home"></i> {{ Form::text('header',$livepost->header) }} {{$errors->first('header', '<span class=error>:message</span>')}}</td>
                    </tr>
                    
                    <tr>
                        <td>Text:</td>
                        <td><i class=""></i> {{ Form::textarea('text',$livepost->text) }} {{$errors->first('text', '<span class=error>:message</span>')}}</td>
                    </tr>
                    <tr>
                        <td>Order:</td>
                        <td><i class=""></i>{{ Form::text('order',$livepost->order) }} {{$errors->first('order', '<span class=error>:message</span>')}}</td>
                    </tr>
                    </tbody>
                </table>
            {{Form::submit()}}
        
{{ Form::close() }}

<br />

<h2>Hur skit funkar</h2>
<p>
<ul>DET FINNS INGEN BACKUP. SE TILL ATT DU ÄR SÄKER PÅ VAD DU SKICKAR IN. Ctrl-C på allt innan man börjar ändra är en idé. Finns en featurereq om versioner, men det kommer ta ett tag.</ul>
<ul>Header: Huvudrubrik.</ul>
<ul>Text: Innehåll. HTML-formattering gäller.</ul>
<ul>Order: Sorteras på detta, minst överst. Sätt till 0 för att dölja i visningen.</ul>
</p>

@stop
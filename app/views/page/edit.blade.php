@extends('v1-wrapper')

@section('title')
    Redigera {{$page->name}}
@stop

@section('contentname')
    Redigera
@stop

@section('contenttitle')
    {{$page->name}}
@stop

@section('content')

<p class="box-rounded notis">Du är just nu i ett produktionssystem, och dina ändringar kommer gå live direkt.
    Det finns antagligen ingen backup, och när du trycker spara så kommer materialet på mammaskallare.se och wonderlan.se ändras.
    Se till så det du sparar är sådant som ska finnas på sidan.
</p>
<br />

{{Session::get('message')}}

{{ Form::open(['url'=>'/crew/pageedit/'.$page->urlname.$page->suburlname]) }}

<table class="table table-striped">
                    
                    <tbody><tr>
                        <td>Urlname:</td>
                        <td><i class="icon-home"></i> {{ Form::text('urlname',$page->urlname) }}</td>
                    </tr>
                    
                    <tr>
                        <td>Name:</td>
                        <td><i class=""></i> {{ Form::text('name',$page->name) }}</td>
                    </tr>
                    <tr>
                        <td>Title:</td>
                        <td><i class=""></i>{{ Form::text('title',$page->title) }}</td>
                    </tr>
                    <tr>
                        <td>Content:</td>
                        <td><i class=""></i>{{ Form::textarea('content',$page->content) }}</td>
                    </tr>
                    <tr>
                        <td>Parentname:</td>
                        <td><i class=""></i>{{ Form::text('parentname',$page->parentname) }}</td>
                    </tr>
                    <tr>
                        <td>Order:</td>
                        <td><i class=""></i>{{ Form::text('order',$page->order) }}</td>
                    </tr>
                    <tr>
                        <td>Linkto:</td>
                        <td><i class=""></i>{{ Form::text('linkto',$page->linkto) }}</td>
                    </tr>
                    </tbody>
                </table>
            {{Form::submit()}}
        
{{ Form::close() }}

@stop
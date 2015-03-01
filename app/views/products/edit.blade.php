@extends('v1-wrapper')

@section('title')
    Redigera {{$product->name}}
@stop

@section('contentname')
    Produktredigering
@stop

@section('contenttitle')
    {{$product->name}}
@stop

@section('content')

<p class="box-rounded notis">Du är just nu i ett produktionssystem, och dina ändringar kommer gå live direkt.
    Det finns antagligen ingen backup, och när du trycker spara så kommer materialet på mammaskallare.se och wonderlan.se ändras.
    Se till så det du sparar är sådant som ska finnas på sidan.
</p>
<br />

{{Session::get('message')}}

@if(!empty($product->id))
    {{ Form::open(['url'=>'/products/'.$product->id.'/update']) }}
@else
    {{ Form::open(['url'=>'/products/update']) }}
@endif

<table class="table table-striped">
                    
                    <tbody><tr>
                        <td>Name:</td>
                        <td><i class="icon-home"></i> {{ Form::text('name',$product->name) }} {{$errors->first('name', '<span class=error>:message</span>')}}</td>
                    </tr>
                    
                    <tr>
                        <td>Price:</td>
                        <td><i class=""></i> {{ Form::textarea('price',$product->price) }} {{$errors->first('price', '<span class=error>:message</span>')}}</td>
                    </tr>
                    <tr>
                        <td>imageurl:</td>
                        <td><i class=""></i>{{ Form::text('imageurl',$product->imageurl) }} {{$errors->first('imageurl', '<span class=error>:message</span>')}}</td>
                    </tr>
                    <tr>
                        <td>start:</td>
                        <td><i class=""></i>{{ Form::text('start',$product->start) }} {{$errors->first('start', '<span class=error>:message</span>')}}</td>
                    </tr>
                    <tr>
                        <td>stop:</td>
                        <td><i class=""></i>{{ Form::text('stop',$product->stop) }} {{$errors->first('stop', '<span class=error>:message</span>')}}</td>
                    </tr>
                    <tr>
                        <td>type:</td>
                        <td><i class=""></i>{{ Form::text('type',$product->type) }} {{$errors->first('type', '<span class=error>:message</span>')}}</td>
                    </tr>
                    </tbody>
                </table>
            {{Form::submit()}}
        
{{ Form::close() }}

<br />

@stop
@extends('v1-wrapper')

@section('title')
    Registrera
@stop

@section('contentname')
    Registrera
@stop

@section('contenttitle')
    Bli en av oss
@stop

@section('content')
<p>
    Vad kul att du vill registrera dig hos oss! Det är vanlig vett och etikett som gäller för ditt konto här, så vi känner inte att det är så lönt att skriva någon uppsatts på 200 sidor om vad som gäller.
</p>
<p>
    Du behöver fylla i alla fälten. Tänk på att du INTE blir medlem i Sverok-föreningen genom att skapa ett konto. För att bli medlem och få medlemsförmåner får du kontakta oss på kontakt@mammaskallare.com, eller fånga någon av våra representanter!
</p>
<p>
    Nåväl. Var var vi. Jo! Registrering:
</p>


<div class="col-md-12 col-sm-12">
    {{ Form::open(array('route'=>'users.store','class' => 'form-horizontal')) }}
        <div class="form-group">
            {{Form::label('forename', 'Förnamn', array('class' => 'control-label col-md-2 col-sm-2'))}}
            <div class="col-sm-6 col-md-6">
                {{ Form::text('',null,array('class' => 'form-control col-sm-6 col-md-6', 'placeholder' => '')) }}
            </div>
            <div class="col-sm-3 col-md-3">
                {{$errors->first('forename', '<div class="col-sm-4 col-md-4 box-rounded notis warning"></span>:message</span></div>')}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('lastname', 'Efternamn', array('class' => 'control-label col-md-2 col-sm-2'))}}
            <div class="col-sm-6 col-md-6">
                {{ Form::text('lastname',null,array('class' => 'form-control col-sm-6 col-md-6', 'placeholder' => '')) }}
            </div>
            <div class="col-sm-3 col-md-3">
                {{$errors->first('lastname', '<div class="col-sm-4 col-md-4 box-rounded notis warning"><span>:message</span></div>')}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('ssid', 'Födelsedatum (YYMMDD)', array('class' => 'control-label col-md-2 col-sm-2'))}}
            <div class="col-sm-6 col-md-6">
                {{ Form::text('ssid',null,array('class' => 'form-control col-sm-6 col-md-6', 'placeholder' => '')) }}
            </div>
            <div class="col-sm-3 col-md-3">
                {{$errors->first('ssid', '<div class="col-sm-4 col-md-4 box-rounded notis warning"><span>:message</span></div>')}}
            </div>    
        </div>
        <div class="form-group">
            {{Form::label('streetaddress', 'Adress', array('class' => 'control-label col-md-2 col-sm-2'))}}
            <div class="col-sm-6 col-md-6">
                {{ Form::text('streetaddress',null,array('class' => 'form-control col-sm-6 col-md-6', 'placeholder' => '')) }}
            </div>
            <div class="col-sm-3 col-md-3">
            {{$errors->first('streetaddress', '<div class="col-sm-4 col-md-4 box-rounded notis warning"><span>:message</span></div>')}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('postalcode', 'Postnummer', array('class' => 'control-label col-md-2 col-sm-2'))}}
            <div class="col-sm-6 col-md-6">
                {{ Form::text('postalcode',null,array('class' => 'form-control col-sm-6 col-md-6', 'placeholder' => '')) }}
            </div>
            <div class="col-sm-3 col-md-3">
                {{$errors->first('postalcode', '<div class="col-sm-4 col-md-4 box-rounded notis warning"><span>:message</span></div>')}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('city', 'Stad', array('class' => 'control-label col-md-2 col-sm-2'))}}
            <div class="col-sm-6 col-md-6">
                {{ Form::text('city',null,array('class' => 'form-control col-sm-6 col-md-6', 'placeholder' => '')) }}
            </div>
            <div class="col-sm-3 col-md-3">
                {{$errors->first('city', '<div class="col-sm-4 col-md-4 box-rounded notis warning"><span>:message</span></div>')}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('phone', 'Telefonnummer', array('class' => 'control-label col-md-2 col-sm-2'))}}
            <div class="col-sm-6 col-md-6">
                {{ Form::text('phone',null,array('class' => 'form-control col-sm-6 col-md-6', 'placeholder' => '')) }}
            </div>
            <div class="col-sm-3 col-md-3">
                {{$errors->first('phone', '<div class="col-sm-4 col-md-4 box-rounded notis warning"><span>:message</span></div>')}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('email', 'Email', array('class' => 'control-label col-md-2 col-sm-2'))}}
            <div class="col-sm-6 col-md-6">
                {{ Form::text('email',null,array('class' => 'form-control col-sm-6 col-md-6', 'placeholder' => '')) }}
            </div>
            <div class="col-sm-3 col-md-3">
                {{$errors->first('email', '<div class="col-sm-4 col-md-4 box-rounded notis warning"><span>:message</span></div>')}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('city', 'Stad', array('class' => 'control-label col-md-2 col-sm-2'))}}
            <div class="col-sm-6 col-md-6">
                {{ Form::text('city',null,array('class' => 'form-control col-sm-6 col-md-6', 'placeholder' => '')) }}
            </div>
            <div class="col-sm-3 col-md-3">
                {{$errors->first('city', '<div class="col-sm-4 col-md-4 box-rounded notis warning"><span>:message</span></div>')}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('nickname', 'Nickname', array('class' => 'control-label col-md-2 col-sm-2'))}}
            <div class="col-sm-6 col-md-6">
                {{ Form::text('nickname',null,array('class' => 'form-control col-sm-6 col-md-6', 'placeholder' => '')) }}
            </div>
            <div class="col-sm-3 col-md-3">
            {{$errors->first('nickname', '<div class="col-sm-4 col-md-4 box-rounded notis warning"><span>:message</span></div>')}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('password', 'Lösenord', array('class' => 'control-label col-md-2 col-sm-2'))}}
            <div class="col-sm-6 col-md-6">
                {{ Form::text('password',null,array('class' => 'form-control col-sm-6 col-md-6', 'placeholder' => '')) }}
            </div>
            <div class="col-sm-3 col-md-3">
            {{$errors->first('password', '<div class="col-sm-4 col-md-4 box-rounded notis warning"><span>:message</span></div>')}}
            </div>
        </div>
        {{ Form::submit('Registrera dig',array('class' => 'btn btn-lg btn-primary btn-block')) }}
    {{ Form::close() }}
</div>
<div style="clear:both">
</div>


@stop

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
                        <td><i class="icon-home"></i> {{ Form::text('urlname',$page->urlname) }} </td>
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
                        <td><i class=""></i>{{ Form::textarea('content',$page->content, array('class' => 'wysiwyg')) }}</td>
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

<br />

<h2>Hur skit funkar</h2>
<p>
<ul>DET FINNS INGEN BACKUP. SE TILL ATT DU ÄR SÄKER PÅ VAD DU SKICKAR IN. Ctrl-C på allt innan man börjar ändra är en idé. Finns en featurereq om versioner, men det kommer ta ett tag.</ul>
<ul>urlname: Det som visas i addressfältet. Används också för referens eftersom inga knasiga tecken ska vara här.</ul>
<ul>Name: Sidans namn. Detta är körs i navigationsmenyerna och överallt där urlname inteska visas, typ.</ul>
<ul>Title: titlen. Visas just nu efter namnet på sidan.</ul>
<ul>Content: HTML-formatterad text. Släng in lite h och p-taggar så blir det bra. Om du har en vettig webbläsa ska du kunna göra denna rutan större genom att dra i kanten.</ul>
<ul>Parentname: urlname för huvudsidan. Så ex.vis har "Bra att veta" "wonderlan" som parentname, eftersom det är en undersida för WonderLAN.</ul>
<ul>Order: bestämmer ordningen i navbars. Först sorteras huvudsidor på order, sen sorteras undersidor på order. Lägst först.</ul>
<ul>Linkto: Om linkto är satt kommer navmenyerna att länka hit istället för till sidan för urlname. Så detta används för externa länkar, eller länkar till sidor som CRMController inte styr.</ul>

</p>

@stop

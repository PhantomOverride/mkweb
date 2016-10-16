@extends('v1-wrapper')

@section('v1-custom-css')
    <link href="/css/darkstrap.css" rel="stylesheet">
@stop

@section('title')
    WonderLAN Live
@stop

@section('contentname')
    WonderLAN Live
@stop

@section('contenttitle')
    Här och nu
@stop

@section('v1-custom-js')
@stop

@section('content')
<?php
    if(isset($_POST['submit'])){
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $header = filter_input(INPUT_POST, 'header', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $text = filter_input(INPUT_POST, 'text', FILTER_UNSAFE_RAW); //YOLO (TODO: html purifier?)
        $order = filter_input(INPUT_POST, 'order', FILTER_SANITIZE_NUMBER_INT);
        $submit = filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if($submit == "Uppdatera"){
            DB::update('UPDATE `live` SET `header` = ?, `text` = ?, `order` = ? WHERE `id` = ?', ["{$header}","{$text}",$order, $id]);
        }
        else if($submit == "Ny"){
            DB::insert('INSERT INTO `live` (`header`, `text`, `order`) VALUES (?, ?, ?)', ["{$header}","{$text}",$order]);
        }
    }
?>
<p>
    Du sitter i ett live system! Allt du gör kommer att hamna live, så gör inget dumt nu.
</p>

<?php
    $results = DB::select('SELECT * FROM live');
    foreach ($results as $res) {
        echo<<<FORM
<form action="" method="post">
    <fieldset><!-- Jeez why remove fieldset style? :(  -->
        <input type="hidden" name="id" value="{$res->id}" />
        Header: <br />
        <input type="text" name="header" value="{$res->header}" /> <br />
        Text: <br />
        <!-- Someone should probably put this in a css file -->
        <textarea name="text" rows="30" cols="80">
{$res->text}</textarea> <br />
        Ordning: (Lägst kommer först)<br />
        <input type="number" name="order" value="{$res->order}" /><br /><br />
        <input type="submit" name="submit" value="Uppdatera" /><br /><br />
    </fieldset>
</form>
<br />
FORM;
    }
?>
<form action="" method="post">
    <fieldset><!-- Jeez why remove fieldset style? :(  -->
        <input type="hidden" name="id" value="0" />
        Header: <br />
        <input type="text" name="header" value="Ge en bra titel :)" /> <br />
        Text: <br />
        <!-- Someone should probably put this in a css file -->
        <textarea name="text" rows="30" cols="80">
Skriv något riktigt fint!</textarea> <br />
        Ordning: (Lägst kommer först)<br />
        <input type="number" name="order" value="100" /><br /><br />
        <input type="submit" name="submit" value="Ny" /><br /><br />
    </fieldset>
</form>

@stop

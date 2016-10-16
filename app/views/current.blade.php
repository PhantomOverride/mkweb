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


<script>
        $('.row .btn').on('click', function(e) {
            e.preventDefault();
            var $this = $(this);
            var $collapse = $this.closest('.collapse-group').find('.collapse');
            $collapse.collapse('toggle');
            setTimeout(function(){
                //console.log($this.text().trim());
                if($this.text().trim() == '+Chatt & IRC'){
                    $("#inserthere").html('<iframe id="poopdoodles" src="https://kiwiirc.com/client/irc.bsnet.se/?nick=WL_?&theme=cli#wonderlan" style="border:0; width:100%; height:500px;"></iframe>')
                    console.log("poop");
                }
            },50)

        });
    </script>
<script>
    <!-- Twitch changed their api. TODO: Create a "client id" -->
    <!--$.getJSON('https://api.twitch.tv/kraken/streams/mk_wonderlan', function(channel){
        if(channel["stream"] == null){
            $("#stream").css("display","none");
        }
        else{
            $("#stream").css("display","block");
        }
    });-->
</script>
@stop

@section('content')
        <!--stream -->
    <section id="stream" style="margin-bottom: 20px;">
        <h3>Live Stream</h3>
        <br />
        <iframe src="http://www.twitch.tv/mk_wonderlan/embed" frameborder="0" scrolling="no" height="378" width="620" style="display:block; margin: 0px auto;"></iframe>
    </section>

<?php
    $results = DB::select('SELECT * FROM `live` ORDER BY `order` ASC');
    foreach ($results as $res) {
        echo<<<HTML
        <div class="row">
            <div class="span4 collapse-group">
                <a class="btn btnSection--icon btnSection btnSection--0" href="#">

                    <i>+</i><span>{$res->header}</span>

                </a>
                <div class="collapse">
                    {$res->text}
                </div>
            </div>
        </div>
HTML;
    }
?>

@stop

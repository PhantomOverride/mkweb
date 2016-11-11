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
        <script src= "http://player.twitch.tv/js/embed/v1.js"></script>
<div id="twitch_stream"></div>
<script type="text/javascript">
    var options = {
        width: 854,
        height: 480,
        channel: "mk_wonderlan",
        //video: "test"
    };
    var player = new Twitch.Player("twitch_stream", options);
    player.setVolume(0.5);
    player.addEventListener(Twitch.Player.PAUSE, () => { console.log('Player is paused!'); });
</script>
    </section>


    @foreach ($liveposts as $livepost)
        <div class="row">
            <div class="span4 collapse-group">
                <a class="btn btnSection--icon btnSection btnSection--0" href="#">

                    <i>+</i><span>{{$livepost->header}}</span>

                </a>
                <div class="collapse">
                    {{$livepost->text}}
                </div>
            </div>
        </div>
    @endforeach

@stop

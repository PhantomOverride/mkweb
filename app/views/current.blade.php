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
@stop

@section('content')
    <!--GUIDE -->
                <div class="row">
                    <div class="span4 collapse-group">
                        <a class="btn btnSection--icon btnSection btnSection--0" href="#">

                            <i>+</i><span>Schema och Survival Guide</span>

                        </a>
                        <div class="collapse">
<br />
Survivalguiden kan du hitta <a href="https://drive.google.com/open?id=0B_spxJ9x-IaHZFJwNHZ5ckdQa1U&authuser=0">här</a>!
<br />
<h3>Fredag</h3>
<ul>13:00 Incheckning öppnar</ul>
<ul>17:00 Subwaybeställning (beställ INNAN 17:00!). Leverans tar 1-2h.</ul>
<ul>19:00 Nedsläckning</ul>
<ul>19:30 - 22:00 StarCraft 2 (anmäl senast 18:30)</ul>
<ul>21:00 HearthStone (anmäl senast 20:00)</ul>
<ul>22:00 Artemis</ul>
<ul>00:30 Filmvisning</ul>

<h3>Lördag</h3>
<ul>11:00 - 20:00 League of Legends (anmäl senast 10:00) (matpaus vid 18:00)</ul>
<ul>11:00 - 20:00 League of Legends (anmäl senast 10:00) (matpaus vid 18:00)</ul>
<ul>12:00 Subwaybeställning (beställ INNAN 12:00!). Leverans tar 1-2h.</ul>
<ul>17:00 Subwaybeställning (beställ INNAN 17:00!). Leverans tar 1-2h.</ul>
<ul>19:00 Mario Kart 64</ul>
<ul>20:00 Counter-Strike: Global Offensive (anmäl senast 19:00)</ul>
<ul>00:30 Filmvisning</ul>

<h3>Söndag</h3>
<ul> 11:00 - 18:00 Heroes of the Storm (anmäl senast 10:00)</ul>
<ul>12:00 Subwaybeställning (beställ INNAN 12:00!). Leverans tar 1-2h.</ul>
<ul>17:00 Subwaybeställning (beställ INNAN 17:00!). Leverans tar 1-2h.</ul>
<ul>Prisutdelning 18:30</ul>
<ul>Måndag 00:00 - Försäljningen stänger</ul>
<br />
                        </div>
                    </div>
                </div>
    <!--Turnering -->
                <div class="row">
                    <div class="span4 collapse-group">
                        <a class="btn btnSection--icon btnSection btnSection--0" href="#">

                            <i>+</i><span>Turneringar</span>

                        </a>
                        <div class="collapse">
                            <br />
                            
                            Tänk på att ditt lag (eller bara lagledaren) behöver närvara under registreringen. Detta gäller även om du redan anmält intresse via hemsidan. Vid frågor kontakta CREW!
                            
                            <br />
                            <h3>League of Legends</h3>
                            <ul>Resultat: <a href="http://challonge.com/WLCAT2015LOL">http://challonge.com/WLCAT2015LOL</a></ul>
                            <ul>Samling och registrering: Lördag 10:00</ul>
                            <ul>Start: Lördag 11:00</ul>
                            
                            <h3>DotA 2</h3>
                            <ul>Resultat: <a href="http://challonge.com/WLCAT2015DOTA2">http://challonge.com/WLCAT2015DOTA2</a></ul>
                            <ul>Samling och registrering: Lördag 10:00</ul>
                            <ul>Start: Lördag 11:00</ul>
                            
                            <h3>Hearthstone</h3>
                            <ul>Resultat: <a href="http://challonge.com/WLCAT2015HS">http://challonge.com/WLCAT2015HS</a></ul>
                            <ul>Samling och registrering: Fredag 21:00</ul>
                            <ul>Start: Fredag 20:00</ul>
                            
                            <h3>StarCraft II</h3>
                            <ul>Resultat: <a href="http://challonge.com/WLCAT2015SC2">http://challonge.com/WLCAT2015SC2</a></ul>
                            <ul>Samling och registrering: Fredag 18:30</ul>
                            <ul>Start: Fredag 19:30</ul>
                            
                            <h3>Counter-Strike: Global Offensive</h3>
                            <ul>Resultat: <a href="http://challonge.com/WLCAT2015CSGO">http://challonge.com/WLCAT2015CSGO</a></ul>
                            <ul>Samling och registrering: Lördag 19:00</ul>
                            <ul>Start: Lördag 20:00</ul>
                            
                            <h3>Heroes of the Storm</h3>
                            <ul>Resultat: <a href="http://challonge.com/WLCAT2015HOTS">http://challonge.com/WLCAT2015HOTS</a></ul>
                            <ul>Samling och registrering: Söndag 10:00</ul>
                            <ul>Start: Söndag 11:00</ul>
                            
                            <br />
                            
                            Prisutdelning sker på söndag klockan 18:30!
                            
                        </div>
                    </div>
                </div>
    <!--Foodruns -->
                <div class="row">
                    <div class="span4 collapse-group">
                        <a class="btn btnSection--icon btnSection btnSection--0" href="#">

                            <i>+</i><span>Foodruns</span>

                        </a>
                        <div class="collapse">
                            <br />
                            Du hittar Subway-formuläret <a href="http://wonderlan.se/subway">HÄR</a>!
                            <br /><br />
                            OBSERVERA att du behöver beställa och BETALA din mat innan den avsatta tiden på schemat. Du lägger in beställningen via formuläret, och sen betalar du den i Entrén.
                            Betala gärna direkt så du inte glömmer det! Nomnomnom!
                            <br />
                        <h3>Fredag</h3>
                        <ul>17:00 Foodrun - Subway (beställ innan denna tid)</ul>
                        <h3>Lördag</h3>
                        <ul>12:00 Foodrun - Subway (beställ innan denna tid)</ul>
                        <ul>17:00 Foodrun - Subway (beställ innan denna tid)</ul>
                        <h3>Söndag</h3>
                        <ul>12:00 Foodrun - Subway (beställ innan denna tid)</ul>
                        <ul>17:00 Foodrun - Subway (beställ innan denna tid)</ul>
                        <br />
                        </div>
                    </div>
                </div>
   
    <!--Servers -->
                <div class="row">
                    <div class="span4 collapse-group">
                        <a class="btn btnSection--icon btnSection btnSection--0" href="#">

                            <i>+</i><span>Servers</span>

                        </a>
                        <div class="collapse">
                            <br />
                            <ul>Teamspeak: teamspeak.wonderlan.se</ul>
                            <ul>Mumble: mumble.wonderlan.se</ul>
                        </div>
                    </div>
                </div>
    <!--IRC Chatt -->
                <div class="row">
                    <div class="span4 collapse-group">
                        <a class="btn btnSection--icon btnSection btnSection--0" href="#">

                            <i>+</i><span>Chatt & IRC</span>
                        </a>
                        
                        <p class="collapse">
                            
                            Du kan hoppa in i #wonderlan på irc.bthstudent.se, eller använda klienten nedan:
                        <span id='inserthere'></span>
                            
                                
                        </p>
                    </div>
                </div>
    <!--Sovsal -->
                <div class="row">
                    <div class="span4 collapse-group">
                        <a class="btn btnSection--icon btnSection btnSection--0" href="#">

                            <i>+</i><span>Sovsal</span>

                        </a>
                        <div class="collapse">
                            <br />
                            Sovsalen är öppen mellan 00:00-12:00. Håll utkik kring klockan tolv när skjuts eller vägledning till sovsalen kan komma att ske.
                            <br/>
                            Kom ihåg att det är förbjudet att sova i BTH:s lokaler! Sov hemma eller i sovsalen!
                            <br />
                            <img src="/img/wl/karta.png" />
                            <br /><br />
                        </div>
                    </div>
                </div>
        <!--stream -->
                <div class="row">
                    <div class="span4 collapse-group">
                        <a class="btn btnSection--icon btnSection btnSection--0" href="#">

                            <i>+</i><span>Live Stream</span>

                        </a>
                        <div class="collapse">
                            <br />
                            Du kan se vår livestream på <a href="http://www.twitch.tv/mk_wonderlan">http://www.twitch.tv/mk_wonderlan</a>.
                            <br />
                            <iframe src="http://www.twitch.tv/mk_wonderlan/embed" frameborder="0" scrolling="no" height="378" width="620"></iframe><a href="http://www.twitch.tv/mk_wonderlan?tt_medium=live_embed&tt_content=text_link" style="padding:2px 0px 4px; display:block; width:345px; font-weight:normal; font-size:10px;text-decoration:underline;">Watch live video from mk_wonderlan on www.twitch.tv</a>
                            <br />
                        </div>
                    </div>
                    
                </div>
@stop
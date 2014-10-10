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
                            Om du har tappat bort din Survival Guide kan du ladda ner den <a href="#">HÄR</a>!
                            <br />
                        <h3>Fredag</h3>
                        <ul>17:00 Foodrun - Subway (beställ innan denna tid)</ul>
                        <ul>19:00 Nedsläckning</ul>
                        <ul>19:05 Kickoff programmeringstävling</ul>
                        <ul>19:30 StarCraft 2 (börjar spela 20:30)</ul>
                        <ul>21:00 HearthStone (börjar spela 22:00)</ul>
                        <ul>00:00 Sovsalen öppnar!</ul>
                        <h3>Lördag</h3>
                        <ul>11:00 League of Legends (börjar spela 12:00)</ul>
                        <ul>12:00 Foodrun - Subway (beställ innan denna tid)</ul>
                        <ul>17:00 Foodrun - Subway (beställ innan denna tid)</ul>
                        <ul>18:00 Counter-Strike: Global Offensive (börjar spela 19:00)</ul>
                        <ul>19:00 Mario Kart 64</ul>
                        <ul>00:00 Sovsalen öppnar!</ul>
                        <h3>Söndag</h3>
                        <ul>11:00 DotA 2 (börjar spela 12:00)</ul>
                        <ul>12:00 Foodrun - Subway (beställ innan denna tid)</ul>
                        <ul>15:00 Programmeringstävling slut och redovisning</ul>
                        <ul>17:00 Foodrun - Subway (beställ innan denna tid)</ul>
                        <ul>18:00 Prisutdelning!</ul>
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
                            <ul>Samling och registrering: Lördag 11:00</ul>
                            <ul>Start: Lördag 12:00</ul>
                            
                            <h3>DotA 2</h3>
                            <ul>Samling och registrering: Lördag 11:00</ul>
                            <ul>Start: Lördag 12:00</ul>
                            
                            <h3>Hearthstone</h3>
                            <ul>Samling och registrering: Fredag 21:00</ul>
                            <ul>Start: Fredag 22:00</ul>
                            
                            <h3>Counter-Strike: Global Offensive</h3>
                            <ul>Samling och registrering: Lördag 18:00</ul>
                            <ul>Start: Lördag 19:00</ul>
                            
                            <br />
                            
                            Prisutdelning sker på söndag klockan 18!
                            
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
                            Du hittar Subway-formuläret <a href="#">HÄR</a>!
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
    <!--Activity -->
                <div class="row">
                    <div class="span4 collapse-group">
                        <a class="btn btnSection--icon btnSection btnSection--0" href="#">

                            <i>+</i><span>Activity och events</span>

                        </a>
                        <div class="collapse">
                            <br />
                            Om du har tappat bort din Survival Guide kan du ladda ner den <a href="#">HÄR</a>!
                            <br />
                        <h3>Fredag</h3>
                        <ul>19:00 Nedsläckning</ul>
                        <ul>19:05 Kickoff programmeringstävling</ul>
                        <ul>00:00 Sovsalen öppnar!</ul>
                        <h3>Lördag</h3>
                        <ul>19:00 Mario Kart 64</ul>
                        <ul>00:00 Sovsalen öppnar!</ul>
                        <h3>Söndag</h3>
                        <ul>15:00 Programmeringstävling slut och redovisning</ul>
                        <ul>18:00 Prisutdelning!</ul>
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
                        <p class="collapse">
                            <br />
                            Här kan aktuell serverinfo visas. Just nu har vi inga servrar igång.
                            <br />
                        </p>
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
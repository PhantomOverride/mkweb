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
        <!--stream -->

                        <h3>Live Stream</h3>


                            <br />
                            <ul>Du kan se vår livestream på <a href="http://www.twitch.tv/mk_wonderlan">http://www.twitch.tv/mk_wonderlan</a>.</ul>
                            <br />
                            <iframe src="http://www.twitch.tv/mk_wonderlan/embed" frameborder="0" scrolling="no" height="378" width="620"></iframe><a href="http://www.twitch.tv/mk_wonderlan?tt_medium=live_embed&tt_content=text_link" style="padding:2px 0px 4px; display:block; width:345px; font-weight:normal; font-size:10px;text-decoration:underline;">Watch live video from mk_wonderlan on www.twitch.tv</a>
                            <br />

    <!--GUIDE -->
                <div class="row">
                    <div class="span4 collapse-group">
                        <a class="btn btnSection--icon btnSection btnSection--0" href="#">

                            <i>+</i><span>Schema</span>

                        </a>
                        <div class="collapse">
                        <br />
                        <br />
                        <h3>Fredag</h3>
                        <ul>17:00 Incheckning öppnar!</ul>
                        <ul>19:00 Nedsläckning</ul>
                        <ul>19:00 Subwaybeställning (beställ innan 19:00!). Leverans tar 1-2h.</ul>
                        <ul>19:30 StarCraft 2 (anmäl innan 19:30)</ul>
                        <ul>20:00 CS:GO (anmäl innan 20:00)</ul>


                        <h3>Lördag</h3>
                        <ul>01:00 - 04:00 Nerfgun Battle</ul>
                        <ul>11:00 League of Legends (anmäl innan 11:00)</ul>
                        <ul>11:00 DotA2 (anmäl innan 11:00)</ul>
                        <ul>12:00 Subwaybeställning (beställ innan 12:00!). Leverans tar 1-2h.</ul>
                        <ul>17:00 Subwaybeställning (beställ innan 17:00!). Leverans tar 1-2h.</ul>
                        <ul>20:00 Rocket League (anmäl innan 20:00)</ul>
                        <ul>20:00 Frågesport </ul>

                        <h3>Söndag</h3>
                        <ul>11:00 Speed Runners (anmäl innan 11:00)</ul>
                        <ul>12:00 Subwaybeställning (beställ innan 12:00!). Leverans tar 1-2h.</ul>
                        <ul>13:00 Hearthstone</ul>
                        <ul>16:00 Paint-tävling</ul>
                        <ul>17:00 Subwaybeställning (beställ innan 17:00!). Leverans tar 1-2h.</ul>
                        <ul>17:00 Gang Beasts</ul>
                        <ul>01:00 Tack för denna gång! Dags att börja packa ihop!</ul>
                        <ul>02:00 WonderLAN är över!</ul>
                        </div>
                    </div>
                </div>
    <!--Uppkoppling till internet -->
                <div class="row">
                    <div class="span4 collapse-group">
                        <a class="btn btnSection--icon btnSection btnSection--0" href="#">

                            <i>+</i><span>Uppkoppling till internet</span>
                            
                        </a>
                        <div class="collapse">
                            <br />
                            <ul>För att få tillgång till internet så kopplar man först in sin dator till närmaste switch. 
                            Därefter så går man till Netlogon (man slussas dit automatiskt när man försöker nå en hemsida). 
                            Man loggar därefter in med sitt BTH-kort (gäster utan BTH-kord hänvisas till entrén där gäst-login går att erhålla). 
                            Många eventuella problem löses genom att tömma nätverksinställningar (google DNS brukar vara ett problem) och sedan starta om datorn. 
                            Vid fortsatta problem, kontakta crew.
                        
                            Glömt din nätverkskabel, eller var den du tog med dig inte lång nog? Vi lånar ut nätverkskablar för 50kr i pant i entrén.</ul>
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
                            
                            Du kan som lagledare anmäla ditt lag på webben eller i Entré. Vid frågor kontakta CREW!
                            
                            <br />
                            <h3>Starcraft 2</h3>
                            <ul>Resultat: </ul>
                            <ul>Samling och registrering: Fredag 19:30</ul>
                            <ul>Start: Fredag 19:30</ul>
                            
                            <br />
                            <h3>Counter Strike Global Offensive</h3>
                            <ul>Resultat: </ul>
                            <ul>Samling och registrering: Fredag 20:00</ul>
                            <ul>Start: Fredag 20:00</ul>
                            
                            <br />
                            <h3>League of Legends</h3>
                            <ul>Resultat: </ul>
                            <ul>Samling och registrering: Lördag 11:00</ul>
                            <ul>Start: Lördag 11:00</ul>
                            
                            <br />
                            <h3>Dota</h3>
                            <ul>Resultat: </ul>
                            <ul>Samling och registrering: Lördag 11:00</ul>
                            <ul>Start: Lördag 11:00</ul>
                            
                            <br />
                            <h3>Rocket League</h3>
                            <ul>Resultat: </ul>
                            <ul>Samling och registrering: Lördag 20:00</ul>
                            <ul>Start: Lördag 20:00</ul>
                            
                            <br />
                            <h3>Speed Runners</h3>
                            <ul>Resultat: </ul>
                            <ul>Samling och registrering: Söndag 11:00</ul>
                            <ul>Start: Söndag 11:00</ul>
                            
                            <br />
                            <h3>Hearthstone</h3>
                            <ul>Resultat: </ul>
                            <ul>Samling och registrering: Söndag 13:00</ul>
                            <ul>Start: Söndag 13:00</ul>
                            
                            <br />
                            <h3>Gang Beasts</h3>
                            <ul>Resultat: </ul>
                            <ul>Samling och registrering: Söndag 17:00</ul>
                            <ul>Start: Söndag 17:00</ul>
                            
                            <br />
                            
                            Prisutdelning sker ????!
                            
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
                            <br />
                            <br />
                            OBSERVERA att du behöver beställa och BETALA din mat innan den avsatta tiden på schemat. Du lägger in beställningen via formuläret, och sen betalar du den i Entrén.
                            Vi kommer att ha 2 tillfällen per dag (1 under fredag) där man kan beställa en kall Subway-macka som sedan levereras och kan hämtas i entrén. 
                            Tiderna i tabellen nedan är deadline för att ha beställt och betalat sin sub (betalning sker i entrén). Leverans beräknas ta 1.5-2h. Ordinare priser gäller.
                            Betala gärna direkt så du inte glömmer det! Nomnomnom!
                            <br />
                        <h3>Fredag</h3>
                        <ul>19:00 Foodrun - Subway (beställ och betala innan denna tid)</ul>
                        <h3>Lördag</h3>
                        <ul>12:00 Foodrun - Subway (beställ och betala innan denna tid)</ul>
                        <ul>17:00 Foodrun - Subway (beställ och betala innan denna tid)</ul>
                        <h3>Söndag</h3>
                        <ul>12:00 Foodrun - Subway (beställ och betala innan denna tid)</ul>
                        <ul>17:00 Foodrun - Subway (beställ och betala innan denna tid)</ul>
                        <br />
                        </div>
                    </div>
                </div>
    <!--Pratprogram och Serverar -->
                <div class="row">
                    <div class="span4 collapse-group">
                        <a class="btn btnSection--icon btnSection btnSection--0" href="#">

                            <i>+</i><span>Ko-mmunikation och Serverar</span>

                        </a>
                        <div class="collapse">
                            <br />
                            
                        <ul>På WonderLAN så tillhandahålls ett antal kommunikationstjänster. 
                        Ifall du vill ha en bra platform att använda för att prata med dina vänner på, 
                        eller vill ställa frågor till crew eller allmänt få information, 
                        så finns nedanstående servrar och kommunikationsvägar öppna.</ul>
                        
                        <h3>Discord</h3>  
                        
                        <ul><a href="https://discord.gg/0whjY97Dr994eifR">https://discord.gg/0whjY97Dr994eifR</a></ul>
                        
                        <h3>Teamspeak3</h3>  
                        
                        <ul>IP: teamspeak.wonderlan.se</ul>
                        
                        <h3>Facebook</h3>  
                        
                        <ul><a href="https://www.facebook.com/MK.WonderLAN/">https://www.facebook.com/MK.WonderLAN/</a></ul>
                        
                        <ul><a href="https://www.facebook.com/MammasKallare">https://www.facebook.com/MammasKallare</a></ul>
                        
                        <ul><a href="https://www.facebook.com/events/1732555520323945/">https://goo.gl/I5tsGk</a></ul>
                        
                        <h3>Twitter</h3> 
                        
                        <ul>@MammasKallare</ul>
                        
                        <h3>Minecraft</h3> 
                        
                        <ul>IP: kommer strax</ul>
                        
                            
                        <br />
                        </div>
                    </div>
                </div>
    <!--Proviant -->
                <div class="row">
                    <div class="span4 collapse-group">
                        <a class="btn btnSection--icon btnSection btnSection--0" href="#">

                            <i>+</i><span>Proviant</span>

                        </a>
                        <div class="collapse">
                            <br />

                            <br /><br />
                        </div>
                    </div>
                </div>
    <!--Brädspel -->
                <div class="row">
                    <div class="span4 collapse-group">
                        <a class="btn btnSection--icon btnSection btnSection--0" href="#">

                            <i>+</i><span>Brädspel</span>

                        </a>
                        <div class="collapse">
                            <br />
                             <br />
                            <ul> För de som vill ta en paus från spelandet och slappna av med lite analog underhållning så är det fullt möjligt att låna brädspel från entrén 
                            (pantsätt med BTH-kort, körkort eller liknande). </ul>
                            <br /><br />
                            <br /><br />
                        </div>
                    </div>
                </div>
        <!--Activity -->
                <div class="row">
                    <div class="span4 collapse-group">
                        <a class="btn btnSection--icon btnSection btnSection--0" href="#">

                            <i>+</i><span>Aktiviteter</span>

                        </a>
                        <div class="collapse">
                            <br />
                        
                        
                        <ul>För de personer som vill ta en liten paus från spelandet och kanske sträcka lite på benen så kommer vi i CREW att anordna några events under lanets gång. 
                        Dessa events består av en skattjakt, nerf gun-krig, frågesport och en paint tävling.</ul>
                        
                        <h3>Frågesporten:</h3>  
                        
                        <ul>Har du bra koll på spelvärlden och känner att du kan ta hem priset som WonderLANs mästare i spel trivia? 
                        Då ska du dyka upp i sal J1620 klockan 20:00 på lördagkväll för att bevisa detta!  
                        
                        OBS! ***Frågor om kor kan förekomma!***</ul>
                        
                        <h3>Nerf Gun-krig:</h3>  
                        
                        <ul>Om du vill få adrenalinet att flöda och svetten att rinna samtidigt som du skjuter folk med
                        plastvapen, då är nerf gun-krig något för dig! Nerf gun krig kommer att anordnas natten mellan
                        fredag och lördag klockan 01:00 - 04:00 på rotundan. Varje match spelas med upp till 5 personer i
                        varje lag och vapen tillhandahålls av CREW. Du behöver inte ha ett eget lag utan det är bara att
                        dyka upp så delas lag in på plats. Det kommer att spelas både capture the flag och team
                        deathmatch.</ul>
                        <div style="float:left;width:55%;">
                         <a href="http://mammaskallare.se/img/wl/fantastic.jpg"> <img style="width:100%" src="http://mammaskallare.se/img/wl/fantastic.jpg" /> </a>
                        </div>
                        <div style="float:right;width:40%">
                         <a href="http://mammaskallare.se/img/wl/nerfmap.png"> <img style="width:100%" src="http://mammaskallare.se/img/wl/nerfmap.png" /> </a><p style="font-size:small;">Klicka på kartan för förstoring</p>
                        </div>
                        <h3 style="clear:both;">Paint-tävling:</h3> 
                        
                        <ul>Är du en Picasso i paint eller bara gillar att måla ändå? 
                        Då ska du vara med i Paint-tävlingen som kommer att hållas söndag klockan 16:00. 
                        Temat på tävlingen kommer att avslöjas på plats och deltagarna har sedan en timme på sig att rita en bild i paint som passar till temat. </ul>
                        
                        <h3>Skattjakten</h3> 
                        
                        <ul>Om du gillar att lösa gåtor och följa ledtrådar så finns det en skattjakt som pågår under hela lanet. 
                        Första ledtråden finns någonstans på denna hemsida!
                        </ul>
                        

                            <br />
                        </div>
                    </div>
                    
                </div>
@stop

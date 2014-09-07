<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            
		Schema::create('pages', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->string('urlname'); //URL-friendly name
                        $table->string('name'); //Page name, not URL-friendly. Shown in navbars etc.
                        $table->string('title'); //The title of the page, something clever.
                        $table->longtext('content'); //The actual content.
                        $table->string('parentname')->nullable(); //Do we have a parent, or are we a parent? urlname expected.
                        $table->integer('order')->default(1000); //Order pages by order value. Lowest comes first.
                        $table->string('linkto')->nullable()->default(null); //Set this to some external link. Content is disregarded. Only used for placing links in the navbar.
                        $table->timestamps();
		});
                
                //
                // PAGES FOR MAMMAS KALLARE
                //
                
                DB::table('pages')->insert(
                        array(
                            'urlname' => 'mammaskallare',
                            'name' => 'Mammas Källare',
                            'title' => 'Verkligheten väntar...',
                            'content' =>
'
<p>Mammas Källare grundades av en grupp rollspelare och dåvarande förstaårs-studenter på BTH år 2009. Samtliga grundare ansåg att studentlivet i Blekinge hade potential, och att det vore kul om några drivande individer tog tag i saken och organiserade en studentförening dedikerad till spel och verklighetsflykt! Mammas Källare har sedan dess jobbat med rollspel, brädspel, filmkvällar, airsoft-event och LAN – däribland WonderLAN, som arrangeras en gång per termin. Vi existerar för att berika studentlivet i Blekinge och föra människor samman genom galna upptåg och roliga event.</p>

<p>Mammas Källare är inte att förväxlas med kvasiföreningen MK. De båda organisationerna är ekonomiskt skilda från varandra, och Sverokföreningen är öppen för alla som vill bli medlemmar. De aktiviteter vi anordnar är alkoholfria och faller under Sverok, däribland WonderLAN och våra populära airsoftspel.</p>

<p>Om du känner dig manad att hjälpa oss nå våra mål är det bara att gå fram till någon av våra representanter i styrelsen, slänga iväg ett mail, eller via vår facebooksida.</p>

<p>Välkommen till verkligheten!</p>
',
                            'parentname' => null,
                            'order' => 10,
                        )
                );
                
                DB::table('pages')->insert(
                        array(
                            'urlname' => 'kontakt',
                            'name' => 'Kontakt',
                            'title' => 'Kom i kontakt med oss!',
                            'content' =>
'
<p>Enklaste sättet att komma i kontakt med oss är att slänga ett mail till <a href="mailto:kontakt@mammaskallare.se">kontakt@mammaskallare.se</a>! Vi har även en sida på Facebook, om det passar bättre.</p>

<p>Är det någon särskild i styrelsen du vill nå så kan du hitta uppgifterna under sidan för Styrelse.</p>

<p>Om ärendet rör WonderLAN kan du kontakta <a href="mailto:kontakt@wonderlan.se">kontakt@wonderlan.se</a>.</p>

<p>Annars är du välkommen att fånga någon av våra representanter eller CREW och ställa dina frågor IRL.</p>
',
                            'parentname' => 'mammaskallare',
                            'order' => 15,
                        )
                );
                
                DB::table('pages')->insert(
                        array(
                            'urlname' => 'om-oss',
                            'name' => 'Om Oss',
                            'title' => 'Så, vad är det vi sysslar med?',
                            'content' => 
'
<p>Vår nya hemsida har lite fler sidor än vår förra, och vi försöker under veckan fylla de nya bitarna med information. Kika tillbaks lite senare =)!</p>
',
                            'parentname' => 'mammaskallare',
                            'order' => 11,
                        )
                );
                
                DB::table('pages')->insert(
                        array(
                            'urlname' => 'styrelse',
                            'name' => 'Styrelse',
                            'title' => 'All of this, brought to you by...',
                            'content' => 
'
<p>Betalande medlemmar tillsätter på årsmötet i början på varje verksamhetsår styrelsen för Mammas Källare. De förtroendevalda ansvarar för verksamheten under året, och ser till att den verksamhetsplan som ligger i medlemmarnas intresse blir av.</p>

<p>Som gratis medlem är du välkommen att delta på årsmötet och komma med dina förslag, men det är endast betalande medlemmar som har rösträtt.</p>

<p>Styrelsen för verksamhetsåret 2014 är som följer:</p>

<h3>Ordförande</h3>
<p>
Oscar Hjelm - oscar.hjelm snabel-a mammaskallare.se
</p>


<h3>Kassör</h3>
<p>
Pontus Franzén - pontus.franzen snabel-a mammaskallare.se
</p>


<h3>Sekreterare</h3>
<p>
Jakob Lidborn - jakob.lidborn snabel-a mammaskallare.se
</p>

<h3>Sektionen för brädspel</h3>
<p>
Christian Burgman - christian.burgman snabel-a mammaskallare.se
<br />
Otto Remse - otto.remse snabel-a mammaskallare.se
</p>

<h3>Sektionen för airsoft - Pluton MK</h3>
<p>
Erik Bergenholtz - erik.bergenholtz snabel-a mammaskallare.se
<br />
Johny Löfgren - johny.lofgren snabel-a mammaskallare.se
</p>   
',                        
                            'parentname' => 'mammaskallare',
                            'order' => 12,
                        )
                );
                
                
                //
                // PAGES FOR WonderLAN
                //
                
                DB::table('pages')->insert(
                        array(
                            'urlname' => 'wonderlan',
                            'name' => 'WonderLAN',
                            'title' => 'Are you ready?',
                            'content' =>
'
<p class="box-rounded notis" >Fram med kofoten och gör dig redo för den kommande instansen av WonderLAN - EValved! Med start fredagen den 10 oktober blir det ett LAN och spelfest utan dess like fram till måndagen den 13. Häng med gemenskapen och tävla i ett av spelen som intreserar dig! Se eventsidan för mer information!</p>

<p>WonderLAN är ett LAN-party och spelfest med Alice i Underlandet-tema som anordnas terminsvis av Mammas Källare. Vi har varit igång sedan hösten 2010 när vi för första gången anordnade LAN:et på Kårhuset Rotundan i Karlskrona. Därefter har evenemanget bara växt och vi har flyttat till större lokaler för att rymma alla deltagare. Nu har vi i snitt över 100 betalande besökare per LAN, med ett rekord hösten 2012 på 150 betalande besökare.</p>

<p>På WonderLAN finns allt för spelfantasten med en blandning av både digitalt och analogt. Vi håller turneringar och tävlingar i populära PC-spel och har en mysig konsolhörna där man kan prova på diverse tv-spel. Utöver detta florerar såväl kort- som roll- och brädspel under evenemanget. Den som vill ta en paus från spelandet kan även koppla av i filmsalen där vi visar en skön blandning av såväl nyare filmer som gamla favoriter.</p>

<p>Den nyfikne besökaren kommer in gratis på evenemanget och för den som vill ha med egen hårdvara kan en datorplats bokas via vår hemsida mot en skälig summa riksdaler.</p>

<p>För att hålla dig uppdaterad, glöm inte bort att gilla WonderLAN på facebook.</p>
',
                            'parentname' => null,
                            'order' => 20,
                        )
                );
                
                DB::table('pages')->insert(
                        array(
                            'urlname' => 'evalveing',
                            'name' => 'Kommande LAN',
                            'title' => '<br />WonderLAN - EValveing',
                            'content' =>
'
<p>Mer information inom (väldigt) kort!</p>
',
                            'parentname' => 'wonderlan',
                            'order' => 21,
                        )
                );
                
                DB::table('pages')->insert(
                        array(
                            'urlname' => 'om-wonderlan',
                            'name' => 'Om WonderLAN',
                            'title' => 'Historian bakom LAN:et',
                            'content' =>
'
<p>Historien om WonderLAN börjar med Mammas Källare, som tyckte att det var för lite nördiga aktiviteter och bestämde sig för att hålla ett LAN. En av grundarna till MK hade en viss besatthet av Alice in Wonderland (vilket inte hör till ovanligheterna), så temat var satt från början. Men vad skulle det kallas? Genom antingen genialitet eller lathet så kom man på WonderLAN, en simpel och passande förkortning av Wonderland. Och här är vi då, på vårat femte lan!</p>

<p>Lite allmän info om lanet var att det tog plats 1-4 oktober 2010, vårat första höstlan. Vi skröt med våran 100Mbit’s uppkoppling, dansmattor och diverse turneringar (LoL, SC2, DOTA och CS). Skor var inte tillåtet så alla tassade runt med blåa skyddsöverdrag på skorna/fötterna, vilket säkerligen var en syn.</p>

<p>På första lanet vistades vi inte i skolans multisal, utan höll istället till på Rotundan, BTH’s utmärkande kårhus precis vid vattnet. Deltagarskaran var onekligen mindre än den är nu, men redan då var det ungefär 60 deltagare, plus cirka 10 i CREW. Dessa 10 hade lyxen att ha sitt CREWs nest uppe på sjävla scenen, och de myste till det lite extra med blinkande lampor.</p>

<p>Det första lanet beskrivs som varmt, svettigt och händelserikt. Det som alla kommer ihåg är båtbranden. Daniel, som var med i CREW, var rökare och smet då och då ut för att mätta sitt beroende. En gång när han var på väg ut med tändaren i handen så frågades det vad han skulle göra, varpå svaret blev “Tända fyr på något”. Inte långt senare ropas det ut inne på Rotundan att en båt minsann brinner ute vid bryggan! Detta skapade inte speciellt stor uppståndelse bland varken deltagarna eller CREW vid tiden, men vi minns och hedrar denna händelse. Vissa påstår att de kan se båten brinna än…</p>

<p>Andra spännande saker som hände under det här första lanet var bland annat ett elavbrott för hälften av deltagarna, vilket inte CREW visste om förän en halvtimme senare, då det självklart åtgärdades. Läxan lärd så har vi nu professionellt dragen el. CREW minns också väl en viss mikrovågsugn som fick smeknamnet “Ion cannon”. Offret för denna mikro var en Billy’s panpizza, som efter attacken hade ett hål i mitten och var allmänt väldigt smält.</p>

<p>Vi har kommit en lång väg från det första lanet, och vi hoppas på att vårat kärleksbarn, som det nu har blivit, växer ännu mer till nästa gång.</p>
',
                            'parentname' => 'wonderlan',
                            'order' => 22,
                        )
                );
                
                DB::table('pages')->insert(
                        array(
                            'urlname' => 'bra-att-veta',
                            'name' => 'Bra att veta',
                            'title' => 'Läs detta innan WonderLAN',
                            'content' =>
'
Lite växtvärk just nu. Kom tillbaka imorgon!
',
                            'parentname' => 'wonderlan',
                            'order' => 23,
                        )
                );
                
                DB::table('pages')->insert(
                        array(
                            'urlname' => 'regler',
                            'name' => 'Regler',
                            'title' => 'Detta gäller när du är med oss',
                            'content' =>
'
<p>Reglerna under WonderLAN är följande:</p>
<ul>
<li>Illegal fildelning är förbjudet under svensk lag, och därför inte heller tillåtet under WonderLAN. Illegal fildelning kan medföra risken att vår internetförbindelse bryts, vilket ställer till problem för samtliga av LAN:ets deltagare.</li>
<li>WonderLAN är drogfritt. Varken alkohol eller andra droger tillåts inne i lokalen. Inte heller tillåts drogpåverkade människor att vistas i WonderLANs lokaler!</li>
<li>På grund av att ovve är starkt förknippat till alkoholrelaterade tillställningar så är det ett olämpligt klädesplagg att ha på sig under WonderLAN, och vi förebehåller oss rätten att avvisa alla personer som har ovve på sig från eventet.</li>
<li>All rökning är förbjuden i BTH:s lokaler, därav får rökning ske utomhus. E-cigg tillåts inte i multisalen.
<li>Under WonderLAN är det otillåtet att utan vår tillåtelse affischera, göra reklam eller på annat sätt skräpa ned.</li>
<li>Obehöriga får inte vistas i CREW-områdena.</li>
<li>Under WonderLAN ansvarar du själv för dina ägodelar.</li>
<li>Utifall du skulle ha sönder någon utrustning tillhörande oss eller våra partners kommer vi hålla dig kostnadsskyldig.</li>
<li>Det är inte tillåtet att sova i skolans lokaler. Detta ska ske hemma eller i sovsalarna avsedda för ändamålet.</li>
<li>Du får ej överbelasta elnätet genom att t.ex. koppla in vattenkokare eller liknande utrustning. Endast dator med kringutrustning får kopplas in.</li>
<li>Vi förbehåller oss rätten att ställa in turneringar och tävlingar med för få deltagare.</li>
<li>Det går att betala bokningen på plats, dock tillkommer en administrationsavgift på 20 SEK.</li>
<li>Bokning är bindande om inget annat sägs.</li>
<li>Respektera andra deltagare och CREW. Vid upprepat respektlöst beteende förbehåller vi oss rätten att avhysa Dig från eventet.</li>
<li>Vi frånsäger oss ansvar vid händelser utom våran kontroll (force majeuer) såsom naturkatastrofer och elavbrott till lokalen.</li>
</ul>
<p>Notera att regler kan tillkomma och ändras både innan och under WonderLAN.</p>
',
                            'parentname' => 'wonderlan',
                            'order' => 24,
                        )
                );
                
                //
                // PAGES FOR Brädspel
                //
                
                DB::table('pages')->insert(
                        array(
                            'urlname' => 'bradspel',
                            'name' => 'Brädspel',
                            'title' => 'När handkontroller inte är nog',
                            'content' =>
'
<p>Brädspel är en ny del av föreningen, vars syfte är att styra upp verksamheten som berör Bräd-, kort- och rollspel.
Här kan det röra sig om både större spelkvällar som hålls på Rotundan, men även mindre kvällar hemma hos spelintresserade.</p>
<p>Intresserad av att hitta spelkamrater? Häng med på våra aktiviteter! Vi ses där!</p>
',
                            'parentname' => null,
                            'order' => 30,
                        )
                );
                
                //
                // PAGES FOR Pluton MK
                //
                
                DB::table('pages')->insert(
                        array(
                            'urlname' => 'plutonmk',
                            'name' => 'Pluton MK',
                            'title' => 'Skjut plast och träffa nya vänner',
                            'content' =>
'
<p>Varför sitta och tjafsa om VR-produkter som Oculus Rift och löjligheter som 7.1-headset och Kinekt
- när man kan leka krig på riktigt istället?</p>
<p>Häng med på våra airsoft-aktiviteter och träffa nya vänner (bokstavligen!). Nya och erfarna spelare är lika välkommna!
Det finns möjlighet för dig som är helt ny att prova på hur det är att spela airsoft genom att låna utrustning.</p>
',
                            'parentname' => null,
                            'order' => 40,
                        )
                );
                
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pages', function(Blueprint $table)
		{
			Schema::dropIfExists('pages');
		});
	}

}

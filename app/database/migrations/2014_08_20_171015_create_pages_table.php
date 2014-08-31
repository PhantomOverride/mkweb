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
                            'title' => 'Mammas Källare på Internet',
                            'content' =>
'
<p>Mammas K&auml;llare grundades av en grupp rollspelare och d&aring;varande f&ouml;rsta&aring;rs-studenter p&aring; BTH &aring;r 2009. Samtliga grundare ans&aring;g att studentlivet i Blekinge hade potential, och att det vore kul om n&aring;gra drivande individer tog tag i saken och organiserade en studentf&ouml;rening dedikerad till spel och verklighetsflykt! Mammas K&auml;llare har sedan dess jobbat med rollspel, filmkv&auml;llar, airsoft-event och LAN &ndash; d&auml;ribland WonderLAN, som arrangeras en g&aring;ng per termin. Vi existerar f&ouml;r att berika studentlivet i Blekinge och f&ouml;ra m&auml;nniskor samman genom galna uppt&aring;g och roliga event.</p>
<p>Mammas K&auml;llare finns b&aring;de som kvasi och Sverokf&ouml;rening. De b&aring;da delarna &auml;r ekonomiskt skilda fr&aring;n varandra och Sverokf&ouml;reningen &auml;r &ouml;ppen f&ouml;r alla som vill bli medlemmar. Merparten av de aktiviteter vi anordnar faller under Sverok, d&auml;ribland WonderLAN och v&aring;ra popul&auml;ra airsoftspel.</p>
<p>Om du k&auml;nner dig manad att hj&auml;lpa oss n&aring; v&aring;ra m&aring;l &auml;r det bara att g&aring; fram till n&aring;gon av v&aring;ra representanter, vanligtvis ikl&auml;dda MK-kavaj, eller kontakta oss via <a href="mailto:kontakt@mammaskallare.se">mail</a> eller p&aring; v&aring;r <a href="https://www.facebook.com/MammasKallare">facebooksida</a>.</p>
<p>V&auml;lkommen till verkligheten!</p>
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
Här finns info om hur man skickar mejl
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
                            'content' => 'Om oss.',
                            'parentname' => 'mammaskallare',
                            'order' => 11,
                        )
                );
                
                DB::table('pages')->insert(
                        array(
                            'urlname' => 'styrelse',
                            'name' => 'Styrelse',
                            'title' => 'Styrelsen för Mammas Källare',
                            'content' => 'styrelse.',
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
                            'title' => 'WonderLAN',
                            'content' => 'Spel och härligt umgänge!',
                            'parentname' => null,
                            'order' => 20,
                        )
                );
                
                DB::table('pages')->insert(
                        array(
                            'urlname' => 'om-wonderlan',
                            'name' => 'Om WonderLAN',
                            'title' => 'Om WonderLAN',
                            'content' =>
'
<p>WonderLAN &auml;r ett LAN-party och spelfest med Alice i Underlandet tema som anordnas terminsvis av Mammas K&auml;llare. Vi har varit ig&aring;ng sedan h&ouml;sten 2010 n&auml;r vi f&ouml;r f&ouml;rsta g&aring;ngen anordnade LANet p&aring; K&aring;rhuset Rotundan i Karlskrona. D&auml;refter har evenemanget bara v&auml;xt och vi har flyttat till st&ouml;rre lokaler f&ouml;r att rymma alla deltagare. Nu har vi i snitt &ouml;ver 100 betalande bes&ouml;kare per lan, med ett rekord h&ouml;sten 2012 p&aring; 150 betalande bes&ouml;kare.</p>
<p>P&aring; WonderLAN finns allt f&ouml;r spelfantasten med en blandning av b&aring;de digitalt och analogt. Vi h&aring;ller turneringar och t&auml;vlingar i popul&auml;ra PC-spel och har en mysig konsolh&ouml;rna d&auml;r man kan prova p&aring; diverse tv-spel. Ut&ouml;ver detta florerar s&aring;v&auml;l kort- som roll- och br&auml;dspel under evenemanget. Den som vill ta en paus fr&aring;n spelandet kan &auml;ven koppla av i filmsalen d&auml;r vi visar en sk&ouml;n blandning av s&aring;v&auml;l nyare filmer som gamla favoriter.</p>
<p>Den nyfikne bes&ouml;karen kommer in gratis p&aring; evenemanget och f&ouml;r den som vill ha med egen h&aring;rdvara kan en datorplats bokas via v&aring;r hemsida mot en sk&auml;lig summa riksdaler.</p>
<p>F&ouml;r att h&aring;lla dig uppdaterad, gl&ouml;m inte bort att gilla <a href="https://www.facebook.com/MK.WonderLAN">WonderLAN p&aring; facebook</a>.</p>
',
                            'parentname' => 'wonderlan',
                            'order' => 21,
                        )
                );
                
                DB::table('pages')->insert(
                        array(
                            'urlname' => 'bra-att-veta',
                            'name' => 'Bra att veta',
                            'title' => 'Bra att veta inför WonderLAN',
                            'content' => 'Text om WonderLAN',
                            'parentname' => 'wonderlan',
                            'order' => 22,
                        )
                );
                
                DB::table('pages')->insert(
                        array(
                            'urlname' => 'regler',
                            'name' => 'Regler',
                            'title' => 'Regler på WonderLAN',
                            'content' =>
'
<p>Reglerna under WonderLAN &auml;r f&ouml;ljande:</p>
<ul>
<li>WonderLAN &auml;r ingen frizon f&ouml;r lagl&ouml;shet. Detta inneb&auml;r att alla former av illegal fildelning &auml;r strikt f&ouml;rbjuden. Fildelning ut mot Internet kommer dessutom medf&ouml;ra risken att v&aring;r Internetf&ouml;rbindelse bryts, vilket st&auml;ller till problem f&ouml;r samtliga av LAN:ets deltagare. Om du som deltagare bryter mot lagen p&aring; WonderLAN r&auml;ds vi inte polisanm&auml;lan.</li>
<li>WonderLAN &auml;r drogfritt. Varken alkohol eller andra droger till&aring;ts inne i lokalen. Inte heller till&aring;ts drogp&aring;verkade m&auml;nniskor att vistas i WonderLANs lokaler!</li>
<li>P&aring; grund av att ovve &auml;r starkt f&ouml;rknippat till alkoholrelaterade tillst&auml;llningar s&aring; &auml;r det ett ol&auml;mpligt kl&auml;desplagg att ha p&aring; sig och vi f&ouml;rebeh&aring;ller oss r&auml;tten att avvisa alla personer som har ovve p&aring; sig fr&aring;n eventet.</li>
<li>Under WonderLAN &auml;r det otill&aring;tet att utan v&aring;r till&aring;telse affischera, g&ouml;ra reklam eller p&aring; annat s&auml;tt skr&auml;pa ned.</li>
<li>Obeh&ouml;riga f&aring;r inte vistas i CREW-omr&aring;dena.</li>
<li>Under WonderLAN ansvarar du sj&auml;lv f&ouml;r dina &auml;godelar.</li>
<li>Utifall du skulle ha s&ouml;nder n&aring;gon utrustning tillh&ouml;rande oss eller v&aring;ra partners kommer vi h&aring;lla dig kostnadsskyldig.</li>
<li>Det &auml;r inte till&aring;tet att sova i skolans lokaler. Detta ska ske hemma eller i sovsalarna avsedda f&ouml;r &auml;ndam&aring;let.</li>
<li>Du f&aring;r ej &ouml;verbelasta eln&auml;tet genom att tex koppla in vattenkokare eller liknande utrustning. Endast dator med kringutrustning f&aring;r kopplas in.</li>
<li>Vi f&ouml;rbeh&aring;ller oss r&auml;tten att st&auml;lla in turneringar och t&auml;vlingar med f&ouml;r f&aring; deltagare.</li>
<li>Det g&aring;r att betala bokningen p&aring; plats, dock tillkommer en administrationsavgift p&aring; 20 SEK.</li>
<li>Respektera andra deltagare och CREW. Vid upprepat respektl&ouml;st beteende f&ouml;rbeh&aring;ller vi oss r&auml;tten att avhysa Dig fr&aring;n eventet.</li>
<li>Vi fr&aring;ns&auml;ger oss ansvar vid h&auml;ndelser utom v&aring;ran kontroll (force majeuer) s&aring;som naturkatastrofer och elavbrott till lokalen.</li>
</ul>
<p>Notera att regler kan tillkomma och &auml;ndras b&aring;de innan och under WonderLAN.</p>
',
                            'parentname' => 'wonderlan',
                            'order' => 23,
                        )
                );
                
                //
                // PAGES FOR Brädspel
                //
                
                DB::table('pages')->insert(
                        array(
                            'urlname' => 'bradspel',
                            'name' => 'Brädspel',
                            'title' => 'Bräd-, kort- och rollspel',
                            'content' => 'Brädspel',
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
                            'title' => 'Pluton MK - Skjut plast och träffa nya vänner',
                            'content' => 'Pluton MK.',
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

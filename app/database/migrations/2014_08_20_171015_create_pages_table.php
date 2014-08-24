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
                        $table->string('urlname');
                        $table->string('name');
                        $table->string('title');
                        $table->string('content');
                        $table->string('parentname')->nullable();
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
                            'content' => 'Detta är det som sidan innehåller. Typ content och sånt. <a href="http://example.com/">Länk.. cool...</a>',
                            'parentname' => null,
                        )
                );
                
                DB::table('pages')->insert(
                        array(
                            'urlname' => 'kontakt',
                            'name' => 'Kontakt',
                            'title' => 'Kom i kontakt med oss!',
                            'content' => 'Här finns info om hur man skickar mejl',
                            'parentname' => 'mammaskallare',
                        )
                );
                
                DB::table('pages')->insert(
                        array(
                            'urlname' => 'om-oss',
                            'name' => 'Om Oss',
                            'title' => 'Så, vad är det vi sysslar med?',
                            'content' => 'Om oss.',
                            'parentname' => 'mammaskallare',
                        )
                );
                
                DB::table('pages')->insert(
                        array(
                            'urlname' => 'styrelse',
                            'name' => 'Styrelse',
                            'title' => 'Styrelsen för Mammas Källare',
                            'content' => 'styrelse.',
                            'parentname' => 'mammaskallare',
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
                            'content' => 'Spel! SPEL! SPEEEEEEEL!',
                            'parentname' => null,
                        )
                );
                
                DB::table('pages')->insert(
                        array(
                            'urlname' => 'om-wonderlan',
                            'name' => 'Om WonderLAN',
                            'title' => 'Om WonderLAN',
                            'content' => 'Text om WonderLAN',
                            'parentname' => 'wonderlan',
                        )
                );
                
                DB::table('pages')->insert(
                        array(
                            'urlname' => 'bra-att-veta',
                            'name' => 'Bra att veta',
                            'title' => 'Bra att veta inför WonderLAN',
                            'content' => 'Text om WonderLAN',
                            'parentname' => 'wonderlan',
                        )
                );
                
                DB::table('pages')->insert(
                        array(
                            'urlname' => 'regler',
                            'name' => 'Regler',
                            'title' => 'Regler på WonderLAN',
                            'content' => 'Text om WonderLAN',
                            'parentname' => 'wonderlan',
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

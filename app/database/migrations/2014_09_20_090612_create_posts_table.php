<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->string('title')->unique(); //Title to be displayed above post
                        $table->longtext('content'); //Post content
                        $table->string('author'); //Post author
                        $table->string('posted'); //When was it posted?
                        $table->string('imageurl')->nullable()->default(null); //Embed url of image (if any)
                        $table->timestamps();
		});
                
                //
                // PAGES FOR MAMMAS KALLARE
                //
                
                DB::table('posts')->insert(
                        array(
                            'title' => 'Mammas Källares Blogg',
                            'content' => '<p>Vi har nu lagt till nyhetshantering på vår webbplats. Kika förbi lite då och då för att se vad som är på gång!</p>',
                            'author' => 'MK',
                            'posted' => '2014-09-18',
                        )
                );
                
                DB::table('posts')->insert(
                        array(
                            'title' => 'Brädspel på ingång!',
                            'content' => '<p>Du vet väl om att Mammas Källare fixar bräd- och rollspelsträffar? Tycker du om att sitta ner i trevligt sällskap med ett gott spel'
                            . 'har du all anledning att vara exhalterad! Nytt för detta verksamhetsåret är regelbundna spelsträffar på Rotundan. Givetvis kör vi rollspel som vanligt!</p>',
                            'author' => 'MK',
                            'posted' => '2014-09-18',
                            'imageurl' => '/img/post/gen2.jpg',
                        )
                );
                
                DB::table('posts')->insert(
                        array(
                            'title' => 'Du är sen till WonderLAN EValveing',
                            'content' => '<p>Tiden är kommen och ryktena är sanna! Vi kan bekräfta att nästa <del>Half-Life</del> WonderLAN är på ingång!'
                            . ' Häng med och visa vad du går för i våra turneringar, ta en paus och spela lite gamla goda spel med CREW och avsluta morgonen med lite nya kort- och brädspel!</p>'
                            . '<p>Så skriv upp 10-13 oktober i kalendern och se till att <a href="http://store.wonderlan.se/">boka</a> och säkra din plats direkt!</p>',
                            'author' => 'MK',
                            'posted' => '2014-09-19',
                            'imageurl' => '/img/post/gen6.jpg',
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
		Schema::table('posts', function(Blueprint $table)
		{
			Schema::dropIfExists('posts');
		});
        }
}

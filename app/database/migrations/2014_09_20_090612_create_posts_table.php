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
                        $table->string('title'); //Title to be displayed above post
                        $table->longtext('content'); //Post content
                        $table->string('author'); //Post author
                        $table->string('posted'); //When was it posted?
                        $table->timestamps();
		});
                
                //
                // PAGES FOR MAMMAS KALLARE
                //
                
                DB::table('posts')->insert(
                        array(
                            'title' => 'Mammas Källare Blogg',
                            'content' => '<p>Vi har nu lagt till nyhetshantering i vårt bloggsystem. Kika förbi lite då och då för att se vad som är på gång!</p>',
                            'author' => 'MK',
                            'posted' => '2014-09-20',
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

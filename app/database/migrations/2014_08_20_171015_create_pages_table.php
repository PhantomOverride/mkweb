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
                        $table->integer('parentid');
                        $table->timestamps();
		});
                
                DB::table('pages')->insert(
                        array(
                            'urlname' => 'mammaskallare',
                            'name' => 'Mammas Källare',
                            'title' => 'Mammas Källare på Internet',
                            'content' => 'Detta är det som sidan innehåller. Typ content och sånt. <a href="http://example.com/">Länk.. cool...</a>',
                            'parentid' => -1,
                        )
                );
                DB::table('pages')->insert(
                        array(
                            'urlname' => 'kontakt',
                            'name' => 'Kontakt',
                            'title' => 'Kom i kontakt med oss!',
                            'content' => 'Här finns info om hur man skickar mejl',
                            'parentid' => 1,
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

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PagesMod1 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('pages')->insert(
                        array(
                            'urlname' => 'turneringar',
                            'name' => 'Turneringar',
                            'title' => 'Har du vad som krävs?',
                            'content' =>
'
<p>
Mer info snart.
</p>
',
                            'parentname' => 'wonderlan',
                            'order' => 12,
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
		//
	}

}

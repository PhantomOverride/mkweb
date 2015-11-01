<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMkeventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('mkevents')->insert(
                array(
                            'name' => 'WonderLAN Llamageddon',
                            'year' => 2015,
                            'imageurl' => '/img/mkevent/wl-llamageddon.jpg',
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

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->string('name')->unique(); //Event name
                        $table->integer('year');
                        $table->string('imageurl')->nullable()->default(null); //Embed url (if any)
                        $table->timestamps();
		});
                
                DB::table('events')->insert(
                        array(
                            'name' => 'WonderLAN EValved',
                            'year' => 2014
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
		Schema::table('events', function(Blueprint $table){
                        Schema::dropIfExists('events');
                });
	}

}

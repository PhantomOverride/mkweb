<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMkeventTournamentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mkevent_tournament', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('mkevent_id')->unsigned()->index();
			$table->foreign('mkevent_id')->references('id')->on('mkevents')->onDelete('cascade');
			$table->integer('tournament_id')->unsigned()->index();
			$table->foreign('tournament_id')->references('id')->on('tournaments')->onDelete('cascade');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mkevent_tournament');
	}

}

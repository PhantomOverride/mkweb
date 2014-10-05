<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournamentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tournaments', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->string('name')->unique(); //Name of the game
                        $table->string('shortname')->unique(); //Shortname
                        $table->string('imageurl'); //Shortname
                        //Perhaps more to be added here later, as the site grows.
                        $table->timestamps();
		});
                
                //
                // Initial Tournaments of WLA2014
                //
                
                DB::table('tournaments')->insert(
                        array(
                            'name' => 'League of Legends',
                            'shortname' => 'LoL',
                            'imageurl' => '/img/logo.png',
                        )
                );
                DB::table('tournaments')->insert(
                        array(
                            'name' => 'DotA 2',
                            'shortname' => 'DotA2',
                            'imageurl' => '/img/logo.png',
                        )
                );
                DB::table('tournaments')->insert(
                        array(
                            'name' => 'Hearthstone',
                            'shortname' => 'Hearthstone',
                            'imageurl' => '/img/logo.png',
                        )
                );
                DB::table('tournaments')->insert(
                        array(
                            'name' => 'Counter-Strike: Global Offensive',
                            'shortname' => 'CS:GO',
                            'imageurl' => '/img/logo.png',
                        )
                );
                DB::table('tournaments')->insert(
                        array(
                            'name' => 'Starcraft 2',
                            'shortname' => 'SC2',
                            'imageurl' => '/img/logo.png',
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
		Schema::table('tournaments', function(Blueprint $table)
		{
			Schema::dropIfExists('tournaments');
		});
        }
}

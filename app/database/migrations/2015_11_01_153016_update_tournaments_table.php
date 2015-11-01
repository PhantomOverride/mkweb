<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTournamentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('tournaments')->insert(
                        array(
                            'name' => 'WLA15 League of Legends',
                            'shortname' => 'LoL',
                            'imageurl' => '/img/tournament/lol.png',
                        )
                );
                DB::table('tournaments')->insert(
                        array(
                            'name' => 'WLA15 DotA2',
                            'shortname' => 'DotA2',
                            'imageurl' => '/img/tournament/dota2.png',
                        )
                );
                DB::table('tournaments')->insert(
                        array(
                            'name' => 'WLA15 Heroes of the Storm',
                            'shortname' => 'HotS',
                            'imageurl' => '/img/tournament/hots.jpg',
                        )
                );
                DB::table('tournaments')->insert(
                        array(
                            'name' => 'WLA15 Hearthstone',
                            'shortname' => 'HS',
                            'imageurl' => '/img/tournament/hs.png',
                        )
                );
                DB::table('tournaments')->insert(
                        array(
                            'name' => 'WLA15 Counter-Strike: Global Offensive',
                            'shortname' => 'CS:GO',
                            'imageurl' => '/img/tournament/csgo.png',
                        )
                );
                DB::table('tournaments')->insert(
                        array(
                            'name' => 'WLA15 StarCraft II',
                            'shortname' => 'SC2',
                            'imageurl' => '/img/tournament/sc2.png',
                        )
                );
                
                //Set relation to events right here and now. This should be done via the interface in the future.
                $e = Mkevent::whereName('WonderLAN Llamageddon')->first();
                
                $t = Tournament::whereName('WLA15 League of Legends')->first();
                $e->tournaments()->save($t);
                
                $t = Tournament::whereName('WLA15 DotA2')->first();
                $e->tournaments()->save($t);
                
                $t = Tournament::whereName('WLA15 Heroes of the Storm')->first();
                $e->tournaments()->save($t);
                
                $t = Tournament::whereName('WLA15 Hearthstone')->first();
                $e->tournaments()->save($t);
                
                $t = Tournament::whereName('WLA15 Counter-Strike: Global Offensive')->first();
                $e->tournaments()->save($t);
                
                $t = Tournament::whereName('WLA15 StarCraft II')->first();
                $e->tournaments()->save($t);
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

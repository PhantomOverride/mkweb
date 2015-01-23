<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TournamentUpdate2 extends Migration {

	// This migration will update the previous and now invalid tournaments to the new standard.
	public function up()
	{
		DB::table('tournaments')
                    ->where('id', 1)
                    ->update(array(
                        'id' => 1,
                        'name' => 'WLA14 League of Legends',
                        'shortname' => 'LoL',
                        'imageurl' => '/img/tournament/lol.png',
                        ));
                DB::table('tournaments')
                    ->where('id', 2)
                    ->update(array(
                        'id' => 2,
                        'name' => 'WLA14 DotA2',
                        'shortname' => 'DotA2',
                        'imageurl' => '/img/tournament/dota2.png',
                        ));
                DB::table('tournaments')
                    ->where('id', 3)
                    ->update(array(
                        'id' => 3,
                        'name' => 'WLA14 Hearthstone',
                        'shortname' => 'HS',
                        'imageurl' => '/img/tournament/hs.png',
                        ));
                DB::table('tournaments')
                    ->where('id', 4)
                    ->update(array(
                        'id' => 4,
                        'name' => 'WLA14 Counter-Strike: Global Offensive',
                        'shortname' => 'CS:GO',
                        'imageurl' => '/img/tournament/csgo.png',
                        ));
                DB::table('tournaments')
                    ->where('id', 5)
                    ->update(array(
                        'id' => 5,
                        'name' => 'WLA14 StarCraft 2',
                        'shortname' => 'SC2',
                        'imageurl' => '/img/tournament/sc2.png',
                        ));
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

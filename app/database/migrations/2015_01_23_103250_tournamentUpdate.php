<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TournamentUpdate extends Migration {

	// This migration will remove unique index on shortname and insert tournaments for WLS15
	public function up()
	{
            
            Schema::table('tournaments', function($table) {
                //Apparently we cant drop unique on shortname, but we can drop it on this value which I've never set manually. Fuck sake...
                $table->dropUnique('tournaments_shortname_unique');
            });
            
		DB::table('tournaments')->insert(
                        array(
                            'name' => 'WLS15 League of Legends',
                            'shortname' => 'LoL',
                            'imageurl' => '/img/tournament/lol.png',
                        )
                );
                DB::table('tournaments')->insert(
                        array(
                            'name' => 'WLS15 DotA2',
                            'shortname' => 'DotA2',
                            'imageurl' => '/img/tournament/dota2.png',
                        )
                );
                DB::table('tournaments')->insert(
                        array(
                            'name' => 'WLS15 Hearthstone',
                            'shortname' => 'HS',
                            'imageurl' => '/img/tournament/hs.png',
                        )
                );
                DB::table('tournaments')->insert(
                        array(
                            'name' => 'WLS15 Counter-Strike: Global Offensive',
                            'shortname' => 'CS:GO',
                            'imageurl' => '/img/tournament/csgo.png',
                        )
                );
                DB::table('tournaments')->insert(
                        array(
                            'name' => 'WLS15 StarCraft II',
                            'shortname' => 'SC2',
                            'imageurl' => '/img/tournament/sc2.png',
                        )
                );
                
                //Set relation to events right here and now. This should be done via the interface in the future.
                $e = Mkevent::whereName('WonderLAN Catastrophe')->first();
                
                $t = Tournament::whereName('WLS15 League of Legends')->first();
                $e->tournaments()->save($t);
                
                $t = Tournament::whereName('WLS15 DotA2')->first();
                $e->tournaments()->save($t);
                
                $t = Tournament::whereName('WLS15 Hearthstone')->first();
                $e->tournaments()->save($t);
                
                $t = Tournament::whereName('WLS15 Counter-Strike: Global Offensive')->first();
                $e->tournaments()->save($t);
                
                $t = Tournament::whereName('WLS15 StarCraft II')->first();
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

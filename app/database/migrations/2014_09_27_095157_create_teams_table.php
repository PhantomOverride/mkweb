<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teams', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->string('name')->unique(); //Teamname
                        $table->string('motto'); //Motto or catchphrase
                        $table->string('leader'); //Cretor or administrator and contact
                        $table->longtext('members'); //JSON-formatted array of members
                        $table->longtext('tournaments')->nullable()->default(null); //JSON-formatted array of the tournaments to play
                        $table->string('imageurl')->nullable()->default(null); //Embed url of team image (if any)
                        $table->timestamps();
		});
                
                //
                // SAMPLE TEAM
                //
                
                DB::table('teams')->insert(
                        array(
                            'name' => 'Mammas Källare',
                            'motto' => 'Från Källaren Mot Skyarna!',
                            'leader' => 'MK',
                            'members' => '["MK"]',
                            'tournaments' => null,
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
		Schema::table('teams', function(Blueprint $table)
		{
			Schema::dropIfExists('teams');
		});
        }
}

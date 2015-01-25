<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMkeventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mkevents', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->string('name')->unique(); //Event name
                        $table->integer('year');
                        $table->string('imageurl')->nullable()->default(null); //Embed url (if any)
                        $table->timestamps();
		});
                

                DB::table('mkevents')->insert(
                array(
                            'name' => 'WonderLAN Spring 2012',
                            'year' => 2012,
                            'imageurl' => '/img/mkevent/wl-spring2012.jpg',
                        )
                        );
                        
                DB::table('mkevents')->insert(
                array(
                            'name' => 'WonderLAN Autumnation 2012',
                            'year' => 2012,
                            'imageurl' => '/img/mkevent/wl-autumnation2012.jpg',
                        )
                        );
                        
                DB::table('mkevents')->insert(
                array(
                            'name' => 'WonderLAN Spring 2013',
                            'year' => 2013,
                            'imageurl' => '/img/mkevent/wl-spring2013.jpg',
                        )
                        );
                        
                DB::table('mkevents')->insert(
                array(
                            'name' => 'WonderLAN Alpacalypse',
                            'year' => 2013,
                            'imageurl' => '/img/mkevent/wl-alpacalypse.jpg',
                        )
                        );
                        
                        
                DB::table('mkevents')->insert(
                array(
                            'name' => 'WonderLAN Eastermination',
                            'year' => 2014,
                            'imageurl' => '/img/mkevent/wl-eastermination.jpg',
                        )
                        );
                        
                        DB::table('mkevents')->insert(
                        array(
                            'name' => 'WonderLAN EValveing',
                            'year' => 2014,
                            'imageurl' => '/img/mkevent/wl-evalveing.jpg',
                        )
                        );
                        
                        DB::table('mkevents')->insert(
                        array(
                            'name' => 'WonderLAN Catastrophe',
                            'year' => 2015,
                            'imageurl' => '/img/mkevent/wl-catastrophe.jpg',
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
		Schema::table('mkevents', function(Blueprint $table){
                        Schema::dropIfExists('mkevents');
                });
	}

}

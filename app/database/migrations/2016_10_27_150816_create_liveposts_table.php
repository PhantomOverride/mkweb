<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivepostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('liveposts', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->string('header'); // Header of post
                        $table->longtext('text'); //Post content
                        $table->integer('order'); //Order to sort by (smallest first) (0=hidden)
                        $table->timestamps();
		});
                
                //
                // SAMPLE LIVEPOSTS FOR MAMMAS KALLARE
                //
                
                DB::table('liveposts')->insert(
                        array(
                            'header' => 'Livepage!',
                            'text' => '<h2>Livepost!</h2><p>Livetext!</p>',
                            'order' => 5
                        )
                );
                DB::table('liveposts')->insert(
                        array(
                            'header' => 'Livepage2!',
                            'text' => '<h2>Livepost2!</h2><p>Livetext2!</p>',
                            'order' => 4
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
		Schema::table('liveposts', function(Blueprint $table)
		{
			Schema::dropIfExists('posts');
		});
	}

}

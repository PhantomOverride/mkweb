<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('products', function(Blueprint $table)
		{
		$table->increments('id');
                        $table->string('name'); //Product name
                        $table->integer('price'); //Cost in SEK
                        $table->string('imageurl'); //Url to image resource
                        $table->integer('start'); //Not before
                        $table->integer('stop'); //Not after
                        $table->string('type'); //Kassa or store
                        $table->timestamps();
                });
                DB::table('products')->insert(
                        array(
                            'name' => 'WonderLAN Test',
                            'price' => 180,
                            'imageurl' => 'none',
                            'start' => 1425215448,
                            'stop' => 145915448,
                            'type' => 'store',
                        ));
                        
                        DB::table('products')->insert(
                        array(
                            'name' => 'Kaffe',
                            'price' => 5,
                            'imageurl' => 'none',
                            'start' => 0,
                            'stop' => 0,
                            'type' => 'kassa',
                        ));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('products', function(Blueprint $table)
		{
			Schema::dropIfExists('products');
		});
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->string('email');
                        $table->string('forename');
                        $table->string('lastname');
                        $table->string('ssid')->unique();
                        $table->string('dateofbirth'); //YYYY-MM-DD
                        $table->string('streetaddress');
                        $table->string('postalcode');
                        $table->string('city');
                        $table->string('phone');
                        $table->string('password');
                        $table->string('nickname')->unique();
                        $table->string('avatarurl'); //url to avatar to use, fully formatted and ready to use in an img tag
                        $table->string('membertype'); //none or free or paid
                        $table->string('memberperiod'); //Year, after which the membership expires, i.e. 2015 => 2015-01-01 to 2015-12-31
                        $table->string('accounttype'); // user or admin or crew
                        $table->string('status'); //inactive or active or banned
                        $table->timestamps();
                        
		});
                
                DB::table('users')->insert(
                        array(
                            'email' => '',
                            'forename' => 'Mammas',
                            'lastname' => 'Källare',
                            'ssid' => '0000000000',
                            'dateofbirth' => '2015-08-20',
                            'streetaddress' => 'En gata',
                            'postalcode' => '37141',
                            'city' => 'Karlskrona',
                            'phone' => '0000000000',
                            'password' => Hash::make('mammas'),
                            'nickname' => 'mk',
                            'avatarurl' => '/avatars/sample.jpg',
                            'membertype' => 'none',
                            'memberperiod' => '2015',
                            'accounttype' => 'admin',
                            'status' => 'active',
                        )
                );
                
                DB::table('users')->insert(
                        array(
                            'email' => '',
                            'forename' => 'Kalle',
                            'lastname' => 'Karlsson',
                            'ssid' => '1234567890',
                            'dateofbirth' => '1991-01-01',
                            'streetaddress' => 'Gatan I Blekinge',
                            'postalcode' => '12345',
                            'city' => 'Karlskrona',
                            'phone' => '1234567890987',
                            'password' => Hash::make('kalle'),
                            'nickname' => 'kalleballe',
                            'avatarurl' => '/avatars/sample.jpg',
                            'membertype' => 'none',
                            'memberperiod' => '2015',
                            'accounttype' => 'user',
                            'status' => 'active',
                        )
                );
                
                DB::table('users')->insert(
                        array(
                            'email' => '',
                            'forename' => 'Anna',
                            'lastname' => 'Andersson',
                            'ssid' => '9876543210',
                            'dateofbirth' => '1989-01-01',
                            'streetaddress' => 'Ronnebygatan',
                            'postalcode' => '54321',
                            'city' => 'Karlskrona',
                            'phone' => '0987654322',
                            'password' => Hash::make('anna'),
                            'nickname' => 'annapanna',
                            'avatarurl' => '/avatars/sample.jpg',
                            'membertype' => 'none',
                            'memberperiod' => '2015',
                            'accounttype' => 'user',
                            'status' => 'active',
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
		Schema::table('users', function(Blueprint $table)
		{
			Schema::dropIfExists('users');
		});
	}

}

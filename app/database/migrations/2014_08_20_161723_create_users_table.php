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
                        $table->string('streetaddress');
                        $table->string('postalcode');
                        $table->string('city');
                        $table->string('phone');
                        $table->string('password');
                        $table->string('nickname')->unique();
                        $table->string('avatarurl')->default('/avatars/avatar.png'); //url to avatar to use, fully formatted and ready to use in an img tag
                        $table->string('membertype')->default('none'); //none or free or paid
                        $table->string('memberperiod')->default('0000'); //Year, after which the membership expires, i.e. 2015 => 2015-01-01 to 2015-12-31
                        $table->string('accounttype')->default('user'); // user or admin or crew
                        $table->string('status')->default('active'); //inactive or active or banned
                        $table->timestamps();
                        $table->rememberToken();
                        
		});
                
                DB::table('users')->insert(
                        array(
                            'email' => 'kontakt@mammaskallare.se',
                            'forename' => 'Mammas',
                            'lastname' => 'Källare',
                            'ssid' => '00000000',
                            'streetaddress' => 'En gata',
                            'postalcode' => '37141',
                            'city' => 'Karlskrona',
                            'phone' => '00000000',
                            'password' => Hash::make('mammas'),
                            'nickname' => 'mk',
                            'avatarurl' => '/avatars/avatar.png',
                            'membertype' => 'none',
                            'memberperiod' => '2015',
                            'accounttype' => 'admin',
                            'status' => 'active',
                        )
                );
                
                DB::table('users')->insert(
                        array(
                            'email' => 'kaka@example.com',
                            'forename' => 'Kalle',
                            'lastname' => 'Karlsson',
                            'ssid' => '00000001',
                            'streetaddress' => 'Gatan i Blekinge',
                            'postalcode' => '12345',
                            'city' => 'Karlskrona',
                            'phone' => '1234567890987',
                            'password' => Hash::make('kalle'),
                            'nickname' => 'kalleballe',
                            'avatarurl' => '/avatars/avatar.png',
                            'membertype' => 'none',
                            'memberperiod' => '2015',
                            'accounttype' => 'user',
                            'status' => 'active',
                        )
                );
                
                DB::table('users')->insert(
                        array(
                            'email' => 'anna@example.com',
                            'forename' => 'Anna',
                            'lastname' => 'Andersson',
                            'ssid' => '00000003',
                            'streetaddress' => 'Ronnebygatan',
                            'postalcode' => '54321',
                            'city' => 'Karlskrona',
                            'phone' => '0987654322',
                            'password' => Hash::make('anna'),
                            'nickname' => 'annapanna',
                            'avatarurl' => '/avatars/avatar.png',
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

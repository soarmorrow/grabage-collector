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
			$table->string('name');
            $table->string('email')->unique();
            $table->string('first_name',35);
            $table->string('last_name',35);
            $table->string('map',200);
            $table->text('address');
            $table->string('city',35);
            $table->string('state',35);
            $table->integer('postcode')->default(0);
            $table->string('phone',12)->unique();
			$table->string('password', 60);
            $table->string('avatar',200)->nullable();
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}

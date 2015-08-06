<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('order_number',35);
            $table->string('first_name',35);
            $table->string('last_name',35);
            $table->string('map',200);
            $table->text('address');
            $table->string('city',35);
            $table->string('state',35);
            $table->integer('postcode')->default(0);
            $table->string('phone',20);
            $table->float('quantity');
            $table->float('amount',10);
            $table->string('transaction_id',60);
            $table->string('payment_type',60);
            $table->tinyInteger('status')->default(1);
			$table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orders');
	}

}

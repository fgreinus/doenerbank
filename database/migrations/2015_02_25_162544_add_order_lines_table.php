<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrderLinesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_lines', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('order_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('article_id');
            $table->integer('amount');
			$table->text('notes');
			$table->timestamps();
		});

        Schema::table('order_lines', function(Blueprint $table)
        {
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('article_id')->references('id')->on('articles');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_lines');
	}

}

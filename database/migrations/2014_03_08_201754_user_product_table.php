<?php

use Illuminate\Database\Migrations\Migration;

class UserProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$this->down();
		Schema::create('user_product', function($table)
		{
			$table->increments('id')->index();
			$table->unsignedInteger('user_id');
			$table->foreign('user_id')->references('id')->on('users');
			$table->unsignedInteger('product_id');
			// $table->foreign('product_id')->references('id')->on('bicycles');
			// $table->foreign('product_id')->references('id')->on('motorcicles');  // no hay como crear dos foreign keys
			$table->smallInteger('type'); // moto/bici
			$table->timestamp('created_at');
			$table->timestamp('updated_at');
		});	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('user_product');
	}

}
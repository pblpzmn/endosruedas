<?php

use Illuminate\Database\Migrations\Migration;

class ImagesCreate extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$this->down();
		// creates table
		Schema::create('images', function($table)
		{
			$table->increments('id');
			$table->unsignedInteger('product_id');
			$table->smallInteger('type'); // moto/bici
			$table->string('path');
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
		Schema::dropIfExists('images');
	}

}
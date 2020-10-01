<?php

use Illuminate\Database\Migrations\Migration;

class Motorcycles extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$this->down();
		Schema::create('motorcycles', function($table)
		{
			$table->increments('id');
			$table->boolean('is_new');
			$table->smallInteger('type');
			$table->string('brand');
			$table->string('model');
			$table->smallInteger('year');
			$table->string('city',20);
			$table->decimal('amount', 8, 2);// precio
			$table->integer('kilometer');
			$table->smallInteger('cylinder_capacity');
			$table->string('color',10);
			$table->string('gas',10);
			$table->string('speed',10);// 4 speed, 5 speed
			$table->string('description');
			$table->integer('status');
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
		Schema::dropIfExists('motorcycles');
	}

}
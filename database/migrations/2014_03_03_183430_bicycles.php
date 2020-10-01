<?php

use Illuminate\Database\Migrations\Migration;

class Bicycles extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$this->down();
		// creates table
		Schema::create('bicycles', function($table)
		{
			$table->increments('id');
			$table->boolean('is_new');
			$table->smallInteger('type');
			$table->string('brand');
			$table->string('model');
			$table->smallInteger('year');
			$table->string('city',20);
			$table->string('brake');
			$table->smallInteger('speed');
			$table->string('size');
			$table->decimal('amount', 8, 2);// precio
			$table->string('description');
			$table->integer('status');
			$table->timestamp('created_at');
			$table->timestamp('updated_at');
				
		
			//numero_velocidades, marca_freno, aros, sexo , tamaño, cuadro
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('bicycles');
	}

}
<?php

use Illuminate\Database\Migrations\Migration;

class CatalogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$this->down();
		// creates table
		Schema::create('catalog_type', function($table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('description');
			$table->timestamp('created_at');
			$table->timestamp('updated_at');
		});
		
		// creates table
		Schema::create('catalog', function($table)
		{
			$table->increments('id');
			$table->integer('catalog_type_id')->index();
			$table->integer('parent_id')->nullable();
			$table->string('name');
			$table->string('description');
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
		Schema::dropIfExists('catalog');
		Schema::dropIfExists('catalog_type');
	}

}
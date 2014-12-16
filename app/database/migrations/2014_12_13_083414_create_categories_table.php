<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('parent_id')->unsigned()->default(0);
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('thumbnail');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->text('meta_keywords');
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
		Schema::drop('categories');
	}

}

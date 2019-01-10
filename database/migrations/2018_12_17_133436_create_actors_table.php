<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActorsTable extends Migration {

	public function up()
	{
		Schema::create('actors', function(Blueprint $table) {
			$table->increments('id');
			$table->string('first_name', 255);
			$table->string('last_name', 255);
			$table->string('picture_path', 255)->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('actors');
	}
}
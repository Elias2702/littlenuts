<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateListsTable extends Migration {

	public function up()
	{
		Schema::create('lists', function(Blueprint $table) {
			$table->increments('id');
			$table->boolean('is_watched')->default(false);
			$table->boolean('is_favorited')->default(false);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('lists');
	}
}
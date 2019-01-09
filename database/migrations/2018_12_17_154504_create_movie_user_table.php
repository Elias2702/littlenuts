<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMovieUserTable extends Migration {

	public function up()
	{
		Schema::create('movie_user', function(Blueprint $table) {
			$table->integer('movie_id')->unsigned()->index();
			$table->integer('user_id')->unsigned()->index();
			$table->boolean('is_watched')->default(false);
			$table->boolean('is_starred')->default(false);
			$table->primary(['movie_id', 'user_id']);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('movie_user');
	}
}
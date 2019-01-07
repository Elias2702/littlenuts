<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
class CreateMoviesTable extends Migration {
	public function up()
	{
		Schema::create('movies', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title', 255);
			$table->text('synopsis')->nullable();
			$table->string('cover_path', 255)->nullable();
			$table->string('trailer_url', 255)->nullable();
			$table->string('picture_url', 255)->nullable();
			$table->date('release_date')->nullable();
			$table->timestamps();
		});
	}
	public function down()
	{
		Schema::drop('movies');
	}
}
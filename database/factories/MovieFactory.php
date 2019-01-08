<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
 */

$factory->define(App\Movie::class, function (Faker $faker) {
    return [
        'title' => $faker->company,
        'synopsis' => $faker->paragraph(10),
        'release_date' => $faker->date,
        'cover_path' => "http://placehold.jp/" .
            str_replace('#', '', $faker->hexcolor) .
            "/" .
            str_replace('#', '', $faker->hexcolor) .
            "/210x300.png",
        'trailer_url' => 'YE7VzlLtp-4'
    ];
});

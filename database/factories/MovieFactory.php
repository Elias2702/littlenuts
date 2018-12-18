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
        'title' => $faker->sentence(2),
        'synopsis' => $faker->sentence(5),
        'release_date' => $faker->date,
        'cover_path' => 'http://placehold.jp/300x210.png',
        'trailer_url' => '0dtVi8zaBHI'
    ];
});

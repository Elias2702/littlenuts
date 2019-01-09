<?php

use Faker\Generator as Faker;
use App\User;

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

$factory->define(App\User::class, function (Faker $faker) {
    $is_premium = (bool)random_int(0, 1);
    return [
        'firstname' => $faker->name,
        'lastname' => $faker->name,
        'birthday' => $faker->date,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('111111'),
        'remember_token' => str_random(10),
        'avatar_path' => "https://api.adorable.io/avatars/350/$faker->word.png",
        'is_premium' => $is_premium,
        'referrer_id' => $is_premium ? null : random_int(1, 10),
    ];
});

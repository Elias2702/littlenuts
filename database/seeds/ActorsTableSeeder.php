<?php

use Illuminate\Database\Seeder;

class ActorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Actor::class, 100)->create()->each(function ($u) {
            $u->movies()->attach(
                \App\Movie::all()->random()->id
            );
        });

        factory(\App\Movie::class, 100)->create()->each(function ($m) {
            $m->actors()->attach(
                \App\Actor::all()->random()->id
            );
        });
    }
}

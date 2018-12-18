<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 20)->create()->each(function ($u) {
            $u->movies()->attach(
                \App\Movie::all()->random()->id
            );
        });

        factory(\App\Movie::class, 20)->create()->each(function ($m) {
            $m->users()->attach(
                \App\User::all()->random()->id
            );
        });
    }
}

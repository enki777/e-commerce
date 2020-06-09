<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Structures::class, 10)->create()->each(function ($structures) {
            $i = rand(2, 8);
            while (--$i) {
                $structures->teams()->save(factory(App\Teams::class)->make());
            }
        });
        // factory(App\Teams::class, 10)->create();
    }
}

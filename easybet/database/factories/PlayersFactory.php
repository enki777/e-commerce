<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Players;
use Faker\Generator as Faker;

$factory->define(Players::class, function (Faker $faker) {
    return [
        'firstname'=> $faker->name,
        'lastname'=> $faker->name,
        'pseudo'=> $faker->name,
        'age'=> rand(1,30),
        'teams_id'=> rand(1,10)
    ];
});

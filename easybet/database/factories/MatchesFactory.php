<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Matches;
use Faker\Generator as Faker;

$factory->define(Matches::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'games_id'=>rand(1,10),
        'teams_id'=>rand(1,10),
        'teams2_id'=>rand(1,10),
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Teams;
use Faker\Generator as Faker;

$factory->define(Teams::class, function (Faker $faker) {
    $name = $faker->word();
    return [
        'name'=> $name,
    ];
});

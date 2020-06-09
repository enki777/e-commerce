<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Structures;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Structures::class, function (Faker $faker) {
    $name = $faker->word();
    $description = $faker->word();
    return [
        'name' => $name,
        'description' => $description,
    ];
});

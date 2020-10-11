<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PinHistory;
use Faker\Generator as Faker;

$factory->define(PinHistory::class, function (Faker $faker) {
    return [
        'id' => $faker->randomDigit,
        'pin_id' => $faker->randomNumber(),
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
    ];
});

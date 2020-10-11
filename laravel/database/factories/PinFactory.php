<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Pin;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Pin::class, function (Faker $faker) {
    return [
        'id' => $faker->randomDigit,
        'rfidNumber' => $faker->name,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
    ];
});

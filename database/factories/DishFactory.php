<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Dish;
use Faker\Generator as Faker;

$factory->define(Dish::class, function (Faker $faker) {
    $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));

    return [
        'name' => $faker->foodName(),
        'vendor_id' => $faker->numberBetween($min = 1, $max = 50),
        'price' => $faker->numberBetween($min = 1, $max = 50),
    ];
});

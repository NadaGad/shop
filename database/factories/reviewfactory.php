<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\review;
use Faker\Generator as Faker;

$factory->define(review::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 500),
        'product_id' => $faker->numberBetween(1, 1500),
        'stars' => $faker->numberBetween(1, 5),
        'review' => $faker->paragraph,
    ];
});

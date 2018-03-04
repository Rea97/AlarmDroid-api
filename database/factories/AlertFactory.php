<?php

use Faker\Generator as Faker;

$factory->define(\App\Alert::class, function (Faker $faker) {
    return [
        'robot_id' => $faker->numberBetween(1, config('seeds.quantity.robot')),
        'type' => $faker->word,
        'message' => $faker->text(),
    ];
});

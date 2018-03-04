<?php

use Faker\Generator as Faker;

$factory->define(\App\Robot::class, function (Faker $faker) {
    static $i = 1;
    return [
        'user_id' => $i++,
        'model' => $faker->word,
        'zone' => $faker->words(3, true),
    ];
});

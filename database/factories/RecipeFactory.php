<?php

use Faker\Generator as Faker;

$factory->define(App\Recipe::class, function (Faker $faker) {
    return [
        'name' => substr($faker->sentence(2), 0, -1),
        'description' => 'beschreibung',
        'time' => 50
    ];
});

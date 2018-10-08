<?php

use Faker\Generator as Faker;

$factory->define(App\Person::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'user_id' => App\User::all()->random()->id,
    ];
});

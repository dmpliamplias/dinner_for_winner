<?php

use Faker\Generator as Faker;

$factory->define(App\Person::class, function (Faker $faker) {
    return [
        'firstName' => $faker->name,
        'lastName' => $faker->name,
        'birthday' => $faker->date(),
        'user_id' => App\User::all()->random()->id,
    ];
});

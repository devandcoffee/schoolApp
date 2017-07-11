<?php

$factory->define(App\Person::class, function (Faker\Generator $faker) {

    return [
        'identity_id' => $faker->randomNumber(6),
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'avatar' => 'https://gravatar.com/avatar/?s=200&d=retro',
        'email' => $faker->unique()->safeEmail,
        'gender' => $faker->boolean ? 'male' : 'female',
        'birthdate' => $faker->date('Y-m-d', 'now'),
        'location' => $faker->city,
    ];
});

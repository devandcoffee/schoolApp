<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'avatar' => 'https://gravatar.com/avatar/?s=200&d=retro',
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('admin'),
        'remember_token' => str_random(10),
    ];
});

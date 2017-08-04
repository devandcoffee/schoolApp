<?php

$factory->define(App\Person::class, function (Faker\Generator $faker) {
    $genderBool = $faker->boolean;

    return [
        'identity_id' => $faker->randomNumber(6),
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'avatar' => $genderBool ? 'public/defaults/avatars/male.png' : 'public/defaults/avatars/female.png',
        'email' => $faker->unique()->safeEmail,
        'gender' => $genderBool ? 'male' : 'female',
        'birthdate' => $faker->date('d-m-Y', 'now'),
        'location' => $faker->city,
    ];
});

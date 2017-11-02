<?php

$factory->define(App\Person::class, function (Faker\Generator $faker) {
    $genderBool = $faker->boolean;

    return [
        'identity_id' => $faker->randomNumber(6),
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'gender' => $genderBool ? 'male' : 'female',
        'birthdate' => $faker->date('d-m-Y', 'now'),
        'country_id' => 56,
        'city_id' => $faker->numberBetween(1, 25),
        'address' => $faker->address,
        'mobile_phone' => $faker->tollFreePhoneNumber,
        'home_phone' => $faker->tollFreePhoneNumber,
        'avatar' => $genderBool ? 'public/defaults/avatars/male.png' : 'public/defaults/avatars/female.png',
    ];
});

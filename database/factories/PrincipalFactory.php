<?php

$factory->define(App\Principal::class, function (Faker\Generator $faker) {

    return [
        'person_id' => function() {
            return factory(App\Person::class)->create([
                'firstname' => 'Seymour',
                'lastname' => 'Skinner',
                'email' => 'skinner@school.com',
                'gender' => 'male',
            ])->id;
        },
        'user_id' => function() {
            return factory(App\User::class)->create(['email' => 'skinner@school.com'])->id;
        },
    ];
});

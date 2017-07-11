<?php

$factory->define(App\Teacher::class, function (Faker\Generator $faker) {

    return [
        'title' => $faker->word,
        'person_id' => function() {
            return factory(App\Person::class)->create()->id;
        },
        'user_id' => function() {
            return factory(App\User::class)->create()->id;
        },
    ];
});

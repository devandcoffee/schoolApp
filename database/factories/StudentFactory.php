<?php

$factory->define(App\Student::class, function (Faker\Generator $faker) {

    return [
        'person_id' => function() {
            return factory(App\Person::class)->create()->id;
        },
        'tutor1_id' => function() {
            return factory(App\Tutor::class)->create()->id;
        },
        'tutor2_id' => function() {
            return factory(App\Tutor::class)->create()->id;
        },
        'docket_number' => $faker->randomNumber(8, true),
    ];
});

<?php

$factory->define(App\Tutor::class, function (Faker\Generator $faker) {

    return [
        'person_id' => function() {
            return factory(App\Person::class)->create()->id;
        },
        'job' => $faker->jobTitle,
        'job_phone' => $faker->tollFreePhoneNumber,
    ];
});

<?php

namespace App\Helpers;

use App\Country;

class SelectBasedOn
{
    public static function getConfig()
    {
        $countries = Country::all();
        $config = [
            'field1' => [
                'label'   => __('messages.persons.country'),
                'value'   => 'country',
                'options' => $countries
            ],
            'field2' => [
                'label' => __('messages.persons.city'),
                'value' => 'city'
            ],
        ];

        return $config;
    }
}

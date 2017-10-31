<?php

namespace App\Helpers;

use App\Country;

class SelectBasedOn
{
    public static function getConfig()
    {
        $countries = Country::orderBy('name')->get();
        $config = [
            'field1' => [
                'label'   => __('messages.persons.country'),
                'name'    => 'country',
                'options' => $countries,
                'value'   => 56,// Argentina default value
            ],
            'field2' => [
                'label' => __('messages.persons.city'),
                'name'  => 'city',
                'value' => 5,// Salta default value
            ],
        ];

        return $config;
    }
}

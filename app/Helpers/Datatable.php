<?php

namespace App\Helpers;

class Datatable
{
    public static function getDatatableConfig($type='students')
    {
        $config = [
            'columns' => [
                'identity_id' => __('messages.persons.identity_id'),
                'firstname'   => __('messages.persons.firstname'),
                'lastname'    => __('messages.persons.lastname'),
                'email'       => __('messages.persons.email'),
                'gender'      => __('messages.persons.gender'),
                'birthdate'   => __('messages.persons.birthdate'),
                'location'    => __('messages.persons.location'),
            ],
            'edit' => true,
            'delete' => true,
            'actions' => [],
        ];

        switch ($type) {
            case 'students':
            {
                return $config;
            }
            case 'principals':
            {
                $config['edit'] = false;
                $config['delete'] = false;
                return $config;
            }
            default:
            {
                return $config;
                break;
            }
        }
    }

}

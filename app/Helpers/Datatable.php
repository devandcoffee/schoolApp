<?php

namespace App\Helpers;

class Datatable
{
    public static function getDatatableConfig($type='students')
    {
        $config = [
            'columns' => [
                'identity_id'   => __('messages.persons.identity_id'),
                'docket_number' => __('messages.students.docket_number'),
                'firstname'     => __('messages.persons.firstname'),
                'lastname'      => __('messages.persons.lastname'),
                'email'         => __('messages.persons.email'),
                'gender'        => __('messages.persons.gender'),
                'birthdate'     => __('messages.persons.birthdate'),
                'country'       => __('messages.persons.country'),
                'city'          => __('messages.persons.city'),
                'mobile_phone'  => __('messages.persons.mobile_phone'),
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

<?php

namespace App\Helpers;

class Datatable
{
    public static function getDatatableConfig($type='students')
    {
        $config = [];

        switch ($type) {
            case 'students':
            {
                $config = [
                    'columns' => [
                        'identity_id'   => __('messages.persons.identity_id'),
                        'docket_number' => __('messages.students.docket_number'),
                        'firstname'     => __('messages.persons.firstname'),
                        'lastname'      => __('messages.persons.lastname'),
                        'email'         => __('messages.persons.email'),
                        'birthdate'     => __('messages.persons.birthdate'),
                        'mobile_phone'  => __('messages.persons.mobile_phone'),
                    ],
                    'edit' => true,
                    'delete' => true,
                    'view' => true,
                ];
                return $config;
            }
            case 'principals':
            {
                $config = [
                    'columns' => [
                        'identity_id'   => __('messages.persons.identity_id'),
                        'firstname'     => __('messages.persons.firstname'),
                        'lastname'      => __('messages.persons.lastname'),
                        'email'         => __('messages.persons.email'),
                        'birthdate'     => __('messages.persons.birthdate'),
                        'mobile_phone'  => __('messages.persons.mobile_phone'),
                    ],
                    'edit' => false,
                    'delete' => false,
                    'view' => true,
                ];
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

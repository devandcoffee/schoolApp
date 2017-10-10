<?php

return [
    'students' => [
        'title'         => 'Students',
        'single'        => 'Student',
        'list'          => 'Students List',
        'proceedings'   => 'Proceedings',
        'create'        => 'Create a new student',
        'update'        => 'Update student data',
        'docket_number' => 'Docket Number',
        'tutor1'        => 'Tutor 1',
        'tutor2'        => 'Tutor 2',
    ],
    'principals' => [
        'title'       => 'Principals',
        'list'        => 'Principals list',
        'create'      => 'Create a new user',
        'update'      => 'Update principal data',
    ],
    'users' => [
        'title' => 'Users',
        'list'  => 'Users List',
    ],
    'persons' => [
        'identity_id'   => 'DNI',
        'firstname'     => 'Nombre',
        'lastname'      => 'Apellido',
        'email'         => 'Email',
        'gender'        => 'Sexo',
        'genders'       => [
            'male'   => 'Male',
            'female' => 'Female',
        ],
        'birthdate'     => 'Birthdate',
        'address'       => 'Address',
        'country'       => 'Country',
        'city'          => 'City',
        'avatar'        => 'Avatar',
        'mobile_phone'  => 'Mobile Phone',
        'home_phone'    => 'Home Phone',
        'upload_avatar' => 'Upload avatar',
        'validations'   => [
            'identity_id' => [
                'required' => 'The identity_id field is required',
                'numeric'  => 'The identity_id field must be a number',
            ],
            'firstname' => [
                'required' => 'The firstname field is required',
            ],
            'lastname' => [
                'required' => 'The lastname field is required',
            ],
            'avatar' => [
                'image' => 'The avatar must be an image',
            ],
            'birthdate' => [
                'required'    => 'The birthdate field is required',
                'date_format' => 'The birthdate does not match the format :format',
            ],
            'address' => [
                'required' => 'The address field is required',
            ],
            'mobile_phone' => [
                'numeric' => 'The mobile_phone field must be a number',
            ],
            'home_phone' => [
                'numeric' => 'The home_phone field must be a number',
            ],
            'email' => [
                'required' => 'The email field is required',
                'email'    => 'The email field must be a valid email address',
                'unique'   => 'The email has already been taken',
            ],
        ],
    ],
    'tutors' => [
        'job'         => 'Job',
        'job_phone'   => 'Job Phone',
        'create'      => 'Add tutor :num data',
        'validations' => [
            'identity_id' => [
                'required' => 'The identity_id field for tutor :num is required',
                'numeric'  => 'The identity_id field for tutor :num must be a number',
            ],
            'firstname' => [
                'required' => 'The firstname field for tutor :num is required',
            ],
            'lastname' => [
                'required' => 'The lastname field for tutor :num is required',
            ],
            'avatar' => [
                'image' => 'The avatar for tutor :num must be an image',
            ],
            'birthdate' => [
                'required'    => 'The birthdate field for tutor :num is required',
                'date_format' => 'The birthdate for tutor :num does not match the format :format',
            ],
            'address' => [
                'required' => 'The address field for tutor :num is required',
            ],
            'mobile_phone' => [
                'numeric' => 'The mobile_phone field for tutor :num must be a number',
            ],
            'home_phone' => [
                'numeric' => 'The home_phone field for tutor :num must be a number',
            ],
            'email' => [
                'required' => 'The email field for tutor :num is required',
                'email'    => 'The email field for tutor :num must be a valid email address',
                'unique'   => 'The tutor :num email has already been taken',
            ],
        ],
    ],
    'buttons' => [
        'accept' => 'Accept',
        'cancel' => 'Cancel',
        'create' => 'Create',
        'Update' => 'Update',
    ],
    'navbar' => [
        'profile' => 'User Profile',
        'logout'  => 'Logout',
    ],
];

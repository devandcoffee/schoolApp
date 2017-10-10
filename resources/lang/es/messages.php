<?php

return [
    'students' => [
        'title'         => 'Alumnos',
        'single'        => 'Alumno',
        'list'          => 'Lista de Alumnos',
        'proceedings'   => 'Actas',
        'create'        => 'Agregar nuevo alumno',
        'update'        => 'Actualizar datos del Alumno',
        'docket_number' => 'Número Legajo',
        'tutor1'        => 'Tutor 1',
        'tutor2'        => 'Tutor 2',
    ],
    'principals' => [
        'title'       => 'Directores',
        'list'        => 'Lista de directores',
        'create'      => 'Agregar nuevo usuario',
        'update'      => 'Actualizar mis datos',
    ],
    'users' => [
        'title' => 'Usuarios',
        'list'  => 'Lista de Usuarios',
    ],
    'persons' => [
        'identity_id'   => 'DNI',
        'firstname'     => 'Nombre',
        'lastname'      => 'Apellido',
        'email'         => 'Email',
        'gender'        => 'Sexo',
        'genders'       => [
            'male'   => 'Masculino',
            'female' => 'Femenino',
        ],
        'birthdate'     => 'Fecha de Nacimiento',
        'address'       => 'Dirección',
        'country'       => 'País',
        'city'          => 'Provincia',
        'mobile_phone'  => 'Tel Celular',
        'home_phone'    => 'Tel Casa',
        'avatar'        => 'Foto',
        'upload_avatar' => 'Subir foto',
        'validations'   => [
            'identity_id' => [
                'required' => 'El campo DNI es obligatorio',
                'numeric'  => 'El campo DNI debe ser un número',
            ],
            'firstname' => [
                'required' => 'El campo Nombre es obligatorio',
            ],
            'lastname' => [
                'required' => 'El campo Apellido es obligatorio',
            ],
            'avatar' => [
                'image' => 'La foto debe ser una imagen',
            ],
            'birthdate' => [
                'required'    => 'El campo Fecha de Nacimiento es obligatorio',
                'date_format' => 'El campo Fecha de Nacimiento no concuerda con el formato de fecha :format',
            ],
            'address' => [
                'required' => 'El campo dirección es obligatorio',
            ],
            'mobile_phone' => [
                'numeric' => 'El campo Tel Celular debe ser un número',
            ],
            'home_phone' => [
                'numeric' => 'El campo Tel Casa debe ser un número',
            ],
            'email' => [
                'required' => 'El campo Email es obligatorio',
                'email'    => 'El campo Email debe ser una dirección de correo valido',
                'unique'   => 'El email ingresado ya existe',
            ],
        ],
    ],
    'tutors' => [
        'job'         => 'Profesión',
        'job_phone'   => 'Tel Trabajo',
        'create'      => 'Agregar datos del tutor :num',
        'validations' => [
            'identity_id' => [
                'required' => 'El campo DNI para el tutor :num es obligatorio',
                'numeric'  => 'El campo DNI para el tutor :num debe ser un número',
            ],
            'firstname' => [
                'required' => 'El campo Nombre para el tutor :num es obligatorio',
            ],
            'lastname' => [
                'required' => 'El campo Apellido para el tutor :num es obligatorio',
            ],
            'avatar' => [
                'image' => 'La foto para el tutor :num debe ser una imagen',
            ],
            'birthdate' => [
                'required'    => 'El campo Fecha de Nacimiento para el tutor :num es obligatorio',
                'date_format' => 'El campo Fecha de Nacimiento para el tutor :num no concuerda con el formato de fecha :format',
            ],
            'address' => [
                'required' => 'El campo Dirección para el tutor :num es obligatorio',
            ],
            'mobile_phone' => [
                'numeric' => 'El campo Tel Celular para el tutor :num debe ser un número',
            ],
            'home_phone' => [
                'numeric' => 'El campo Tel Casa para el tutor :num debe ser un número',
            ],
            'email' => [
                'required' => 'El campo Email para el tutor :num es obligatorio',
                'email'    => 'El campo Email para el tutor :num debe ser una dirección de correo valido',
                'unique'   => 'El email para el tutor :num ingresado ya existe',
            ],
        ],
    ],
    'buttons' => [
        'accept' => 'Aceptar',
        'cancel' => 'Cancelar',
        'create' => 'Crear',
        'update' => 'Actualizar',
    ],
    'navbar' => [
        'profile' => 'Mi perfil',
        'logout'  => 'Cerrar sesión',
    ],
];

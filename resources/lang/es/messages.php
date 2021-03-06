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
        'title'  => 'Directores',
        'single' => 'Director',
        'list'   => 'Lista de directores',
        'create' => 'Agregar nuevo usuario',
        'update' => 'Actualizar mis datos',
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
    ],
    'tutors' => [
        'title'       => 'Tutores',
        'job'         => 'Profesión',
        'job_phone'   => 'Tel Trabajo',
        'create'      => 'Agregar datos del tutor :num',
        'update'      => 'Actualizar datos del tutor',
    ],
    'docs' => [
        'title'      => 'Actas',
        'list'       => 'Lista de Actas',
        'create'     => 'Agregar nueva acta',
        'single'     => 'Acta del :date creada por :from para el estudiante :to',
        'created_at' => 'Fecha del Acta',
    ],
    'buttons' => [
        'accept'     => 'Aceptar',
        'cancel'     => 'Cancelar',
        'create'     => 'Crear',
        'update'     => 'Actualizar',
        'add_tutors' => 'Agregar tutores',
        'edit_tutor' => 'Editar tutor :num',
    ],
    'navbar' => [
        'profile' => 'Mi perfil',
        'logout'  => 'Cerrar sesión',
    ],
    'flash' => [
        'student_created'   => 'Nuevo alumno agregado!',
        'student_updated'   => 'Datos de alumno actualizados!',
        'tutor_created'     => 'Tutor :num agregado!',
        'tutor_updated'     => 'Datos del tutor actualizados!',
        'principal_created' => 'Nuevo director agregado!',
        'principal_updated' => 'Tus datos se han actualizado!',
        'teacher_created'   => 'Nuevo profesor agregado!',
        'teacher_updated'   => 'Tus datos se han actualizado!',
        'doc_created'       => 'Nueva acta creada!',
        'doc_updated'       => 'Acta actualizada!',
    ],
];

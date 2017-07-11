<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{

    protected $table = 'persons';

    protected $fillable = [
        'indentity_id',
        'firstname',
        'lastname',
        'avatar',
        'email',
        'gender',
        'birthdate',
        'location',
    ];


}

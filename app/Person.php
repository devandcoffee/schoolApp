<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{

    protected $table = 'persons';

    protected $fillable = [
        'identity_id',
        'firstname',
        'lastname',
        'avatar',
        'email',
        'gender',
        'birthdate',
        'location',
    ];

    public function scopeFilter($query, $filter)
    {
        if ($filter) {
            $value = "%{$filter}%";
            $query->where('firstname', 'ilike', $value)
                ->orWhere('lastname', 'ilike', $value)
                ->orWhere('identity_id', 'like', $value);
        }

        return $query;
    }

}

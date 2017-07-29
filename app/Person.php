<?php

namespace App;

use Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{

    use SoftDeletes;

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

    protected $dates = ['deleted_at'];

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

    public function getAvatarAttribute($avatar)
    {
        return asset(Storage::url($avatar));
    }

}

<?php

namespace App;

use Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Person extends Model
{

    use SoftDeletes;

    protected $table = 'persons';

    public $with = ['country', 'city'];

    protected $fillable = [
        'identity_id',
        'firstname',
        'lastname',
        'avatar',
        'email',
        'gender',
        'birthdate',
        'country_id',
        'city_id',
        'address',
        'mobile_phone',
        'home_phone',
    ];

    protected $dates = ['birthdate', 'deleted_at'];

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

    public function setBirthdateAttribute($birthdate)
    {
        $this->attributes['birthdate'] = Carbon::createFromFormat('d-m-Y', $birthdate);
    }

    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }
}

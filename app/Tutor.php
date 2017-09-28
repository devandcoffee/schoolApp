<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $fillable = [
        'person_id',
        'job',
        'job_number',
    ];

    public function students()
    {
        return $this->hasMany('App\Student');
    }
}

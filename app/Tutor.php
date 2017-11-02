<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    public $with = ['person'];

    protected $fillable = [
        'person_id',
        'job',
        'job_number',
    ];

    public function person()
    {
        return $this->belongsTo('App\Person');
    }

    public function students()
    {
        return $this->hasMany('App\Student');
    }
}

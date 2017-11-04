<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doc extends Model
{
    protected $fillable = [
        'person_id',
        'student_id',
        'text',
    ];

    public function person()
    {
        return $this->belongsTo('App\Person');
    }

    public function student()
    {
        return $this->belongsTo('App\Student');
    }
}

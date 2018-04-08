<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doc extends Model
{
    protected $with = ['person', 'student'];

    protected $fillable = [
        'person_id',
        'student_id',
        'text',
    ];

    public $timestamps = false;

    public function person()
    {
        return $this->belongsTo('App\Person');
    }

    public function student()
    {
        return $this->belongsTo('App\Student');
    }
}

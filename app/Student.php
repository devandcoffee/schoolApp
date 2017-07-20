<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    public $with = ['person'];

    protected $fillable = [
        'user_id',
        'person_id',
    ];

    /**
     * Get the person record associated with the student.
     */
    public function person()
    {
        return $this->belongsTo('App\Person');
    }

    /**
     * Get the user record associated with the student.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

    protected $fillable = [
        'user_id',
        'person_id',
    ];

    /**
     * Get the person record associated with the teacher.
     */
    public function person()
    {
        return $this->belongsTo('App\Person');
    }

    /**
     * Get the user record associated with the teacher.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{

    use SoftDeletes;

    public $with = ['person'];

    protected $fillable = [
        'person_id',
    ];

    protected $dates = ['deleted_at'];

    /**
     * Get the person record associated with the student.
     */
    public function person()
    {
        return $this->belongsTo('App\Person');
    }

}

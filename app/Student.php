<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{

    use SoftDeletes;

    public $with = ['person', 'tutor1', 'tutor2'];

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

    public function tutor1()
    {
        return $this->belongsTo('App\Tutor', 'tutor1_id');
    }

    public function tutor2()
    {
        return $this->belongsTo('App\Tutor', 'tutor2_id');
    }
}

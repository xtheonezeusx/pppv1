<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adviser extends Model
{
    protected $fillable = [
        'nombre', 'student_id',
    ];

    public function student()
    {
        return $this->belongsTo('App\Student');
    }
}

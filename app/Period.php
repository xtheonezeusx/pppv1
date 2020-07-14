<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $fillable = [
        'name', 'state',
    ];

    public function students()
    {
        return $this->hasMany('App\Student');
    }
}

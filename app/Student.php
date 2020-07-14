<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'nombre', 'codigo', 'proyecto', 'period_id',
    ];

    public function period()
    {
        return $this->belongsTo('App\Period');
    }

    public function adviser()
    {
        return $this->hasOne('App\Adviser');
    }

    public function institution()
    {
        return $this->hasOne('App\Institution');
    }
}

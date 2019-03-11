<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumnos';
    
    public function carrera()
    {
        return $this->belongsTo('App\Carrera');
    }
}

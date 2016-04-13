<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    protected $fillable = array('nombre', 'apellidos', 'email', 'telefono');



    public function cursos()
    {
        return $this->belongsToMany('App\Cursos');
    }

}

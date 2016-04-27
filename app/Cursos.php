<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    protected $fillable = array('categoria', 'numMax', 'numMin', 'fechaInicio');

    /**
     * Obtiene los alumnos del curso.
     */
    public function alumnoscursos()
    {
        return $this->hasMany('App\AlumnosCursos');
    }

    public function listaesperacursos()
    {
        return $this->hasMany('App\ListaEspera');
    }

    public function alumnos()
    {
        return $this->belongsToMany('App\Alumnos');
    }

}

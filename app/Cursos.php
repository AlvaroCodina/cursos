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

}

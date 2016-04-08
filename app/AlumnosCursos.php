<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlumnosCursos extends Model
{
    protected $fillable = array('alumnos_id', 'cursos_id');


    public function cursos()
    {
        return $this->belongsTo('App\Cursos');
    }


}

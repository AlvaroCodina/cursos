<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class AlumnosCursos extends Model
{
    protected $fillable = array('alumnos_id', 'cursos_id');


    public function cursos()
    {
        return $this->belongsTo('App\Cursos');
    }

    public static function CountAlumnos($id)
    {
        return DB::table('alumnos_cursos')->where('cursos_id', '=', $id)->count();
    }

    public static function GetAlumnoEmail($email)
    {
        return DB::table('alumnos')->where('email', $email)->get();
    }


}

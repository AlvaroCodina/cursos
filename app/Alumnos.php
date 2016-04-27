<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    protected $fillable = array('nombre', 'apellidos', 'email', 'telefono', 'camara');



    public function cursos()
    {
        return $this->belongsToMany('App\Cursos');
    }

    public static function ListaEspera($alumno){

        $res = array();

        $lista = DB::table('lista_espera')->where('alumnos_id', $alumno->id)->pluck('cursos_id');
        for($i = 0; $i < count($lista); $i++){
            $res[] = DB::table('cursos')->where('id', $lista[$i])->get();
        }

        if($res == null){
            return 0;
        }
        else{
            return $res;
        }
    }

}

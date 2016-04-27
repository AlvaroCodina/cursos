<?php

namespace App;
use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

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

    public static function CursosId($id)
    {
        switch($id){
            case 1:
                $tipo = 'Fotografía';
                break;
            case 2:
                $tipo = 'Photoshop';
                break;
            case 3:
                $tipo = 'Niños';
                break;
        }

        $cursos_id = DB::table('cursos')
            ->orderBy('fechaInicio', 'desc')
            ->having('categoria', '=', $tipo)
            ->get();

        $ids = array();

        $date = Carbon::now();

        foreach($cursos_id as $curso){
            $cDate = Carbon::parse($curso->fechaInicio);
            $dif = $date->diffInMinutes($cDate, false);
            if($dif >= 0) {
                $ids[] = $curso->id;
            }
        }
        return Cursos::find($ids);
    }

    public static function FechaPasada($fechaInicio){


        $cDate = Carbon::parse($fechaInicio);

        //$fecha2 = Carbon::createFromFormat('Y-m-d H:i:s',$fechaInicio);

        if(Carbon::now()->diffInMinutes($cDate, false) > 0){
            return Date::now()->timespan($cDate);
        }
        else{
            return false;
        }

    }

    public static function CheckListaEspera($idCurso){

        /* Aquí solo entrará cuando se borre un Alumno de un curso */

        $alumnosEspera = DB::table("lista_espera")->where("cursos_id", $idCurso)->get();

        if($alumnosEspera != null){

        DB::table('alumnos_cursos')->insert([
            ['cursos_id' => $idCurso, 'alumnos_id' => $alumnosEspera[0]->alumnos_id]
        ]);

        $idAlumnosEspera = DB::table("lista_espera")->where("cursos_id", $idCurso)->where("alumnos_id", $alumnosEspera[0]->alumnos_id)->pluck("id");
        $alumnosespera = ListaEspera::find($idAlumnosEspera[0]);
        $alumnosespera->delete();
        }
    }

    public static function BorrarAumnoCurso($idCurso){

        $alumno = GetAlumnoEmail(Auth::user()->email);

        dd($alumno);

        CheckListaEspera($idCurso);
    }

}

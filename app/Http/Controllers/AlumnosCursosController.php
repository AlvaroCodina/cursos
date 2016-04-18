<?php

namespace App\Http\Controllers;

use App\Alumnos;
use App\Cursos;
use DB;
use App\AlumnosCursos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use Carbon\Carbon;

use App\Http\Requests;

class AlumnosCursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Datos y cursos del usuario registrado que le da al botón de su Nombre en el menú
        //dd(Carbon::now()->diffInDays(Carbon::now()->subDays(2), false));


        $alumno = AlumnosCursos::GetAlumnoEmail(Auth::user()->email);
        if($alumno==null){
            return view('alumnos.alumnos')->with('id', 0);
        }

        $cursos = Alumnos::find($alumno[0]->id)->cursos()->get();


        return view('alumnoscursos.index')->with('alumno', $alumno[0])->with('cursos', $cursos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alumnoscursos.alumnoscursos');

    }

    /**
     * Segun tenga los datos necesarios o no se registrará o los rellenará
     *
     * @param int $id
     * @return una vista u otra
     */
    public function checkDatos($id)
    {
        /**
         * Comprobar segun el ID que curso es y que campos son necesarios para poder inscribirse en el curso
         *
         * Por ejemplo: en el curso de fotografía es necesario tener camara
         *
         * Si tienen ya los datos rellenados irá directamente a pagarlo, si no a un form para rellenarlos
         */

        $alumno = DB::select("select * from alumnos where email='".Auth::user()->email."'");

        if($alumno == null){
            return view('alumnos.alumnos')->with('id', $id);
        }

        if($id==1){
            //FOTOGRAFÍA
            //Necesario el campo camara
            if($alumno[0]->camara != ""){
                return $this->mirarCurso($alumno[0], $id);
            }
            else{
                return view('alumnoscursos.rellenar')->with('alumno', $alumno)->with('id', $id);
            }
        }
        else{
            return $this->mirarCurso($alumno[0], $id);
        }



    }


    public function mirarCurso($Alumno, $id)
    {
        /*
         * Mirar que el curso este lleno o no(mirar fecha actual y comparar con la fecha mas proxima de los cursos que están)
         * Si esta lleno: crear un registro nuevo de ese tipo de curso en la tabla alumnos_cursos y añadir al alumno
         * Si no esta lleno: añadir al alumno en ese curso de la tabla alumnos cursos
         * */

        $categoria="";
        switch ($id) {
            case 1:
                $categoria='Fotografía';
                break;
            case 2:
                $categoria='Photoshop';
                break;
            case 3:
                $categoria='Niños';
                break;
        }

        $msg="Inscrito con éxito";
        $min=1000000;
        $id_curso=0;
        $num_max=0;
        $date = Carbon::now();
        $cursosLlenos = array();
        $fechaLlena=Carbon::now();
        $salir=false;
        $algo=false;

        do {

            $salir=true;
            $fechas = DB::select("select * from cursos where categoria='$categoria'");

            if(count($fechas)==0){
                $msg = "No hay cursos.";
                goto end;
            }

            for($i = 0; $i < count($fechas); $i++){
                $cDate = Carbon::parse($fechas[$i]->fechaInicio);
                //comparar las fechas por si ya pasó
                //Carbon::now()->diffInDays(Carbon::now()->subDays(2), false)
                //if(){}
                $dif = $cDate->diffInDays($date);


                $estaAlumno = DB::select("select * from alumnos_cursos where cursos_id=".$fechas[$i]->id);
                for($j=0; $j < count($estaAlumno); $j++){
                    if($estaAlumno[$j]->alumnos_id==$Alumno->id){
                        $msg="Yá estás inscrito en este curso";
                        goto end;
                    }
                }


                if(array_search($cDate, $cursosLlenos)==false){
                    if($dif<$min){
                        $min=$dif;
                        $id_curso = $fechas[$i]->id;
                        $num_max = $fechas[$i]->numMax;
                        $fechaLlena = $cDate;
                    }
                }
            }

            $numeroAlumnos = DB::table('alumnos_cursos')->where('cursos_id', $id_curso)->count();

            if($numeroAlumnos < $num_max){
                DB::table('alumnos_cursos')->insert([
                    ['cursos_id' => $id_curso, 'alumnos_id' => $Alumno->id]
                ]);
                goto end;
            }
            else{
                $cursosLlenos[] = $fechaLlena;
            }

            if($numeroAlumnos==$num_max){
                $salir=false;
                //goto end;
            }


        } while ($algo==true);

        end:

        if($salir==false){
            $msg="Ya no hay más plazas!! y no hay más cursos programados aún";
        }

        //devolver el mensaje
        return view('alumnoscursos.pagar')->with('id', $id)->with('mensaje', $msg);

    }

    /**
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function putCheckDatos(Request $request, $id)
    {

        DB::table('alumnos')
            ->where('email', Auth::user()->email)
            ->update(['camara' => Input::get('camara')]);


        $alumno = DB::select("select * from alumnos where email='".Auth::user()->email."'");
        return $this->mirarCurso($alumno[0], $id);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        /** Tal como lo tengo seria:
        * $cursos = Alumnos::find($idAlumno)->cursos()->get();
        * Esto me devolvería un array que recorrería con un foreach con todos los cursos del alumno.
        */


        //$lista = DB::select('select alumnos.* from alumnos, alumnos_cursos where alumnos.id=alumnos_cursos.alumnos_id and alumnos_cursos.cursos_id='.$id);
        //$datos = DB::select("select count(*) as numAlumnos from alumnos_cursos where cursos_id=$id");


        $lista = Cursos::find($id)->alumnos()->get();
        $curso = Cursos::find($id);
        $datos = AlumnosCursos::CountAlumnos($id);

        return view('alumnoscursos.listado')->with('lista', $lista)->with('curso', $curso)->with('numAlumnos', $datos);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ids)
    {
        $dts = explode("|", $ids);
        $idCurso=$dts[0];
        $idAlumno=$dts[1];
        $idAlumnosCursos = DB::select("select id from alumnos_cursos where cursos_id=$idCurso and alumnos_id=$idAlumno");
        $alumnoscursos = AlumnosCursos::find($idAlumnosCursos[0]->id);
        $alumnoscursos->delete();

        return Redirect('/alumnoscursos/'.$idCurso);
    }
}

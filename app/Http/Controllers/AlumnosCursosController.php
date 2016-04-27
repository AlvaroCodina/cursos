<?php

namespace App\Http\Controllers;

use App\Alumnos;
use App\Cursos;
use App\ListaEspera;
use DB;
use App\AlumnosCursos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
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

        $cursos = Alumnos::find($alumno[0]->id)->cursos()->orderBy('fechaInicio', 'desc')->get();

        $listaEspera = Alumnos::ListaEspera($alumno[0]);

        //dd(DB::table('lista_espera')->where('cursos_id', 24)->first());

        return view('alumnoscursos.index')->with('alumno', $alumno[0])->with('cursos', $cursos)->with('espera', $listaEspera[0]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('alumnoscursos.alumnoscursos');
    }

    /**
     * Segun tenga los datos necesarios o no se registrará o los rellenará
     *
     * @param int $id
     * @return una vista u otra
     */
    public function checkDatos($id, $fechaInicio)
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
                return $this->mirarCurso($alumno[0], $id, $fechaInicio);
            }
            else{
                return view('alumnoscursos.rellenar')->with('alumno', $alumno)->with('id', $id);
            }
        }
        else{
            return $this->mirarCurso($alumno[0], $id, $fechaInicio);
        }

    }

    /**
     * Mira si hay cursos, si estas ya en ese curso o si no estas te inscribe
     *
     * @param $Alumno Objeto del alumno actualmente logeado
     * @param $id id del tipo de curso
     * @param $fechaInicio fecha de inicio del curso
     * @return mixed
     */
    public function mirarCurso($Alumno, $id, $fechaInicio)
    {
        $msg="Inscrito con éxito";
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

        $condiciones = ['categoria' => $categoria, 'fechaInicio' => $fechaInicio];
        $curso = Cursos::where($condiciones)->get();

        $numeroAlumnos = DB::table('alumnos_cursos')->where('cursos_id', $curso[0]->id)->count();

        $esta = false;
        $estaAlumno = Cursos::find($curso[0]->id)->alumnos()->get();

        foreach ($estaAlumno as $alumnos) {
            if ($alumnos->id == $Alumno->id) { $esta = true; }
        }

        if ($esta == true) {
            $msg = "Yá estás inscrito en este curso";
        }
        else {
            if($numeroAlumnos < $curso[0]->numMax) {
                DB::table('alumnos_cursos')->insert([
                    ['cursos_id' => $curso[0]->id, 'alumnos_id' => $Alumno->id]
                ]);
            }
            else{
                $listaEspera = DB::table('lista_espera')->where('cursos_id', $curso[0]->id)->get();
                $espera = false;
                foreach ($listaEspera as $dts) {
                    if ($dts->alumnos_id == $Alumno->id) { $espera = true; }
                }
                if ($espera == false) {
                    DB::table('lista_espera')->insert([
                        ['cursos_id' => $curso[0]->id, 'alumnos_id' => $Alumno->id]
                    ]);
                    $msg = "Estás inscrito en la lista de espera de este curso";
                }else{ $msg = "Yá estás inscrito en este curso"; }
            }
        }

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


        return Redirect('/alumnoscursos/'.$id."/curso");
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
        $listaEspera = Cursos::find($id)->listaesperacursos()->get();
        $espera = array();
        foreach($listaEspera as $dts){
            $espera[] = Alumnos::find($dts->alumnos_id);
        }

        return view('alumnoscursos.listado')->with('lista', $lista)->with('curso', $curso)->with('numAlumnos', $datos)->with('espera', $espera);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumno = Alumnos::find($id);
        return view('alumnoscursos.editar')->with('alumno', $alumno);
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
        $rules = array(
            'nombre'      => 'required',
            'apellidos'   => 'required',
            'telefono'    => 'required|integer'
        );

        $messages = [
            'required' => 'El campo :attribute es requerido.',
            'integer' => 'El campo :attribute tiene que ser numero entero.',
        ];

        $validator = Validator::make(Input::all(), $rules, $messages);

        if ($validator->fails()) {
            $user = \Auth::user();

            if ($user->is('admin')) {
                return Redirect('alumnos/' . $id . '/edit')
                    ->withErrors($validator);
            }else{
                return Redirect('alumnoscursos/' . $id . '/edit')
                    ->withErrors($validator);
            }

        } else {
            $alumno = Alumnos::find($id);
            $alumno->nombre    = Input::get('nombre');
            $alumno->apellidos = Input::get('apellidos');
            $alumno->telefono  = Input::get('telefono');
            $alumno->camara    = Input::get('camara');
            $alumno->save();

            return Redirect('/alumnoscursos/');
        }
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
        if($dts[2]==0){
            $idAlumnosCursos = DB::select("select id from alumnos_cursos where cursos_id=$idCurso and alumnos_id=$idAlumno");
            $alumnoscursos = AlumnosCursos::find($idAlumnosCursos[0]->id);
            $alumnoscursos->delete();
            AlumnosCursos::CheckListaEspera($idCurso);
        }else{
            $idAlumnosEspera = DB::table("lista_espera")->where("cursos_id", $idCurso)->where("alumnos_id", $idAlumno)->pluck("id");
            $alumnosespera = ListaEspera::find($idAlumnosEspera[0]);
            $alumnosespera->delete();
        }



        return Redirect('/alumnoscursos/'.$idCurso);
    }


}

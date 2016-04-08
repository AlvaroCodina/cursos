<?php

namespace App\Http\Controllers;

use App\Alumnos;
use App\Cursos;
use DB;
use App\AlumnosCursos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;

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
        $alumnos = DB::select('select alumnos.nombre, alumnos.apellidos, alumnos_cursos.cursos_id from cursos, alumnos, alumnos_cursos where cursos.id=alumnos_cursos.cursos_id and alumnos.id=alumnos_cursos.alumnos_id');
        $cursos = DB::select('select cursos.categoria, cursos.fechaInicio, alumnos_cursos.cursos_id from cursos, alumnos, alumnos_cursos where cursos.id=alumnos_cursos.cursos_id and alumnos.id=alumnos_cursos.alumnos_id GROUP BY alumnos_cursos.cursos_id');

        return view('alumnoscursos.index')->with('alumnos', $alumnos)->with('cursos', $cursos);
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

        if($id==1){
            //FOTOGRAFÍA
            //Necesario el campo camara
            $alumno = DB::select("select * from alumnos where email='".Auth::user()->email."'");
            if($alumno[0]->camara != ""){
                //return "Tiene una camara: ".$alumno[0]->camara;
                return view('alumnoscursos.pagar')->with('id', $id);
            }
            else{
                return view('alumnoscursos.rellenar')->with('alumno', $alumno)->with('id', $id);
            }
        }



    }

    /**
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function putCheckDatos(Request $request, $id)
    {
        /*$alumno = Alumnos::select("select * from alumnos where email='".Auth::user()->email."'");
        $alumno->camara   = Input::get('camara');
        $alumno->save();*/

        return Redirect('/alumnoscursos');
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

        //$lista = DB::table('alumnos_cursos')->where('cursos_id', $id)->get();
        $lista = DB::select('select alumnos.* from alumnos, alumnos_cursos where alumnos.id=alumnos_cursos.alumnos_id and alumnos_cursos.cursos_id='.$id);

        $curso = Cursos::find($id);

        return view('alumnoscursos.listado')->with('lista', $lista)
                                            ->with('curso', $curso);

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
    public function destroy($id)
    {
        //
    }
}

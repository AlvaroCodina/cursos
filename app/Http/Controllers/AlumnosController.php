<?php

namespace App\Http\Controllers;

use App\Alumnos;
use App\AlumnosCursos;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumnos::all();

        return view('alumnos.listado')->with('alumnos', $alumnos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alumnos.alumnos');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'nombre'     => 'required',
            'apellidos'  => 'required',
            'email'      => 'required|email',
            'telefono'   => 'required|integer'
        );

        $messages = [
            'required' => 'El campo :attribute es requerido.',
            'integer' => 'El campo :attribute tiene que ser número entero.',
            'email' => 'El campo :attribute tiene que ser un email válido.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {

            $messages = $validator->messages();
            return redirect('/alumnos/create')
                ->withErrors($validator)->withInput();


        } else {

            Alumnos::create($request->all());
            return redirect('/alumnos');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $alumno = Alumnos::find($id);
        return view('alumnos.datos')->with('alumno', $alumno);
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
        return view('alumnos.editar')->with('alumno', $alumno);
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
            'email'       => 'required|email',
            'telefono'    => 'required|integer'
        );

        $messages = [
            'required' => 'El campo :attribute es requerido.',
            'integer' => 'El campo :attribute tiene que ser numero entero.',
            'email' => 'El campo :attribute tiene que ser un email válido.',
        ];

        $validator = Validator::make(Input::all(), $rules, $messages);

        if ($validator->fails()) {
            return Redirect('alumnos/' . $id . '/edit')
                ->withErrors($validator);
        } else {
            $alumno = Alumnos::find($id);
            $alumno->nombre    = Input::get('nombre');
            $alumno->apellidos = Input::get('apellidos');
            $alumno->email     = Input::get('email');
            $alumno->telefono  = Input::get('telefono');
            $alumno->save();

            return Redirect('/alumnos');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumno = Alumnos::find($id);
        $alumno->delete();

        return Redirect('/alumnos');
    }
}

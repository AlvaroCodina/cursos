<?php

namespace App\Http\Controllers;

use App\Cursos;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$user = \Auth::user();         //devuelve el objeto user con los datos del usuario loggeado

        $cursos = Cursos::all();

        return view('cursos.listado')->with('cursos', $cursos)->with('user');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cursos.cursos');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Cursos::truncate();                      -----------------Para borrar la tabla cursos y reiniciar el contador de id

        $rules = array(
            'categoria'   => 'required',
            'numMax'      => 'required|integer|between:6,15',
            'numMin'      => 'required|integer|between:4,6',
            'fechaInicio' => 'required|date'
        );

        $messages = [
            'required' => 'El campo :attribute es requerido.',
            'integer' => 'El campo :attribute tiene que ser numero entero.',
            'numMax.between' => 'El campo :attribute tiene que ser un valor entre el 6 y el 15.',
            'numMin.between' => 'El campo :attribute tiene que ser un valor entre el 4 y el 6.',
            'date' => 'El campo :attribute tiene que ser fecha con formato: YYYY/MM/DD.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {

            $messages = $validator->messages();
            return redirect('/cursos/create')
                ->withErrors($validator)->withInput();


        } else {

            Cursos::create($request->all());
            return redirect('/cursos');

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

        $curso = Cursos::find($id);
        return view('cursos.datos')->with('curso', $curso);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $curso = Cursos::find($id);

        return View('cursos.editar')->with('curso', $curso);
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
            'categoria'   => 'required',
            'numMax'      => 'required|integer|between:6,15',
            'numMin'      => 'required|integer|between:4,6',
            'fechaInicio' => 'required|date'
        );

        $messages = [
            'required' => 'El campo :attribute es requerido.',
            'integer' => 'El campo :attribute tiene que ser numero entero.',
            'numMax.between' => 'El campo :attribute tiene que ser un valor entre el 6 y el 15.',
            'numMin.between' => 'El campo :attribute tiene que ser un valor entre el 4 y el 6.',
            'date' => 'El campo :attribute tiene que tener la fecha y la hora.',
        ];

        $validator = Validator::make(Input::all(), $rules, $messages);

        if ($validator->fails()) {
            return Redirect('cursos/' . $id . '/edit')
                ->withErrors($validator);
        } else {
            $curso = Cursos::find($id);
            $curso->categoria   = Input::get('categoria');
            $curso->numMax      = Input::get('numMax');
            $curso->numMin      = Input::get('numMin');
            $curso->fechaInicio = Input::get('fechaInicio');
            $curso->save();

            return Redirect('/cursos');
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
        $curso = Cursos::find($id);
        $curso->delete();

        return Redirect('/cursos');
    }
}
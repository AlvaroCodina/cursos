@extends('layouts.pagina')

@section('header')
    @parent

    <title>Nuevo Curso</title>

@stop

@section('pagina')


    <div class="ancho">

        <div class="titulo text-center">
            <h1 class="tith1">Rellena los Datos</h1>
            <h2 class="tith2">Un subtitulo</h2>
        </div>

    </div>

    <div class="ancho" id="contenido">

        <div class=" text-center" style="padding-top: 50px;">
            <p class="parDec">Nuevo Alumno</p>
        </div>

        <div class="col-sm-8 col-sm-offset-2">

            <div class="page-header">
                <h1>Rellena los campos necesarios</h1>
            </div>

            <!-- FORM STARTS HERE -->

            {{ Form::model($alumno, array('action' => array('AlumnosCursosController@putCheckDatos', $id), 'method' => 'PUT')) }}

            <div class="form-group">
                {{ Form::label('camara', 'Camara') }}
                {{ Form::text('camara', null, array('class' => 'form-control')) }}
                @if ($errors->has('camara')) <p class="help-block">{{ $errors->first('camara') }}</p> @endif
            </div>

            {{ Form::submit('Editar', array('class' => 'btn btn-success')) }}

            {{ Form::close() }}

        </div>
    </div>


@stop

@section('footer')
    @parent

@stop
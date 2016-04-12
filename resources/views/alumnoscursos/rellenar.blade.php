@extends('layouts.menu')

@section('header')
    @parent

    <title>Nuevo Curso</title>

@stop

@section('pagina')


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


@stop

@section('footer')
    @parent

@stop
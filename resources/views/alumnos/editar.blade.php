
@extends('layouts.menu')

@section('header')
    @parent

    <title>Editar Alumno</title>

@stop

@section('pagina')

    <div class="col-sm-8 col-sm-offset-2">

        <div class="page-header">
            <h1><span class="glyphicon glyphicon-edit"></span> Editar {{ $alumno->nombre }}</h1>
        </div>

        {{ Form::model($alumno, array('route' => array('alumnos.update', $alumno->id), 'method' => 'PUT')) }}

        <div class="form-group">
            {{ Form::label('nombre', 'Nombre') }}
            {{ Form::text('nombre', null, array('class' => 'form-control')) }}
            @if ($errors->has('nombre')) <p class="help-block">{{ $errors->first('nombre') }}</p> @endif
        </div>

        <div class="form-group">
            {{ Form::label('apellidos', 'Apellidos') }}
            {{ Form::text('apellidos', null, array('class' => 'form-control')) }}
            @if ($errors->has('apellidos')) <p class="help-block">{{ $errors->first('apellidos') }}</p> @endif
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::text('email', null, array('class' => 'form-control')) }}
            @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
        </div>

        <div class="form-group">
            {{ Form::label('telefono', 'Telefono') }}
            {{ Form::text('telefono', null, array('class' => 'form-control')) }}
            @if ($errors->has('telefono')) <p class="help-block">{{ $errors->first('telefono') }}</p> @endif
        </div>

        {{ Form::submit('Editar el Alumno', array('class' => 'btn btn-success')) }}

        {{ Form::close() }}

    </div>

@stop

@section('footer')
    @parent



@stop
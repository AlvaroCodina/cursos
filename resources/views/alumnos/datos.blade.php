@extends('layouts.menu')

@section('header')
    @parent

    <title>Datos del Alumno</title>

@stop

@section('pagina')
    <div class="col-sm-8 col-sm-offset-2">

        <div class="page-header">
            <h1><span class="glyphicon glyphicon-th-list"></span> Listado del Alumno {{ $alumno->nombre  }}</h1>
        </div>

        <div>

            <h3>Nombre: <span class="label label-info">{{ $alumno->nombre }}</span></h3>
            <h3>Apellidos: <span class="label label-info">{{ $alumno->apellidos }}</span></h3>
            <h3>Email: <span class="label label-info">{{ $alumno->email }}</span></h3>
            <h3>Teléfono: <span class="label label-info">{{ $alumno->telefono }}</span></h3>

        </div>

    </div>


    </div>

@stop

@section('footer')
    @parent


@stop
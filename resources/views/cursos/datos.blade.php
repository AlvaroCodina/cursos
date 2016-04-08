@extends('layouts.menu')

@section('header')
    @parent

    <title>Datos del Curso</title>

@stop

@section('pagina')
    <div class="col-sm-8 col-sm-offset-2">

        <div class="page-header">
            <h1><span class="glyphicon glyphicon-th-list"></span> Listado del Curso {{ $curso->categoria  }}</h1>
        </div>

        <div>

            <h3>Categoría: <span class="label label-info">{{ $curso->categoria }}</span></h3>
            <h3>Número máximo: <span class="label label-info">{{ $curso->numMax }}</span></h3>
            <h3>Número mínimo: <span class="label label-info">{{ $curso->numMin }}</span></h3>
            <h3>Fecha Inicio: <span class="label label-info">{{ $curso->fechaInicio }}</span></h3>

        </div>

    </div>


</div>

@stop

@section('footer')
    @parent


@stop

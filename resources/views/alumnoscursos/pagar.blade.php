@extends('layouts.pagina')

@section('header')
    @parent

    <title>Nuevo Curso</title>

@stop

@section('pagina')

    <div class="ancho">
    <div class="col-sm-8 col-sm-offset-2">

        <div class="panel-heading"><h2>Pagar Curso</h2></div>
        <div class="panel panel-default paddTodo">
            <p>{{ $mensaje }}</p>
            <p>Aquí habría varios métodos de pago</p>
        </div>

    </div>
    </div>

@stop

@section('footer')
    @parent

@stop
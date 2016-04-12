@extends('layouts.menu')

@section('header')
    @parent

    <title>Nuevo Curso</title>

@stop

@section('pagina')


    <div class="col-sm-8 col-sm-offset-2">

        <div class="page-header">
            <h1>Pagar Curso</h1>
        </div>

        <p>{{ $mensaje }}</p>
        <p>Aquí habría varios métodos de pago</p>

    </div>


@stop

@section('footer')
    @parent

@stop
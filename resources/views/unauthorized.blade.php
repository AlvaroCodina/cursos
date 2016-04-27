@extends('layouts.pagina')

@section('header')
    @parent

    <title>No estás Autorizado</title>

@stop


@section('pagina')

    <div class="ancho">

        <div class="titulo text-center">
            <h1 class="tith1">Cursos rIL</h1>
            <h2 class="tith2">Un subtitulo</h2>
        </div>

    </div>


    <div class="ancho" id="contenido">

        <div class="desc text-center">
            <p class="parDec">Esta página es privada</p>
        </div>

    </div>

    <div class="ancho" id="cursos">
        <div class="panel panel-default col-md-offset-2 col-md-8 paddTodo">
            <p class="text-center">Esta es una página de acceso restringido y no tienes poder aquí!!!</p>
            <p class="text-center">Vuelve atrás por favor</p>
            <a href="{{ URL::previous() }}"><button class="boton fourth">Volver</button></a>
        </div>
    </div>

@stop

@section('footer')
    @parent


@stop
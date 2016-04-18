@extends('layouts.pagina')

@section('header')
    @parent

    <title>Cursos rIL</title>

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
        <p class="parDec">Ofrecemos cursos y mucho más...</p>
    </div>

</div>

<div class="ancho" id="cursos">
    <div class="col-md-4 portfolio-item">
        <div class="panel panel-default text-center">
            <h2>Fotografía</h2>
            <p>dshfvbdshvbhdvb</p>
            <p>dshfvbdshvbhdvb</p>
            <p>dshfvbdshvbhdvb</p>
            <a href="/alumnoscursos/1/curso"><button class="boton fourth">Más Información</button></a>
        </div>
    </div>

    <div class="col-md-4 portfolio-item">
        <div class="panel panel-default text-center">
            <h2>Photoshop</h2>
            <p>dshfvbdshvbhdvb</p>
            <p>dshfvbdshvbhdvb</p>
            <p>dshfvbdshvbhdvb</p>
            <a href="/alumnoscursos/2/curso"><button class="boton fourth">Más Información</button></a>
        </div>
    </div>

    <div class="col-md-4 portfolio-item">
        <div class="panel panel-default text-center">
            <h2>Otros</h2>
            <p>dshfvbdshvbhdvb</p>
            <p>dshfvbdshvbhdvb</p>
            <p>dshfvbdshvbhdvb</p>
            <a href="/alumnoscursos/3/curso"><button class="boton fourth">Más Información</button></a>
        </div>
    </div>
</div>

@stop

@section('footer')
    @parent


@stop
@extends('layouts.pagina')

@section('header')
    @parent

    <title>Datos usuarios</title>
    <style>
        .submenu{
            position: absolute;
            top: 0;
            right: 15px;
        }
        a{ color: black; }
        a:hover{ color: darkslategrey; }
    </style>
    @stop


    @section('pagina')
    <!-- Aquí podrán ver los usuarios registrados sus datos y cursos -->


    <div class="ancho">
        <div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8 margentop">
            <div class="panel-heading"><h2>Datos personales</h2></div>
            <div class="panel panel-default paddTodo" style="position: relative;">
                <p class="parrafo"><span class="label label-info">Nombre:</span> {{ $alumno->nombre }}</p>
                <p class="parrafo"><span class="label label-info">Apellidos:</span> {{ $alumno->apellidos }}</p>
                <p class="parrafo"><span class="label label-info">Email:</span> {{ $alumno->email }}</p>
                <p class="parrafo"><span class="label label-info">Camara:</span> {{ $alumno->camara }}</p>
                <p class="parrafo"><span class="label label-info">Teléfono:</span> {{ $alumno->telefono }}</p>
                <div class="submenu">
                    <a href="/alumnos/{{ $alumno->id  }}/edit">editar</a>
                </div>
            </div>

            <div class="panel-heading"><h2>Cursos</h2></div>

                @foreach($cursos as $curso)
                <div class="panel panel-default paddTodo" style="position: relative;">
                    <p class="parrafo"><span class="label label-info">Curso:</span> {{ $curso->categoria }}</p>
                    <p class="parrafo"><span class="label label-info">fecha:</span> {{ $curso->fechaInicio }}</p>
                    <div class="submenu">
                        <a href="">editar</a>
                        <a href="">quitarse</a>
                    </div>
                </div>
                @endforeach

        </div>

    </div>

@stop

@section('footer')
    @parent


@stop
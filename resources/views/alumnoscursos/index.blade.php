@extends('layouts.pagina')

@section('header')
    @parent

    <title>Datos usuarios</title>
    {!! Html::style('jquery.growl/stylesheets/jquery.growl.css') !!}
    <style>
        .submenu{
            position: absolute;
            top: 15px;
            right: 15px;
        }
        .enlaces{ color: black; float: right; }
        a:hover{ color: darkslategrey; }
        .capa{ position: relative; }
    </style>
    @stop


    @section('pagina')
    <!-- Aquí podrán ver los usuarios registrados sus datos y cursos -->


    <div class="ancho">
        <div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8 margentop">
            <div class="panel-heading"><h2>Datos personales</h2></div>
            <div class="panel panel-default paddTodo capa">
                <p class="parrafo"><span class="label label-info">Nombre:</span> {{ $alumno->nombre }}</p>
                <p class="parrafo"><span class="label label-info">Apellidos:</span> {{ $alumno->apellidos }}</p>
                <p class="parrafo"><span class="label label-info">Email:</span> {{ $alumno->email }}</p>
                <p class="parrafo"><span class="label label-info">Camara:</span> {{ $alumno->camara }}</p>
                <p class="parrafo"><span class="label label-info">Teléfono:</span> {{ $alumno->telefono }}</p>
                <div class="submenu">
                    <a class="enlaces" href="/alumnoscursos/{{ $alumno->id  }}/edit">editar <span class="glyphicon glyphicon-edit"></span></a>
                </div>
            </div>

            <div class="panel-heading"><h2>Cursos</h2></div>

                @foreach($cursos as $curso)
                <div class="panel panel-default paddTodo capa">
                    @if(\App\AlumnosCursos::FechaPasada($curso->fechaInicio))
                        <h3>El curso empieza en: {{ \App\AlumnosCursos::FechaPasada($curso->fechaInicio) }} <span class="glyphicon glyphicon-time"></span></h3>
                    @else
                        <h3>Curso finalizado <span class="glyphicon glyphicon-remove"></span></h3>
                    @endif
                    <p class="parrafo"><span class="label label-info">Curso:</span> {{ $curso->categoria }}</p>
                    <p class="parrafo"><span class="label label-info">Fecha:</span> {{ $curso->fechaInicio }}</p>
                    <div class="submenu">
                        <a class="enlaces" href="javascript:void(0);" onclick="confirmacion({{ $curso->id }});">quitarse <span class="glyphicon glyphicon-remove"></span></a>
                    </div>
                </div>
                @endforeach


            <div class="panel-heading"><h2>Listas de Espera</h2></div>

            @if($espera == 0)
                <div class="panel panel-default paddTodo capa">
                    <h3>No tienes listas de espera</h3>
                </div>
            @endif

            <ul class="list-group">
            @for($i=0;$i<count($espera);$i++)
                <li class="list-group-item">{{ $espera[$i]->categoria }}, {{ $espera[$i]->fechaInicio }} @if(\App\AlumnosCursos::FechaPasada($espera[$i]->fechaInicio)) - Se avisará si hay plazas @else - Ya se acabó el curso @endif </li>
            @endfor
            </ul>
        </div>

    </div>

@stop

@section('footer')
    @parent
    {!! Html::script('jquery.growl/javascripts/jquery.growl.js') !!}
    <script>

        /* Confirmaciones al quitarse de los cursos */

        //include(app_path().'/includes/config.php');

    function confirmacion(idCurso){
        var res =  confirm("¿Seguro que quiere quitarse del curso?");
        if (res == true){
            $.ajax({
                type: "POST",
                url: "{!! public_path().'/borrarAlumno.php' !!}",
                data: {
                    idCurso: idCurso
                }
            }).done(function() {
                $.growl.notice({ message: "Te diste de baja satisfactoriamentre" });
            });
        }
    }





    </script>

@stop
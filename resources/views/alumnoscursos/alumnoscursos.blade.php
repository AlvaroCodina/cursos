@extends('layouts.pagina')

@section('header')
    @parent

    <title>Nuevo Curso</title>

@stop

@section('pagina')


    <div class="ancho">
        <div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8 margentop">
            <div class="panel-heading">
                @if($id==1)
                    <h2>Curso de Fotografía</h2>
                @elseif($id==2)
                    <h2>Curso de Photoshop</h2>
                @elseif($id==3)
                    <h2>Curso Infantíl</h2>
                @endif
            </div>
            <div class="panel panel-default paddTodo">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        @if($id==1)
                            <img class="img-responsive img-rounded fotoscursos center-block" src="/images/camara.jpg" />
                        @elseif($id==2)
                            <img class="img-responsive img-rounded fotoscursos center-block" src="/images/photoshop.jpg" />
                        @elseif($id==3)
                            <img class="img-responsive img-rounded fotoscursos center-block" src="/images/ninos.jpg" />
                        @endif
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-8">
                        @if($id==1)
                            <p>Curso de fotografía avanzada... es necesario tener camara propia que sea decente...</p>
                            <p>Todos los jueves a las 5:00</p>
                        @elseif($id==2)
                            <p>Curso de Photoshop básico, y alguna cosa mas de descripción que queda mucho espacio libre</p>
                            <p>Son los viernes de cada semana a las 6:30</p>
                            <p>Se aprenderá:</p>
                            <ul>
                                <li>Seleccionar</li>
                                <li>Tratamiento de imagen</li>
                                <li>Filtros</li>
                                <li>Controles básicos</li>
                            </ul>
                        @elseif($id==3)
                            <p>Curso para niños de algo que no se que es pero seguro que esta muy bien</p>
                            <p>Ni idea maño</p>
                        @endif


                        <h2>Listado de Cursos disponibles</h2>


                        @foreach(\App\AlumnosCursos::CursosId($id) as $cursos)

                            <div>

                            </div>


                            <p>{{ $cursos->categoria }} - {{ $cursos->fechaInicio }}</p><a href="/alumnoscursos/{{ $id }}/{{ $cursos->fechaInicio }}/checkDatos"><button class="boton fourth">Inscribirse</button></a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>








@stop

@section('footer')
    @parent

@stop
@extends('layouts.menu')

@section('header')
    @parent

    <title>Nuevo Curso</title>

@stop

@section('pagina')

    <div class="col-sm-8 col-sm-offset-2">

        <div class="page-header">
            @if($id==1)
                <h1>Curso de Fotografía</h1>
            @elseif($id==2)
                <h1>Curso de Photoshop</h1>
            @elseif($id==3)
                <h1>Curso Infantíl</h1>
            @endif
        </div>

        <div class="panel panel-body">
            <div class="row">
                <div class="col-xs-12 col-md-4">
                    @if($id==1)
                        <img class="img-responsive img-rounded fotoscursos center-block" src="/images/camara.jpg" />
                    @elseif($id==2)
                        <img class="img-responsive img-rounded fotoscursos center-block" src="/images/photoshop.jpg" />
                    @elseif($id==3)
                        <img class="img-responsive img-rounded fotoscursos center-block" src="/images/ninos.jpg" />
                    @endif
                </div>

                <div class="col-xs-12 col-md-8">
                    @if($id==1)
                        <p>Curso de fotografía avanzada... es necesario tener camara propia que sea decente...</p>
                        <p>Todos los jueves a las 5:00</p>
                        <a href="/alumnoscursos/1/checkDatos"><button class="btn btn-info">Inscribirse</button></a>
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
                        <a href="/alumnoscursos/2/checkDatos"><button class="btn btn-info">Inscribirse</button></a>
                    @elseif($id==3)
                        <p>Curso para niños de algo que no se que es pero seguro que esta muy bien</p>
                        <p>Ni idea maño</p>
                        <a href="/alumnoscursos/3/checkDatos"><button class="btn btn-info">Inscribirse</button></a>
                    @endif
                </div>
            </div>
        </div>

    </div>

@stop

@section('footer')
    @parent

@stop
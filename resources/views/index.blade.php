@extends('layout')
@section('contenido')

    <div class="row" id="cursos">
        <div class="col-md-4 portfolio-item">
            <p class="text-center titulocursos">Curso de Fotografía</p>
            <img class="img-responsive img-rounded fotoscursos center-block" src="images/camara.jpg" />
            <a href="/alumnoscursos/1/curso"><button class="btn btn-info col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 col-xs-12 inscribirse" id="fotografia">Inscribirse <span class="glyphicon glyphicon-plus"></span></button></a>
        </div>
        <div class="col-md-4 portfolio-item">
            <p class="text-center titulocursos">Curso de Photoshop</p>
            <img class="img-responsive img-rounded fotoscursos center-block" src="images/photoshop.jpg" />
            <a href="/alumnoscursos/2/curso"><button class="btn btn-info col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 col-xs-12 inscribirse" id="photoshop">Inscribirse <span class="glyphicon glyphicon-plus"></span></button></a>
        </div>
        <div class="col-md-4 portfolio-item">
            <p class="text-center titulocursos">Curso Infantil</p>
            <img class="img-responsive img-rounded fotoscursos center-block" src="images/ninos.jpg" />
            <a href="/alumnoscursos/3/curso"><button class="btn btn-info col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 col-xs-12 inscribirse" id="ninos">Inscribirse <span class="glyphicon glyphicon-plus"></span></button></a>
        </div>
    </div>



@stop
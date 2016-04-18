@extends('layouts.pagina')

@section('header')
    @parent

    <title>Cursos rIL</title>

@stop


@section('pagina')

    <div class="ancho">

        <div class="titulo text-center">
            <h1 class="tith1">Rellena los Datos</h1>
            <h2 class="tith2">Un subtitulo</h2>
        </div>

    </div>

    <div class="ancho" id="contenido">

        <div class=" text-center" style="padding-top: 50px;">
            <p class="parDec">Nuevo Alumno</p>
        </div>

        <div class="col-sm-8 col-sm-offset-2">

            <!-- FORM STARTS HERE -->
            <form method="POST" action="/alumnos" novalidate>

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" class="form-control" name="nombre" placeholder="Nombre" value="{{ Auth::user()->name }}">
                    @if ($errors->has('nombre')) <p class="help-block">{{ $errors->first('nombre') }}</p> @endif
                </div>

                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" id="apellidos" class="form-control" name="apellidos" placeholder="Apellidos" value="{{ \Illuminate\Support\Facades\Input::old('apellidos') }}">
                    @if ($errors->has('apellidos')) <p class="help-block">{{ $errors->first('apellidos') }}</p> @endif
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" name="email" placeholder="Email" value="{{ Auth::user()->email }}" READONLY>
                    @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                </div>

                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="tel" id="telefono" class="form-control" name="telefono" placeholder="Teléfono" value="{{ \Illuminate\Support\Facades\Input::old('telefono') }}">
                    @if ($errors->has('telefono')) <p class="help-block">{{ $errors->first('telefono') }}</p> @endif
                </div>

                <div class="form-group">
                    <label for="camara">Cámara @if($id==1) <small>(Requerido)</small> @else <small>(Opcional)</small> @endif</label>
                    <input type="text" id="camara" class="form-control" name="camara" placeholder="Cámara" value="{{ \Illuminate\Support\Facades\Input::old('camara') }}">
                    @if ($errors->has('camara')) <p class="help-block">{{ $errors->first('camara') }}</p> @endif
                </div>

                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <button type="submit" class="btn btn-success">Enviar</button>

            </form>

        </div>

    </div>

@stop

@section('footer')
    @parent


@stop
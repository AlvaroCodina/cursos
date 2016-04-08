


@extends('layouts.menu')

@section('header')
    @parent

    <title>Nuevo Alumno</title>

@stop


@section('pagina')

<div class="col-sm-8 col-sm-offset-2">

    <div class="page-header">
        <h1><span class="glyphicon glyphicon-share"></span> Nuevo Alumno</h1>
    </div>

    <!-- FORM STARTS HERE -->
    <form method="POST" action="/alumnos" novalidate>

        <div class="form-group">
            <label for="nombre">Nombre<small> (Texto)</small></label>
            <input type="text" id="nombre" class="form-control" name="nombre" placeholder="nombre" value="{{ \Illuminate\Support\Facades\Input::old('nombre') }}">
            @if ($errors->has('nombre')) <p class="help-block">{{ $errors->first('nombre') }}</p> @endif
        </div>

        <div class="form-group">
            <label for="apellidos">Apellidos<small> (Texto)</small></label>
            <input type="text" id="apellidos" class="form-control" name="apellidos" placeholder="apellidos" value="{{ \Illuminate\Support\Facades\Input::old('apellidos') }}">
            @if ($errors->has('apellidos')) <p class="help-block">{{ $errors->first('apellidos') }}</p> @endif
        </div>

        <div class="form-group">
            <label for="email">Email<small> (email)</small></label>
            <input type="email" id="email" class="form-control" name="email" placeholder="email" value="{{ \Illuminate\Support\Facades\Input::old('email') }}">
            @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
        </div>

        <div class="form-group">
            <label for="telefono">Telefono<small> (Sólo digitos)</small></label>
            <input type="tel" id="telefono" class="form-control" name="telefono" placeholder="telefono" value="{{ \Illuminate\Support\Facades\Input::old('telefono') }}">
            @if ($errors->has('telefono')) <p class="help-block">{{ $errors->first('telefono') }}</p> @endif
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <button type="submit" class="btn btn-success">Enviar</button>

    </form>

</div>

@stop

@section('footer')
    @parent

    <script>
        $(document).ready(function(){
            $("#itemcuatro").addClass("active");
        });
    </script>

@stop
@extends('layouts.pagina')

@section('header')
    @parent

    <title>Editar usuario</title>

    @stop


    @section('pagina')

    <div class="ancho">

        <div class="col-md-8 col-md-offset-2 separacion">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Usuario</div>
                <div class="panel-body">
        {{ Form::model($alumno, array('route' => array('alumnoscursos.update', $alumno->id), 'method' => 'PUT')) }}

        <div class="form-group">
            {{ Form::label('nombre', 'Nombre') }}
            {{ Form::text('nombre', \Illuminate\Support\Facades\Input::old('nombre'), array('class' => 'form-control', 'placeholder' => 'Tu Nombre')) }}
            @if ($errors->has('nombre')) <p class="help-block">{{ $errors->first('nombre') }}</p> @endif
        </div>

        <div class="form-group">
            {{ Form::label('apellidos', 'Apellidos') }}
            {{ Form::text('apellidos', \Illuminate\Support\Facades\Input::old('apellidos'), array('class' => 'form-control', 'placeholder' => 'Tus Apellidos')) }}
            @if ($errors->has('apellidos')) <p class="help-block">{{ $errors->first('apellidos') }}</p> @endif
        </div>

        <div class="form-group">
            {{ Form::label('telefono', 'Teléfono') }}
            {{ Form::text('telefono', \Illuminate\Support\Facades\Input::old('telefono'), array('class' => 'form-control', 'placeholder' => 'Tu Teléfono')) }}
            @if ($errors->has('telefono')) <p class="help-block">{{ $errors->first('telefono') }}</p> @endif
        </div>

        <div class="form-group">
            {{ Form::label('camara', 'Cámara') }}
            {{ Form::text('camara', \Illuminate\Support\Facades\Input::old('camara'), array('class' => 'form-control', 'placeholder' => 'Tu Cámara')) }}
            @if ($errors->has('camara')) <p class="help-block">{{ $errors->first('camara') }}</p> @endif
        </div>

        {{ Form::submit('Enviar', array('class' => 'btn btn-default')) }}

        {{ Form::close() }}

                    </div>
                </div>
            </div>

    </div>

@stop

@section('footer')
    @parent


@stop
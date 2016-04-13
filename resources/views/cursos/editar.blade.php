@extends('layouts.menu')

@section('header')
    @parent

    <title>Editar Curso</title>

@stop

@section('pagina')
    <div class="col-sm-8 col-sm-offset-2">

        <div class="page-header">
            <h1><span class="glyphicon glyphicon-edit"></span> Edit {{ $curso->categoria }}</h1>
        </div>

        {{ Form::model($curso, array('route' => array('cursos.update', $curso->id), 'method' => 'PUT')) }}

        <div class="form-group">
            {{ Form::label('categoria', 'Categoria') }}
            {{ Form::select('categoria', array('Fotografía' => 'Fotografía', 'Photoshop' => 'Photoshop', 'Niños' => 'Niños'), null, array('class' => 'form-control')) }}
            @if ($errors->has('categoria')) <p class="help-block">{{ $errors->first('categoria') }}</p> @endif
        </div>

        <div class="form-group">
            {{ Form::label('numMax', 'Número Máximo') }}
            <!--{ { Form::text('numMax', null, array('class' => 'form-control')) }}-->
            {{ Form::text('numMax', \Illuminate\Support\Facades\Input::old('numMax'), array('class' => 'form-control')) }}
            @if ($errors->has('numMax')) <p class="help-block">{{ $errors->first('numMax') }}</p> @endif
        </div>

        <div class="form-group">
            {{ Form::label('numMin', 'Número Mínimo') }}
            {{ Form::text('numMin', null, array('class' => 'form-control')) }}
            @if ($errors->has('numMin')) <p class="help-block">{{ $errors->first('numMin') }}</p> @endif
        </div>

        <div class="form-group">
            {{ Form::label('fechaInicio', 'Fecha Inicio') }}
            {{ Form::text('fechaInicio', null, array('class' => 'form-control')) }}
            @if ($errors->has('fechaInicio')) <p class="help-block">{{ $errors->first('fechaInicio') }}</p> @endif
        </div>

        {{ Form::submit('Editar el curso', array('class' => 'btn btn-success')) }}

        {{ Form::close() }}

    </div>
@stop

@section('footer')
    @parent


@stop
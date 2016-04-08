
@extends('layouts.menu')

@section('header')
    @parent

    <title>Listado Alumnos del Curso</title>
    <style>
        .trlistado{ cursor: pointer; }
    </style>

@stop

@section('pagina')

    <div class="col-sm-8 col-sm-offset-2">

        <div class="page-header">
            <h1><span class="glyphicon glyphicon-th-list"></span> Listado de los Alumnos del Curso: {{ $curso->categoria }}</h1>
        </div>

        <div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Quitar</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($lista as $alumno)
                    <tr class="trlistado">
                        <td>{{ $alumno->nombre }}</td>
                        <td>{{ $alumno->apellidos }}</td>
                        <td>{{ $alumno->email }}</td>
                        <td>{{ $alumno->telefono }}</td>
                        <td>
                            {{ Form::open(array('route' => array('alumnoscursos.destroy', $curso->id), 'method' => 'delete')) }}
                            <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> Quitar</button>
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>


    </div>

@stop

@section('footer')
    @parent

@stop
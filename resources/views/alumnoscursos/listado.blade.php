
@extends('layouts.menu')

@section('header')
    @parent

    <title>Listado Alumnos del Curso</title>
@stop

@section('pagina')

    <div class="col-sm-8 col-sm-offset-2">

        <div class="page-header">
            <h1><span class="glyphicon glyphicon-th-list"></span> Listado de los Alumnos del Curso: {{ $curso->categoria }}<small> {{ $curso->fechaInicio }}</small></h1>
            <h3>Alumnos inscritos: {{ $numAlumnos }}, Número mínimo: {{ $curso->numMin }}, Número máximo: {{ $curso->numMax }}</h3>
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
                    <tr>
                        <td>{{ $alumno->nombre }}</td>
                        <td>{{ $alumno->apellidos }}</td>
                        <td>{{ $alumno->email }}</td>
                        <td>{{ $alumno->telefono }}</td>
                        <td>
                            {{ Form::open(array('route' => array('alumnoscursos.destroy', $curso->id."|".$alumno->id."|0"), 'method' => 'delete')) }}
                            <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> Quitar</button>
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach

                <tr>
                    <td>-</td>
                    <td>-</td>
                    <td>Lista de Espera</td>
                    <td>-</td>
                    <td>-</td>
                </tr>

                @for($i=0;$i< count($espera); $i++)
                    <tr>
                        <td>{{ $espera[$i]->nombre }}</td>
                        <td>{{ $espera[$i]->apellidos }}</td>
                        <td>{{ $espera[$i]->email }}</td>
                        <td>{{ $espera[$i]->telefono }}</td>
                        <td>
                            {{ Form::open(array('route' => array('alumnoscursos.destroy', $curso->id."|".$espera[$i]->id."|1"), 'method' => 'delete')) }}
                            <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> Quitar</button>
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endfor

                </tbody>
            </table>
        </div>


    </div>

@stop

@section('footer')
    @parent

@stop
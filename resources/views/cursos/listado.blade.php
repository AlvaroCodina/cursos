@extends('layouts.menu')

@section('header')
    @parent

    <title>Listado de Cursos</title>
    <style>
        .trlistado{ cursor: pointer; }
    </style>

@stop

@section('pagina')

    <div class="col-sm-8 col-sm-offset-2">

        <div class="page-header">
            <h1><span class="glyphicon glyphicon-th-list"></span> Listado de Cursos</h1>
        </div>

        <div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Categoria</th>
                    <th>Número Máximo</th>
                    <th>Número Mínimo</th>
                    <th>Fecha Inicio</th>
                    <th>Ver Alumnos</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
                </thead>
                <tbody>

                    @foreach ($cursos as $curso)
                    <tr id="fila{{ $curso->id }}" onclick="datos(this);" class="trlistado">
                        <td>{{ $curso->categoria }}</td>
                        <td>{{ $curso->numMax }}</td>
                        <td>{{ $curso->numMin }}</td>
                        <td>{{ $curso->fechaInicio }}</td>
                        <td>
                            {{ Form::open(array('route' => array('alumnoscursos.show', $curso->id), 'method' => 'get')) }}
                            <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-list"></span> Ver alumnos</button>
                            {{ Form::close() }}
                        </td>
                        <td>
                            {{ Form::open(array('route' => array('cursos.edit', $curso->id), 'method' => 'get')) }}
                            <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Editar</button>
                            {{ Form::close() }}
                        </td>
                        <td>
                            {{ Form::open(array('route' => array('cursos.destroy', $curso->id), 'method' => 'delete')) }}
                            <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> Borrar</button>
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

    <script>

        $(document).ready(function(){
            $("#itemtres").addClass("active");
        });

        function datos(dts){
            var str = dts.id;
            var res = str.substring(4);
            window.location.replace("/cursos/" + res);
        }

    </script>

@stop

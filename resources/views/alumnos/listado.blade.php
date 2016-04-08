
    @extends('layouts.menu')

    @section('header')
        @parent

        <title>Listado Alumnos</title>
        <style>
            .trlistado{ cursor: pointer; }
        </style>

    @stop

    @section('pagina')

    <div class="col-sm-8 col-sm-offset-2">

        <div class="page-header">
            <h1><span class="glyphicon glyphicon-th-list"></span> Listado de Alumnos</h1>
        </div>

        <div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Ver cursos del alumno</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($alumnos as $alumno)
                    <tr id="fila{{ $alumno->id }}" onclick="datos(this);" class="trlistado">
                        <td>{{ $alumno->nombre }}</td>
                        <td>{{ $alumno->apellidos }}</td>
                        <td>{{ $alumno->email }}</td>
                        <td>{{ $alumno->telefono }}</td>
                        <td>
                            {{ Form::open(array('route' => array('alumnoscursos.show', $alumno->id), 'method' => 'get')) }}
                            <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-list"></span> Ver alumnos</button>
                            {{ Form::close() }}
                        </td>
                        <td>
                            {{ Form::open(array('route' => array('alumnos.edit', $alumno->id), 'method' => 'get')) }}
                            <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Editar</button>
                            {{ Form::close() }}
                        </td>
                        <td>
                            {{ Form::open(array('route' => array('alumnos.destroy', $alumno->id), 'method' => 'delete')) }}
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
                $("#itemcinco").addClass("active");
            });

            function datos(dts){
                var str = dts.id;
                var res = str.substring(4);
                window.location.replace("/alumnos/" + res);
            }


        </script>

    @stop


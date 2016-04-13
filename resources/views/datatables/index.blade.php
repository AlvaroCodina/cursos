@extends('layouts.menu')

@section('header')
    @parent

    <title>DataTables</title>

@stop

@section('pagina')

    <div class="col-sm-8 col-sm-offset-2">

        <div class="page-header">
            <h1><span class="glyphicon glyphicon-th-list"></span> Listado de Cursos</h1>
        </div>

        <div>
            <table class="table table-striped" id="users-table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Categoria</th>
                        <th>Num Max</th>
                        <th>Num Min</th>
                        <th>Fecha Inicio</th>
                        <th>Ver alumnos</th>
                        <th>Editar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
            </table>
        </div>

    </div>

@stop

@section('footer')
    @parent

    <script>
        $(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('datatables.data') !!}',
                columns: [
                    { data: 'id', name: 'id', visible: false },
                    { data: 'categoria', name: 'categoria' },
                    { data: 'numMax', name: 'numMax' },
                    { data: 'numMin', name: 'numMin' },
                    { data: 'fechaInicio', name: 'fechaInicio' },
                    { "render": function () {
                        return "<form action='/alumnoscursos/ID' method='GET'><button type='submit' class='btn btn-info'><span class='glyphicon glyphicon-list'></span> Ver alumnos</button></form>";
                    } },
                    { "render": function () {
                        return "<form action='/alumnoscursos/ID/edit' method='PUT'><button type='submit' class='btn btn-warning'><span class='glyphicon glyphicon-edit'></span> Editar</button></form>";
                    } },
                    { "render": function () {
                        return "<form action='/alumnoscursos/ID' method='DELETE'><button type='submit' class='btn btn-danger'><span class='glyphicon glyphicon-remove-sign'></span> Borrar</button></form>";
                    } },
                ]
            });
        });
    </script>

@stop

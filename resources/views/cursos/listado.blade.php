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




            <table class="table table-bordered" id="users-table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Updated At</th>
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
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' }
                ]
            });
        });

        $(document).ready(function(){
            $("#itemtres").addClass("active");
        });

    </script>

@stop

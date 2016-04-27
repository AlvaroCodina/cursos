@extends('layouts.menu')

@section('header')
    @parent

    <title>Alumnos</title>

@stop

@section('pagina')

    <div class="col-sm-8 col-sm-offset-2">

        <div class="page-header">
            <h1 id="nuevoalumno" class="gris"> @if($alumno) <span class="glyphicon glyphicon-edit"></span> Edit {{ $alumno->nombre }} @else <span class="glyphicon glyphicon-share"></span> Nuevo Alumno @endif </h1>
        </div>

        <div id="nuevo">
            @if($alumno)
                {{ Form::model($alumno, array('route' => array('alumnos.update', $alumno->id), 'method' => 'PUT')) }}
            @else
                {{ Form::model(array('route' => array('alumnos.todo'), 'method' => 'POST')) }}
            @endif

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
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email', \Illuminate\Support\Facades\Input::old('email'), array('class' => 'form-control', 'placeholder' => 'Tu Email')) }}
                @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
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

    @include('datatables.listadoAlumnos')

@stop



@section('footer')
    @parent

    <script>
        $(document).ready(function(){
            $("#itemtres").addClass("active");

            $("#nuevoalumno").click(function(){
                if($("#nuevo").css("display")=="none"){
                    $("#nuevo").show();
                } else{
                    $("#nuevo").hide();
                }
            });

            $("#listado").click(function(){
                if($("#ver").css("display")=="none"){
                    $("#ver").show();
                } else{
                    $("#ver").hide();
                }
            });

            $(function() {
                $('#alumnos-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!!route('datatablesAlumnos.data') !!}',
                    //ajax: 'datatables/dataAl',
                    columns: [
                        { data: 'nombre', name: 'nombre' },
                        { data: 'apellidos', name: 'apellidos' },
                        { data: 'email', name: 'email' },
                        { data: 'telefono', name: 'telefono' },
                        { data: 'camara', name: 'camara' },
                        {
                            data: "id",
                            "render": function (data) {
                                return "<form action='/alumnoscursos/" + data + "' method='GET'><button type='submit' class='btn btn-info'><span class='glyphicon glyphicon-list'></span> Ver Cursos</button></form>";
                            } },
                        {
                            data: "id",
                            "render": function (data) {
                                return "<form action='/alumnos/" + data + "/edit' method='PUT'><button type='submit' class='btn btn-warning'><span class='glyphicon glyphicon-edit'></span> Editar</button></form>";
                            } },
                        {
                            data: "id",
                            "render": function (data) {
                                return "<form action='/alumnos/" + data + "' method='DELETE'><button type='submit' class='btn btn-danger'><span class='glyphicon glyphicon-remove-sign'></span> Borrar</button></form>";
                            } },
                    ]
                });
            });

        });


    </script>



@stop

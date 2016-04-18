@extends('layouts.menu')

@section('header')
    @parent

    <title>Cursos</title>

@stop

@section('pagina')

    <div class="col-sm-8 col-sm-offset-2">

        <div class="page-header">
            <h1 id="nuevocurso" class="gris"> @if($curso) <span class="glyphicon glyphicon-edit"></span> Edit {{ $curso->categoria }} @else <span class="glyphicon glyphicon-share"></span> Nuevo Curso @endif </h1>
        </div>

        <div id="nuevo">
        @if($curso)
            {{ Form::model($curso, array('route' => array('cursos.update', $curso->id), 'method' => 'PUT')) }}
        @else
            {{ Form::model(array('route' => array('cursos.todo'), 'method' => 'POST')) }}
        @endif

        <div class="form-group">
            {{ Form::label('categoria', 'Categoria') }}
            {{ Form::select('categoria', array('Fotografía' => 'Fotografía', 'Photoshop' => 'Photoshop', 'Niños' => 'Niños'), \Illuminate\Support\Facades\Input::old('categoria'), array('class' => 'form-control')) }}
            @if ($errors->has('categoria')) <p class="help-block">{{ $errors->first('categoria') }}</p> @endif
        </div>

        <div class="form-group">
            {{ Form::label('numMax', 'Número Máximo') }}
            {{ Form::text('numMax', \Illuminate\Support\Facades\Input::old('numMax'), array('class' => 'form-control', 'placeholder' => 'Número entre el 6 y el 15')) }}
            @if ($errors->has('numMax')) <p class="help-block">{{ $errors->first('numMax') }}</p> @endif
        </div>

        <div class="form-group">
            {{ Form::label('numMin', 'Número Mínimo') }}
            {{ Form::text('numMin', \Illuminate\Support\Facades\Input::old('numMin'), array('class' => 'form-control', 'placeholder' => 'Número entre el 4 y el 6')) }}
            @if ($errors->has('numMin')) <p class="help-block">{{ $errors->first('numMin') }}</p> @endif
        </div>

        <div class="form-group">
            {{ Form::label('fechaInicio', 'Fecha Inicio') }}
            {{ Form::text('fechaInicio', \Illuminate\Support\Facades\Input::old('fechaInicio'), array('class' => 'form-control', 'placeholder' => 'aaaa-mm-dd hh:mm:ss')) }}
            <!--<input type="datetime-local" id="fechaInicio" class="form-control" name="fechaInicio" step="1" value="{ { \Illuminate\Support\Facades\Input::old('fechaInicio') }}">-->
            @if ($errors->has('fechaInicio')) <p class="help-block">{{ $errors->first('fechaInicio') }}</p> @endif
        </div>

        {{ Form::submit('Enviar', array('class' => 'btn btn-default')) }}

        {{ Form::close() }}
        </div>


        @include('datatables.listadoCursos')


    </div>
@stop



@section('footer')
    @parent

    <script>
        $(document).ready(function(){
            $("#itemdos").addClass("active");

            $("#nuevocurso").click(function(){
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
                $('#cursos-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('datatables.data') !!}',
                    columns: [
                        { data: 'categoria', name: 'categoria' },
                        { data: 'fechaInicio', name: 'fechaInicio' },
                        { data: 'numMax', name: 'numMax' },
                        { data: 'numMin', name: 'numMin' },
                        {
                            data: "id",
                            "render": function (data) {
                                return "<form action='/alumnoscursos/" + data + "' method='GET'><button type='submit' class='btn btn-info'><span class='glyphicon glyphicon-list'></span> Ver alumnos</button></form>";
                            } },
                        {
                            data: "id",
                            "render": function (data) {
                                return "<form action='/cursos/" + data + "/edit' method='PUT'><button type='submit' class='btn btn-warning'><span class='glyphicon glyphicon-edit'></span> Editar</button></form>";
                            } },
                        {
                            data: "id",
                            "render": function (data) {
                                return "<form action='/cursos/" + data + "' method='DELETE'><button type='submit' class='btn btn-danger'><span class='glyphicon glyphicon-remove-sign'></span> Borrar</button></form>";
                            } },
                    ]
                });
            });

        });


    </script>



@stop

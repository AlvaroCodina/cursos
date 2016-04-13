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









        <div class="page-header">
            <h1 id="listado" class="gris"><span class="glyphicon glyphicon-th-list"></span> Listado de Cursos</h1>
        </div>

        <div id="ver">
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
            $("#itemdos").addClass("active");

            /*$("#nuevo").hide();
            $("#ver").hide();*/

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

            //$("#fechaInicio").value = "2016-04-13T17:45:00Z";
            //$("#fechaInicio").val(moment().format('YYYY-MM-DD[T]HH:mm'));


        });

        function datos(dts){
            var str = dts.id;
            var res = str.substring(4);
            window.location.replace("/cursos/" + res);
        }
    </script>

@stop

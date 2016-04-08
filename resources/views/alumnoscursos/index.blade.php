
@extends('layouts.menu')

@section('header')
    @parent

    <title>Listado Alumnos por Cursos</title>

@stop

@section('pagina')

    <div class="col-sm-8 col-sm-offset-2">

        <div class="page-header">
            <h1><span class="glyphicon glyphicon-th-list"></span> Listado de los Alumnos por Cursos </h1>
        </div>

        <div>

            @foreach ($cursos as $dts)
                <ul class="list-group">
                    <li class="list-group-item list-group-item-info"><b>{{ $dts->categoria }}</b> {{ $dts->fechaInicio }}</li>
                    <ul class="list-group">
                        @foreach ($alumnos as $alumno)
                            @if($dts->cursos_id == $alumno->cursos_id)
                                <li class="list-group-item">{{ $alumno->nombre }} {{ $alumno->apellidos }}</li>
                            @endif
                        @endforeach
                    </ul>
                </ul>
            @endforeach

        </div>

    </div>

@stop

@section('footer')
    @parent

    <script>
        $(document).ready(function(){
            $("#itemseis").addClass("active");
        });
    </script>

@stop
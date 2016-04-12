
    @extends('layouts.menu')

    @section('header')
        @parent

        <title>Nuevo Curso</title>

    @stop

    @section('pagina')

    <div class="col-sm-8 col-sm-offset-2">

        <div class="page-header">
            <h1><span class="glyphicon glyphicon-share"></span> Nuevo Curso</h1>
        </div>

        <!-- FORM STARTS HERE -->
        <form method="POST" action="/cursos" novalidate>

            <div class="form-group">
                <label for="categoria">Categoria<small> (Texto)</small></label>
                <select name="categoria" id="categoria" class="form-control" value="{{ \Illuminate\Support\Facades\Input::old('categoria') }}">
                    <option value="Fotografía">Fotografía</option>
                    <option value="Photoshop">Photoshop</option>
                    <option value="Niños">Niños</option>
                </select>
                @if ($errors->has('categoria')) <p class="help-block">{{ $errors->first('categoria') }}</p> @endif
            </div>

            <div class="form-group">
                <label for="numMax">Número Máximo<small> (Número entre el 6 y el 15)</small></label>
                <input type="text" id="numMax" class="form-control" name="numMax" placeholder="numMax" value="{{ \Illuminate\Support\Facades\Input::old('numMax') }}">
                @if ($errors->has('numMax')) <p class="help-block">{{ $errors->first('numMax') }}</p> @endif
            </div>

            <div class="form-group">
                <label for="numMin">Número Mínimo<small> (Número entre el 4 y el 6)</small></label>
                <input type="text" id="numMin" class="form-control" name="numMin" placeholder="numMin" value="{{ \Illuminate\Support\Facades\Input::old('numMin') }}">
                @if ($errors->has('numMin')) <p class="help-block">{{ $errors->first('numMin') }}</p> @endif
            </div>

            <div class="form-group">
                <label for="fechaInicio">Fecha Inicio<small> (Fecha y Hora)</small></label>
                <input type="datetime-local" id="fechaInicio" class="form-control" name="fechaInicio" step="1" value="{{ \Illuminate\Support\Facades\Input::old('fechaInicio') }}">
                @if ($errors->has('fechaInicio')) <p class="help-block">{{ $errors->first('fechaInicio') }}</p> @endif
            </div>

            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <button type="submit" class="btn btn-success">Enviar</button>

        </form>

    </div>
    @stop

    @section('footer')
        @parent

        <script>
            $(document).ready(function(){
                $("#itemdos").addClass("active");
            });
        </script>

    @stop

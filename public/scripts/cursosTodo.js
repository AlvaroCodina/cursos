/**
 * Created by alvaro on 14/04/16.
 */


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
            ajax: "{!! route('datatables.data') !!}",
            columns: [
                { data: 'id', name: 'id', visible: false },
                { data: 'categoria', name: 'categoria' },
                { data: 'numMax', name: 'numMax' },
                { data: 'numMin', name: 'numMin' },
                { data: 'fechaInicio', name: 'fechaInicio' },
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


<?php
/**
 * Created by PhpStorm.
 * User: alvaro
 * Date: 26/04/16
 * Time: 10:55
 */

if(isset($_POST["idCurso"])){
    dd($_POST["idCurso"]);
}

/*$idAlumnosCursos = DB::select("select id from alumnos_cursos where cursos_id=$idCurso and alumnos_id=$idAlumno");
$alumnoscursos = AlumnosCursos::find($idAlumnosCursos[0]->id);
$alumnoscursos->delete();
AlumnosCursos::CheckListaEspera($idCurso);*/
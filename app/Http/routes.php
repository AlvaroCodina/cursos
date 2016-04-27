<?php


Route::group(['middleware' => 'web'], function() {


    Route::resource('cursos', 'CursosController');
    Route::resource('alumnos', 'AlumnosController');

    Route::get('/', function () {
        return view('home');
    });

    Route::controller('datatables', 'DatatablesController', [
        'anyData' => 'datatables.data',
        'getIndex' => 'datatables',
    ]);

    Route::controller('datatablesAlumnos', 'DatatablesAlumnosController', [
        'anyData' => 'datatablesAlumnos.data',
        'getIndex' => 'datatablesAlumnos',
    ]);


    // Authentication routes...
    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', 'Auth\AuthController@logout');

    // Registration routes...
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@postRegister');

    Route::group(['middleware' => 'auth'], function () {

        Route::resource('alumnoscursos', 'AlumnosCursosController');
        Route::resource('listaespera', 'ListaEsperaController');

        Route::get('alumnoscursos/{id}/curso', function ($id) {
            return view('alumnoscursos.alumnoscursos')->with('id', $id);
        });

        Route::get('alumnoscursos/{id}/{fechaInicio}/checkDatos', 'AlumnosCursosController@checkDatos');
        Route::any('alumnoscursos/{id}/putCheckDatos', 'AlumnosCursosController@putCheckDatos');

    });

});




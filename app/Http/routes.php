<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::group(['middleware' => 'web'], function() {


    Route::resource('cursos', 'CursosController');
    Route::resource('alumnos', 'AlumnosController');
    //Route::resource('alumnoscursos', 'AlumnosCursosController');

    //Route::get('/','CursosController@index');
    Route::get('/', function () {
        return view('home');
    });

    Route::any('datatables/dataAl','DatatablesController@dataAl');

    Route::controller('datatables', 'DatatablesController', [

        'anyData' => 'datatables.data',     //Este SI va
        'getIndex' => 'datatables',
        //'dataAl' => 'datatables.dataAl',    //Este NO va
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

        //Route::get('alumnoscursos/{id}/curso', 'AlumnosCursosController@curso');
        Route::get('alumnoscursos/{id}/curso', function ($id) {
            return view('alumnoscursos.alumnoscursos')->with('id', $id);
        });

        Route::get('alumnoscursos/{id}/checkDatos', 'AlumnosCursosController@checkDatos');
        Route::any('alumnoscursos/{id}/putCheckDatos', 'AlumnosCursosController@putCheckDatos');    //No se usa
        /*Route::get('alumnoscursos/{id}/checkDatos', function ($id) {
            return view('alumnoscursos.rellenar')->with('id', $id);
        });*/

    });

});




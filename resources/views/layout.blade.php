<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cursos rIL</title>
    {!! Html::style('bootstrap/css/bootstrap.min.css') !!}
    {!! Html::style('bootstrap/css/bootstrap-theme.min.css') !!}
    {!! Html::style('styles/home.css') !!}
    <style>
        .usuario{
            color: white;
            font-size: 1.5em;;
            padding-right: 100px;;
        }
    </style>
</head>
<body>


<div class="row">

    <div class="col-lg-12 col-md-12 col-xs-12" id="fotohome">

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">rIL</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/">Home</a></li>
                    <li><a href="/cursos">Cursos</a></li>
                    <li><a href="/alumnos/create">Alumnos</a></li>
                    <li><a href="/alumnos">Listado</a></li>
                    <li><a href="/alumnoscursos">Listado AC</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">

                    @if (Auth::guest())
                        <li><a href="/auth/register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a href="/auth/login"><span class="glyphicon glyphicon-log-in"></span> Log in</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/auth/logout"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
                            </ul>
                        </li>
                    @endif


                </ul>
            </div>
        </nav>


        <h1 class="titulo text-center">Cursos rIL</h1>
        <h2 class="subtitulo text-center">Una descripción corta</h2>
    </div>
</div>

@yield('contenido')

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="footer">

    <div>
        <p class="descripcionfooter text-center">Footer cursos</p>
    </div>

</div>

<script src="https://code.jquery.com/jquery-2.2.2.min.js" integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI=" crossorigin="anonymous"></script>
{!! Html::script('bootstrap/js/bootstrap.min.js') !!}

</body>
</html>
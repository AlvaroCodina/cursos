<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cursos rIL</title>
    {!! Html::style('bootstrap/css/bootstrap.min.css') !!}
    {!! Html::style('bootstrap/css/bootstrap-theme.min.css') !!}
    {!! Html::style('styles/home.css') !!}
</head>
<body>

<nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0;">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Home</a></li>
                <li><a href="/cursos">Cursos</a></li>
                <li><a href="/alumnos">Alumnos</a></li>
                <li><a href="/alumnoscursos">Listado AC</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ URL::previous() }}"><span class="glyphicon glyphicon-menu-left"></span> Atrás</a></li>
                @if (Auth::guest())
                    <li id="signup"><a href="/auth/register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li id="login"><a href="/auth/login"><span class="glyphicon glyphicon-log-in"></span> Log in</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li id="logout"><a href="/auth/logout"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

    <div class="col-lg-12 col-md-12 col-xs-12" id="fotohome">
        <h1 class="titulo text-center">Cursos rIL</h1>
        <h2 class="subtitulo text-center">Una descripción corta</h2>
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
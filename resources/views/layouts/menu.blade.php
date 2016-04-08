
<!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @section('header')

            {!! Html::style('bootstrap/css/bootstrap.min.css') !!}
            {!! Html::style('bootstrap/css/bootstrap-theme.min.css') !!}
            {!! Html::style('styles/menus.css') !!}

        @show
    </head>
    <body>


    <div class="row">

        <div class="col-lg-12 col-md-12 col-xs-12 paddmenu">

                <nav class="navbar navbar-inverse">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#">rIL</a>
                        </div>
                        <ul class="nav navbar-nav">
                            <li id="itemuno"><a href="/">Home</a></li>
                            <li id="itemdos"><a href="/cursos/create">Cursos</a></li>
                            <li id="itemtres"><a href="/cursos">Listado</a></li>
                            <li id="itemcuatro"><a href="/alumnos/create">Alumnos</a></li>
                            <li id="itemcinco"><a href="/alumnos">Listado</a></li>
                            <li id="itemseis"><a href="/alumnoscursos">Listado AC</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
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
                </nav>
        </div>

        @yield('pagina')

    </div>

    @section('footer')

        <script src="https://code.jquery.com/jquery-2.2.2.min.js" integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI=" crossorigin="anonymous"></script>
        {!! Html::script('bootstrap/js/bootstrap.min.js') !!}

    @show

    </body>
</html>
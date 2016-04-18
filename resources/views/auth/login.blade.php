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


<ul class="navigation">
    <li class="nav-item"><a href="/"><div class="logo"></div></a></li>
    <!--<li class="nav-item"><a href="/">Inicio</a></li>-->
    @if (Auth::guest())
        <li class="nav-item"><a href="/auth/login">Log In</a></li>
        <li class="nav-item"><a href="/auth/register">Sign Up</a></li>
    @else
        <li class="nav-item"><a href="/alumnoscursos/">{{ Auth::user()->name }}</a></li>
        <li class="nav-item"><a href="/auth/logout">Log Out</a></li>
    @endif
</ul>

<input type="checkbox" id="nav-trigger" class="nav-trigger" />
<label for="nav-trigger"></label>





<div class="site-wrap">

    <div class="ancho">

        <div class="titulo text-center">
            <h1 class="tith1">Log In</h1>
            <h2 class="tith2">Un subtitulo</h2>
        </div>

    </div>


    <div class="ancho" id="contenido">

        <div class="text-center" style="padding-top: 50px;">
            <p class="parDec">Accede a tu portal</p>



            <div class="container separacion">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Login</div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                                    {!! csrf_field() !!}

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label class="col-md-4 control-label">E-Mail</label>

                                        <div class="col-md-6">
                                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label class="col-md-4 control-label">Contraseña</label>

                                        <div class="col-md-6">
                                            <input type="password" class="form-control" name="password">

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="remember"> Recuerdame
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="glyphicon glyphicon-log-in"></i> Login
                                            </button>

                                            <a class="btn btn-link" href="{{ url('/auth/register') }}">¿No tienes cuenta?</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>

    </div>



    <div class="footer" style="margin-top: 0px;">
        <p class="parFoo text-center">cddhvbhs vsdsvbsv sdvdbdj</p>
        <p class="text-center"><a class="parFoo" href="http://www.ril.es">www.ril.es</a></p>
    </div>

</div>

<script src="https://code.jquery.com/jquery-2.2.2.min.js" integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI=" crossorigin="anonymous"></script>
{!! Html::script('bootstrap/js/bootstrap.min.js') !!}

</body>
</html>

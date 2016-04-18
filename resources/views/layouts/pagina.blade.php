<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @section('header')
    {!! Html::style('bootstrap/css/bootstrap.min.css') !!}
    {!! Html::style('bootstrap/css/bootstrap-theme.min.css') !!}
    {!! Html::style('styles/home.css') !!}
    @show
</head>
<body>


<ul class="navigation">
    <li class="nav-item"><a href="/"><div class="logo"></div></a></li>
    @if (Auth::guest())
        <li class="nav-item"><a href="/auth/login">Log In</a></li>
        <li class="nav-item"><a href="/auth/register">Sign Up</a></li>
    @else
        <li class="nav-item"><a href="/alumnoscursos/">{{ Auth::user()->name }}</a></li>
        <li class="nav-item"><a href="/auth/logout">Log Out</a></li>
    @endif
    <li class="nav-item"><a href="/cursos/">No estará!!</a></li>
</ul>

<input type="checkbox" id="nav-trigger" class="nav-trigger" />
<label for="nav-trigger"></label>


<div class="site-wrap">

    @yield('pagina')


    <div class="footer">
        <p class="parFoo text-center">cddhvbhs vsdsvbsv sdvdbdj</p>
        <p class="text-center"><a class="parFoo" href="http://www.ril.es">www.ril.es</a></p>
    </div>

</div>

@section('footer')

    <script src="https://code.jquery.com/jquery-2.2.2.min.js" integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI=" crossorigin="anonymous"></script>
    {!! Html::script('bootstrap/js/bootstrap.min.js') !!}

@show

</body>
</html>
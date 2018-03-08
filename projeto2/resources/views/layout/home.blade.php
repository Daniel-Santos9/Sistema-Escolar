<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('titulo') </title>

    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/home2.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.modif.css')}}"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <![endif]-->
</head>

<body>
<div class="container">
    @if (Route::has('login'))
        <header class="row container">
            <nav class="navbar navbar-default nav-justified well-sm default ">
                <div class="container-fluid">
                    <div class="navbar-header">
                        @if(Auth::check())
                            <a class="navbar-brand" href="{{route('admin')}}"><img src="{{asset('/img/logo.png')}}" class="img-responsive-mod"></a>
                        @else
                            <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('/img/logo.png')}}" class="img-responsive-mod"></a>
                        @endif
                    </div>
                    <ul class="nav navbar-nav">
                        @if(Auth::check())
                            <li class="active"><a href={{route('admin')}}> Home </a></li>
                        @else
                            <li class="active"><a href={{route('home')}}> Home </a></li>
                        @endif
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Cadastro <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href={{route('usuario.create')}}>Usuário</a></li>
                                <li><a href={{route('turma.create')}}>Turma</a></li>
                                <li><a href={{route('disciplina.create')}}>Disciplina</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Controle <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href={{route('usuario.show')}}>Usuário</a></li>
                                <li><a href={{route('turma.show')}}>Turma</a></li>
                                <li><a href={{route('disciplina.show')}}>Disciplina</a></li>
                            </ul>
                        </li>

                        <li><a href="#">Configurações</a></li>
                    </ul>
                        @if(Auth::check())
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="{{route('usuario.edit', Auth::user()->id) }}"><span class="glyphicon glyphicon-user"></span> {{Auth::user()->name}} </a></li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <span class="glyphicon glyphicon-log-in"></span> Sair
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        @else
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-user"></span> Logar </a></li>
                            </ul>
                        @endif
                </div>
            </nav>
        </header>
    @endif

    <div class="row">
        @yield('conteudo')
    </div>

    <footer class="container welld navbar navbar-default" style="color:#000;">
        <div class="container">
            <div class="row col-md-5 pull-left"> &reg; copyright E.E.I.F Amiguinhos da Infância 2016-{{date('Y')}}. </div>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</div>
</body>
</html>
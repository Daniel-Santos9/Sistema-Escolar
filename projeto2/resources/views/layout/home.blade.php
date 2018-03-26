<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('titulo') </title>

    <link href="{{ asset('css/bootstrap-theme.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.modif.css')}}"/>

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-notify.min.js') }}"></script>

    <script>

        $(document).ready(function() {

            $('#nis').mask('999.99999.99-9');
            $('#rg').mask('9999999999-9');
            $('#numero').mask('99999');
            $('#cep').mask('99999-999');
            $('#ano').mask('9999');
            $('#ch').mask('999');
            $('#nascimento').mask('99/99/9999');
            $('.nota').mask('99,99');
        });
    </script>
    
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
                                <li><a href={{route('aluno.create')}}>Aluno</a></li>
                                <li><a href={{route('nota.create')}}>Nota</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Controle <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href={{route('usuario.show')}}>Usuário</a></li>
                                <li><a href={{route('turma.show')}}>Turma</a></li>
                                <li><a href={{route('disciplina.show')}}>Disciplina</a></li>
                                <li><a href={{route('aluno.show')}}>Aluno</a></li>
                                <li><a href="#">Nota</a></li>
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

    <script src="{{ asset('js/app.js') }}"></script>
</div>
</body>
</html>
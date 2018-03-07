@extends('layout.home')

@section('titulo','Home Usuário')

@section('conteudo')

   <div class="col-md-3"></div>
    
    <a href="{{route('turma.create')}}" style="text-decoration: none; font-weight: bold;" >
        <div class="col-md-3">
            <div class="panel panel-primary" align="center">
                <div class="panel-heading">Cadastrar Turma</div>
                <div class="panel-body" style="text-align: center;">
                    <i class="glyphicon glyphicon-plus" style = "font-size: 50px"></i>
                </div>
            </div>
        </div>
    </a>

 
    <a href="{{route('disciplina.create')}}" class="" style="text-decoration: none; font-weight: bold;">
        <div class="col-md-3">
            <div class="panel panel-primary" align="center">
                <div class="panel-heading">Cadastrar Disciplina</div>
                <div class="panel-body" style="text-align: center;">
                    <i class="glyphicon glyphicon-plus" style = "font-size: 50px"></i>
                </div>
            </div>
        </div>
    </a>
    <div class="col-md-3"></div>
    <!--fim do Cadastrar Agente e Curso-->

    <div class="row"></div>
    
    <!--Pesquisar Agente e Curso-->
    <div class="col-md-3"></div>
    <a href="{{route('turma.show')}}" style="text-decoration: none; font-weight: bold;" >
        <div class="col-md-3">
            <div class="panel panel-primary" align="center">
                <div class="panel-heading">Procurar Turmas</div>
                <div class="panel-body" style="text-align: center;">
                    <i class="glyphicon glyphicon-search" style = "font-size: 50px"></i>
                </div>
            </div>
        </div>
    </a>

 
    <a href="{{route('disciplina.show')}}" style="text-decoration: none; font-weight: bold;">
        <div class="col-md-3">
            <div class="panel panel-primary" align="center">
                <div class="panel-heading">Procurar Disciplinas</div>
                <div class="panel-body" style="text-align: center;">
                    <i class="glyphicon glyphicon-search" style = "font-size: 50px"></i>
                </div>
            </div>
        </div>
    </a>
    <!--Fim do Pesquisar Agente e Curso-->

@endsection
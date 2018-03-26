@extends('layout.home')

@section('conteudo')
    <div class="col-md-1"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <div class="panel panel-primary">
                    <div class="panel-heading">Alunos</div>
                    <div class="panel-body">
                        <div class="row col-md-12">

                            @include('layout.flash')

                          <form method="GET" action="{{route('aluno.show')}}">
                            <div class="form-group">
                                <div class="input-group col-md-5">
                                    <input type="text" class="form-control col-md-5" name="pesquisa" value="{{old('pesquisa','')}}" id="pesquisa" placeholder="Pesquisa" />
                                    <div class="input-group-btn">
                                        <button class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                                    </div>

                                </div>   
                          </form>

                            @if(empty($alunos))
                                    <div class="alert alert-danger btn-lg col-md-10 danger">
                                        Nenhum aluno foi encontrado.
                                    </div>
                            @else        

                                <table class="table table-striped">
                                    <thead>
                                        <div class="col col-xs-12 text-right">
                                            <a href="{{route('aluno.create')}}" >
                                                <button type="button" class="btn btn-sm btn-success btn-create">
                                                    <span class="glyphicon glyphicon-plus"></span> Alunos
                                                </button>
                                            </a>
                                        </div>
                                        <div class=" col-md-2">
                                            <div class="form-group"></div>
                                        </div>
                                        
                                        
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>RG</th>
                                            <th>Pai</th>
                                            <th>Mãe</th>
                                            <th class="text-center">Ação</th>
                                        </tr>
                                    </thead>

                                    @foreach($alunos as $aluno)
                                        <tr>
                                            <th>{{$aluno->id}}</th>
                                            <td>{{$aluno->nome}}</td>
                                            <td>{{$aluno->rg}}</td>
                                            <td>{{$aluno->pais->nome_pai}}</td>
                                            <td>{{$aluno->pais->nome_mae}}</td>

                                            
                                            <td class="text-center">

                                                <a class="btn btn-primary btn-sm" href="{{route('aluno.edit', $aluno->id) }}" class="btn btn-info btn-lg">
                                                    <span class="glyphicon glyphicon-pencil"></span> Editar
                                                </a>
                                        
                                                <a onclick="return confirm('Deseja excluir esse registro?')" href="{{route('aluno.delete', $aluno->id) }}" class="btn btn-danger btn-sm">
                                                    <span class="glyphicon glyphicon-remove" ></span> 
                                                    Excluir
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

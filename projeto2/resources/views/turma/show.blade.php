@extends('layout.home')

@section('titulo','Controle de Turmas')

@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <div class="panel panel-default">
                    <div class="panel-heading">Controle de Turmas</div>
                    <div class="panel-body">
                        <div class="row col-md-12 col-md-offset-0 custyle">

                            @if(session('inser') == true)
                                <div class="alert alert-success col-md-10 col-md-offset-1">
                                    <strong>Sucesso!</strong>
                                    A turma {{ old("serie") }} foi adicionada.
                                </div>
                            @elseif(session('update') == true)
                                <div class="alert alert-success col-md-10 col-md-offset-1">
                                    <strong>Sucesso!</strong>
                                    A Turma {{ old("serie") }} foi atualizada.
                                </div>
                            @elseif(session('delete')==true)
                                <div class="alert alert-success col-md-10 col-md-offset-1">
                                    <strong>Sucesso!</strong>
                                    A Turma {{ old("serie") }} foi removida.
                                </div>
                            @endif

                            @if(empty($turmas))
                                <div class="alert alert-danger btn-lg col-md-10 col-md-offset-1 danger">
                                    Você não possui nenhuma Turma cadastrada.
                                </div>
                            @else
                                <table class="table table-striped bunitu">
                                    <form method="GET" action="{{route('turma.show')}}" role="search">
                                        <div class="form-group">
                                            <div class="input-group col-md-4">
                                                <input type="text" class="form-control col-md-5" name="consulta" id="consulta" placeholder="consultar" type="text"/>
                                                <div class="input-group-btn">
                                                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="col col-xs-12 text-right">
                                        <a href="{{route('turma.create')}}" >
                                            <button type="button" class="btn btn-sm btn-primary btn-create">
                                                <span class="glyphicon glyphicon-plus"></span> Turma
                                            </button>
                                        </a>
                                    </div>
                                    <thead>
                                        <div class=" col-md-2">
                                            <div class="form-group"></div>
                                        </div>
                                        <tr >
                                            <th class="text-center">Série</th>
                                            <th class="text-center">Ano</th>
                                            <th class="text-center">Ação</th>
                                        </tr>
                                    </thead>
                                    @foreach($turmas as $turma)

                                        <tr >
                                            <td class="text-center">{{$turma->serie}}</td>
                                            <td class="text-center">{{$turma->ano}}</td>
                                            <td class="text-center">
                                                <a class='btn btn-info btn-xs' href="{{route('turma.edit', $turma->id) }}">
                                                    <span class="glyphicon glyphicon-edit"></span> Editar
                                                </a>
                                                <a onclick="return confirm('Deseja excluir esse registro?')" href="{{route('turma.delete', $turma->id) }}" class="btn btn-danger btn-xs">
                                                    <span class="glyphicon glyphicon-remove" ></span> Excluir
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
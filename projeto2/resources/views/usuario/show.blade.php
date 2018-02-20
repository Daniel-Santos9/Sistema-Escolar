@extends('layout.home')

@section('titulo','Controle de Usuários')

@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <div class="panel panel-default">
                    <div class="panel-heading">Controle de Usuários</div>
                    <div class="panel-body">
                        <div class="row col-md-12 col-md-offset-0 custyle">

                            @if(session('inser') == true)
                                <div class="alert alert-success col-md-10 col-md-offset-1">
                                    <strong>Sucesso!</strong>
                                    O Usuário {{ old("name") }} foi adicionado.
                                </div>
                            @elseif(session('update') == true)
                                <div class="alert alert-success col-md-10 col-md-offset-1">
                                    <strong>Sucesso!</strong>
                                    O Usuário {{ old("name") }} foi atualizado.
                                </div>
                            @elseif(session('delete')==true)
                                <div class="alert alert-success col-md-10 col-md-offset-1">
                                    <strong>Sucesso!</strong>
                                    O Usuário {{ old("name") }} foi removido.
                                </div>
                            @endif

                            @if(empty($usuarios))
                                <div class="alert alert-danger btn-lg col-md-10 col-md-offset-1 danger">
                                    Você não possui nenhum Usuário cadastrado.
                                </div>

                                <a href="{{route('usuario.create')}}" >
                                    <button type="button" class="btn btn-primary btn-lg btn-create col-md-3 col-md-offset-4">
                                        <span class="glyphicon glyphicon-plus"></span> Usuário
                                    </button>
                                </a>
                            @else
                                <table class="table table-striped bunitu">
                                    <thead>
                                    <div class="col col-xs-12 text-right">
                                        <a href="{{route('usuario.create')}}" >
                                            <button type="button" class="btn btn-sm btn-primary btn-create">
                                                <span class="glyphicon glyphicon-plus"></span> Usuário
                                            </button>
                                        </a>
                                    </div>
                                    <tr >
                                        <th class="text-center">Nome</th>
                                        <th class="text-center">E-mail</th>
                                        <th class="text-center">Ação</th>
                                    </tr>
                                    </thead>
                                    @foreach($usuarios as $user)

                                        <tr >
                                            <td class="text-center">{{$user->name}}</td>
                                            <td class="text-center">{{$user->email}}</td>
                                            <td class="text-center">
                                                <a class='btn btn-info btn-xs' href="{{route('usuario.edit', $user->id) }}">
                                                    <span class="glyphicon glyphicon-edit"></span> Editar
                                                </a>
                                                <a onclick="return confirm('Deseja excluir esse registro?')" href="{{route('usuario.delete', $user->id) }}" class="btn btn-danger btn-xs">
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

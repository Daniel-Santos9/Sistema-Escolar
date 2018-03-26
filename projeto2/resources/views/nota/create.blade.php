@extends('layout.home')

@section('titulo','Cadastrar Nota')

@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Cadastrar Nota</div>
                    <div class="panel-body">
                        <form class="form-horizontal col-md-10 col-md-offset-1" role="form" action="{{route('disciplina.store')}}" method="post">

                            <div class="form-group {{ $errors->has('turma') ? ' has-error' : '' }}">
                                <label for="turma" class="col-md-4 control-label">Turma:</label>
                                <div class="col-md-3">
                                    <select class="form-control" data-live-search="true" id="turma" name="turma">
                                        <option data-tokens="ketchup mustard" value="-1" selected >Selecione...</option>
                                        @foreach($turmas as $turma)
                                            @if(old('turma') == $turma->id)
                                                <option data-tokens="ketchup mustard" value="{{$turma->id}}" selected >{{$turma->nome}}" </option>
                                            @endif
                                            <option data-tokens="ketchup mustard" value="{{$turma->id}}">{{$turma->nome}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('turma'))
                                        <span class="help-block">
                                             <strong>{{ $errors->first('turma') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('disciplina') ? ' has-error' : '' }}">
                                <label for="disciplina" class="col-md-4 control-label">Turma:</label>
                                <div class="col-md-3">
                                    <select class="form-control" data-live-search="true" id="disciplina" name="disciplina">
                                    </select>

                                    @if ($errors->has('disciplina'))
                                        <span class="help-block">
                                             <strong>{{ $errors->first('disciplina') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                                <table class="table table-striped bunitu">
                                    <form method="GET" action="{{route('nota.create')}}" role="search">
                                        <div class="form-group">
                                            <div class="input-group col-md-4">
                                                <input type="text" class="form-control col-md-5" name="pesquisa" id="pesquisa" placeholder="Pesquisar" type="text"/>
                                                <div class="input-group-btn">
                                                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <thead>
                                        <div class=" col-md-2">
                                            <div class="form-group"></div>
                                        </div>
                                        <tr >
                                            <th class="text-center">Nome</th>
                                            <th class="text-center">RG</th>
                                            <th class="text-center">Nota</th>
                                        </tr>
                                    </thead>


                                            <tr >
                                                <td class="text-center">PEDRO JORGE</td>
                                                <td class="text-center">2011874596-7</td>
                                                <td class="text-center"> 
                                                    <input type="text" class="nota" name="nota[]" maxlength="5">
                                                </td>
                                            </tr>

                                </table>

                            <div class="form-group col-md-10">
                                <button type="submit" class="control-label btn btn-primary">Cadastrar</button>
                                <a class="control-label btn btn-danger" href="{{route('admin')}}">Cancelar</a>
                                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@extends('layout.home')

@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Cadastrar Usuário</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('turma.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="nome" class="col-md-4 control-label">Turma: </label>

                                <div class="col-md-6">
                                    <select name="serie">
                                        <option option="9">9º ano</option>
                                        <option option="8">8º ano</option>
                                        <option option="7">7º ano</option>
                                        <option option="6">6º ano</option>
                                        <option option="5">5º ano</option>
                                        <option option="4">4º ano</option>
                                        <option option="3">3º ano</option>
                                        <option option="2">2º ano</option>
                                        <option option="1">1º ano</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nome" class="col-md-4 control-label">Status: </label>

                                <div class="col-md-6">
                                    <select name="Status">
                                        <option>A</option>
                                        <option>B</option>
                                        <option>C</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                 <label for="email" class="col-md-4 control-label">Turno </label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="Turno" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                  <label for="email" class="col-md-4 control-label">Ano</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="Turno" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Cadastrar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

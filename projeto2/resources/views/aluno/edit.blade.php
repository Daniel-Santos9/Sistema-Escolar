@extends('layout.home')

@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Atualizar Dados do Aluno: {{$aluno->nome}}</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="post" action="{{ route('aluno.update',$aluno->id) }}">

                            <!-- Text input-->
                            <div class="form-group col-md-4">
                                <label class="control-label">DADOS PESSOAIS</label><br>
                            </div>

                            <div class="form-group">
                                <label class="control-label"></label><br>
                            </div>

                            <div class="form-group col-md-7 {{ $errors->has('nome') ? ' has-error' : '' }}">
                                <label for="nome" class="col-md-2 control-label">Aluno: </label>

                                <div class="col-md-10">
                                    <input id="nome" type="text" class="form-control" name="nome" value="{{ $aluno->nome }}" >

                                    @if ($errors->has('nome'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-5 {{ $errors->has('nascimento') ? ' has-error' : '' }}">
                                <label for="nascimento" class="col-md-4 control-label">Nascimento: </label>

                                <div class="col-md-8">
                                    <input id="nascimento" type="text" value="{{$aluno->nascimento}}" class="form-control" name="nascimento">

                                    @if ($errors->has('nascimento'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nascimento') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-7 {{ $errors->has('rg') ? ' has-error' : '' }}">
                                <label for="rg" class="col-md-2 control-label">RG: </label>

                                <div class="col-md-8">
                                    <input id="rg" maxlength="12" type="tex" class="form-control" name="rg" value="{{ $aluno->rg }}">

                                    @if ($errors->has('rg'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('rg') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-5 {{ $errors->has('nis') ? ' has-error' : '' }}">
                                <label for="nis" class="col-md-4 control-label">NIS: </label>

                                <div class="col-md-8">
                                    <input id="nis" maxlength="14" value="{{$aluno->nis}}" type="text" class="form-control" name="nis">

                                    @if ($errors->has('nis'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nis') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label"></label><br>
                            </div>
                            <hr>
                            
                            <div class="form-group col-md-4">
                                <label class="control-label">DADOS DOS PAIS</label><br>
                            </div>
                            <div class="form-group">
                                <label class="control-label"></label><br>
                            </div>

                            <div class="form-group col-md-6 {{ $errors->has('nome_mae') ? ' has-error' : '' }}">
                                <label for="nome_mae" class="col-md-2 control-label">Mãe: </label>

                                <div class="col-md-10">
                                    <input id="nome_mae" type="text" class="form-control" name="nome_mae" value="{{ $aluno->pais->nome_mae }}">

                                    @if ($errors->has('nome_mae'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nome_mae') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6 {{ $errors->has('nome_pai') ? ' has-error' : '' }}">
                                <label for="nome_pai" class="col-md-2 control-label">Pai: </label>

                                <div class="col-md-10">
                                    <input id="nome_pai" type="text" class="form-control" name="nome_pai" value="{{ $aluno->pais->nome_pai }}">

                                    @if ($errors->has('nome_pai'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nome_pai') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label"></label><br>
                            </div>
                            <hr>
                            
                            <div class="form-group col-md-4">
                                <label class="control-label">ENDEREÇO</label><br>
                            </div>
                            <div class="form-group">
                                <label class="control-label"></label><br>
                            </div>

                          <div class="form-group col-md-8 {{ $errors->has('cidade') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label" for="cidade">Cidade:</label>
                                <div class="col-md-10">
                                    <input id="cidade" name="cidade" value="{{ $aluno->pais->endereco->cidade }}" class="form-control input-md" type="text">
                                </div>

                                @if ($errors->has('cidade'))
                                    <span class="help-block">
                                         <strong>{{ $errors->first('cidade') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-4 {{ $errors->has('cep') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label" for="cep">CEP:</label>
                                <div class="col-md-8">
                                    <input id="cep" name="cep" placeholder="63400-000" value ="{{ $aluno->pais->endereco->cep }}" maxlength="9" class="form-control input-md" type="text">
                                </div>

                                @if ($errors->has('cep'))
                                    <span class="help-block">
                                         <strong>{{ $errors->first('cep') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-8 {{ $errors->has('rua') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label" for="rua">Rua:</label>
                                <div class="col-md-10">
                                    <input id="rua" name="rua" value="{{ $aluno->pais->endereco->rua }}" class="form-control input-md" type="text">
                                </div>

                                @if ($errors->has('rua'))
                                    <span class="help-block">
                                         <strong>{{ $errors->first('rua') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-4 {{ $errors->has('numero') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label" for="numero">N°:</label>
                                <div class="col-md-8">
                                    <input id="numero" maxlength="6" name="numero" value="{{ $aluno->pais->endereco->numero }}" class="form-control input-md" type="text">
                                </div>

                                @if ($errors->has('numero'))
                                    <span class="help-block">
                                         <strong>{{ $errors->first('numero') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-8 {{ $errors->has('bairro') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label" for="bairro">Bairro:</label>
                                <div class="col-md-8">
                                    <input id="bairro" name="bairro" value="{{ $aluno->pais->endereco->bairro }}" class="form-control input-md" type="text">
                                </div>

                                @if ($errors->has('bairro'))
                                    <span class="help-block">
                                         <strong>{{ $errors->first('bairro') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="control-label"></label><br>
                            </div>

                            <div class="col-md-4"></div>
                            <div class="col-md-12">
                                <div class="form-group text-center">
                                    <div>
                                        <div class="col-md-1"></div>
                                        <button type="submit" class="col-md-4 btn btn-success ">Alterar</button>
                                        <div class="col-md-2"></div>
                                        <a class="text-center col-md-4 btn btn-danger" href="{{route('admin')}}">Cancelar</a>
                                        <input type="hidden" name="_method" value="put">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

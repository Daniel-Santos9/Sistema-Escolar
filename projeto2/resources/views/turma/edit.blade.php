@extends('layout.home')

@section('titulo','Editar Turma')

@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Atualizar Turma</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{route('turma.update', $turma->id) }}">
                            
                           <div class="form-group {{ $errors->has('serie') ? ' has-error' : '' }}">
                                <label for="serie" class="col-md-4 control-label" >Série:</label>
                                <div class="col-md-6">
                                    <select class="form-control" data-live-search="true" id="serie" name="serie">
                                        <option data-tokens="ketchup mustard" value="{{$turma->serie}}">{{$turma->serie}}</option>
                                        <option data-tokens="ketchup mustard" value="">SELECIONE...</option>
                                        <option data-tokens="ketchup mustard" value="1° ANO - ENSINO FUNDAMENTAL I"> 1° ANO - ENSINO FUNDAMENTAL I</option>
                                        <option data-tokens="ketchup mustard" value="2° ANO - ENSINO FUNDAMENTAL I"> 2° ANO - ENSINO FUNDAMENTAL I</option>
                                        <option data-tokens="ketchup mustard" value="3° ANO - ENSINO FUNDAMENTAL I"> 3° ANO - ENSINO FUNDAMENTAL I</option>
                                        <option data-tokens="ketchup mustard" value="4° ANO - ENSINO FUNDAMENTAL I"> 4° ANO - ENSINO FUNDAMENTAL I</option>
                                        <option data-tokens="ketchup mustard" value="5° ANO - ENSINO FUNDAMENTAL I"> 5° ANO - ENSINO FUNDAMENTAL I</option>
                                        <option data-tokens="ketchup mustard" value="6° ANO - ENSINO FUNDAMENTAL II"> 6° ANO - ENSINO FUNDAMENTAL II</option>
                                        <option data-tokens="ketchup mustard" value="7° ANO - ENSINO FUNDAMENTAL II"> 7° ANO - ENSINO FUNDAMENTAL II</option>
                                        <option data-tokens="ketchup mustard" value="8° ANO - ENSINO FUNDAMENTAL II"> 8° ANO - ENSINO FUNDAMENTAL II</option>
                                        <option data-tokens="ketchup mustard" value="9° ANO - ENSINO FUNDAMENTAL II"> 9° ANO - ENSINO FUNDAMENTAL II</option>
                                    </select>
                                </div>

                                @if ($errors->has('serie'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('serie') }}</strong>
                                </span>
                                @endif
                            </div>

                           <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
                                <label for="status" class="col-md-4 control-label" >Turma:</label>
                                <div class="col-md-6"> 
                                    <select class="form-control" data-live-search="true" id="status" name="status">
                                        <option data-tokens="ketchup mustard" value="{{$turma->status}}">{{$turma->status}}</option>
                                        <option data-tokens="ketchup mustard" value="">SELECIONE...</option>
                                        <option data-tokens="ketchup mustard" value="A"> A </option>
                                        <option data-tokens="ketchup mustard" value="B"> B </option>
                                        <option data-tokens="ketchup mustard" value="C"> C </option>
                                        <option data-tokens="ketchup mustard" value="D"> D </option>
                                        <option data-tokens="ketchup mustard" value="E"> E </option>
                                    </select>
                                </div>

                                @if ($errors->has('status'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span>
                                @endif
                            </div>

                           <div class="form-group {{ $errors->has('turno') ? ' has-error' : '' }}">
                                <label for="turno" class="col-md-4 control-label" >Turno:</label>
                                <div class="col-md-6"> 
                                    <select class="form-control" data-live-search="true" id="turno" name="turno">
                                        @if($turma->turno='M')
                                            <option data-tokens="ketchup mustard" value="{{$turma->turno}}">MANHÃ</option>
                                        @elseif($turma->turno='T')
                                            <option data-tokens="ketchup mustard" value="{{$turma->turno}}">TARDE</option>
                                        @else
                                            <option data-tokens="ketchup mustard" value="{{$turma->turno}}">NOITE</option>
                                        @endif
                                        <option data-tokens="ketchup mustard" value="">SELECIONE...</option>
                                        <option data-tokens="ketchup mustard" value="M"> MANHÃ </option>
                                        <option data-tokens="ketchup mustard" value="T"> TARDE </option>
                                        <option data-tokens="ketchup mustard" value="N"> NOITE </option>
                                    </select>
                                </div>

                                @if ($errors->has('turno'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('turno') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('ano') ? ' has-error' : '' }}">
                                <label for="ano" class="col-md-4 control-label">Ano: </label>

                                <div class="col-md-6">
                                    <input id="ano" type="date" class="form-control" name="ano" value="{{ $turma->ano}}">
                                </div>

                                @if ($errors->has('ano'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('ano') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">Cadastrar </button>
                                    <a class="control-label btn btn-danger" href="{{route('admin')}}">Cancelar</a>
                                </div>
                                <input type="hidden" name="_method" value="put">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
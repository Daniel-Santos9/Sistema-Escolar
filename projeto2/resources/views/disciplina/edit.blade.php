@extends('layout.home')

@section('titulo','Cadastrar Disciplina')

@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Cadastrar Disciplina</div>
                    <div class="panel-body">
                        <form class="form-horizontal col-md-10 col-md-offset-1" role="form" action="{{route('disciplina.update', $disc->id)}}" method="post">
                            {{ csrf_field() }}

                            <div class="form-group col-md-10{{ $errors->has('nome') ? ' has-error' : '' }}">
                                <label for="nome" class="control-label">Nome: </label>

                                <input id="nome" type="text" class="form-control" name="nome" value="{{$disc->nome}}">

                                @if ($errors->has('nome'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('nome') }}</strong>
                                        </span>
                                @endif

                            </div>

                            <div class="form-group col-md-10{{ $errors->has('ch') ? ' has-error' : '' }}">
                                <label for="ch" class="control-label"> Carga Horaria: </label>
                                <div class="input-group">
                                    <input id="ch" type="text" class="form-control" name="ch" value="{{$disc->ch}}">
                                </div>
                                @if ($errors->has('ch'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('ch') }}</strong>
                                        </span>
                                @endif
                            </div>

                           <div class="form-group col-md-10 {{ $errors->has('nivel') ? ' has-error' : '' }}">
                                <label for="nivel" class="control-label" >Nível de Ensino:</label>
                                <select class="form-control" data-live-search="true" id="nivel" name="nivel">
                                    @if($disc->nivel='I')
                                        <option data-tokens="ketchup mustard" value="I">ENSINO FUNDAMENTAL I</option>
                                    @elseif($turma->turno='II')
                                        <option data-tokens="ketchup mustard" value="II">ENSINO FUNDAMENTAL II</option>
                                    @else
                                        <option data-tokens="ketchup mustard" value="III">AMBOS</option>
                                    @endif
                                    <option data-tokens="ketchup mustard" value="">SELECIONE...</option>
                                    <option data-tokens="ketchup mustard" value="I"> ENSINO FUNDAMENTAL I </option>
                                    <option data-tokens="ketchup mustard" value="II"> ENSINO FUNDAMENTAL II </option>
                                    <option data-tokens="ketchup mustard" value="III"> AMBOS </option>
                                </select>

                                @if ($errors->has('nivel'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nivel') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-10">
                                {!! csrf_field() !!}
                                <button type="submit" class="control-label btn btn-primary">Alterar</button>
                                <a class="control-label btn btn-danger" href="{{route('admin')}}">Cancelar</a>

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
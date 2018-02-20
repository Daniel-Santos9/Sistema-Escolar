@extends('layout.home')

@section('titulo','Cadastrar Disciplina')

@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Cadastrar Disciplina</div>
                    <div class="panel-body">
                        <form class="form-horizontal col-md-10 col-md-offset-1" role="form" action="{{route('disciplina.store')}}" method="post">
                            {{ csrf_field() }}

                            <div class="form-group col-md-10{{ $errors->has('nome') ? ' has-error' : '' }}">
                                <label for="nome" class="control-label">Nome: </label>

                                <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}">

                                @if ($errors->has('nome'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('nome') }}</strong>
                                        </span>
                                @endif

                            </div>

                            <div class="form-group col-md-10{{ $errors->has('ch') ? ' has-error' : '' }}">
                                <label for="ch" class="control-label"> Valor: </label>
                                <div class="input-group ">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                    <input id="ch" type="text" class="form-control" name="ch" value="{{ old('ch') }}">
                                </div>
                                @if ($errors->has('ch'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('ch') }}</strong>
                                        </span>
                                @endif
                            </div>

                            <div class="form-group col-md-10">
                                {!! csrf_field() !!}
                                <button type="submit" class="control-label btn btn-primary">Cadastrar</button>
                                <a class="control-label btn btn-danger" href="{{route('admin')}}">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
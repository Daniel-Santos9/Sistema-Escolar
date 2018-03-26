@extends('layout.home')

@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-heading">Cadastrar Turma</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('turma.store') }}">
                           <div class="form-group {{ $errors->has('serie') ? ' has-error' : '' }}">
                                <label for="serie" class="col-md-4 control-label" >Série:</label>
                                <div class="col-md-6">
                                    <select class="form-control" data-live-search="true" id="serie" name="serie">
                                        @if(old('serie') == 1)
                                            <option data-tokens="ketchup mustard" value="1" selected> 1° ANO - ENSINO FUNDAMENTAL I</option>
                                        @elseif(old('serie') == 2)
                                            <option data-tokens="ketchup mustard" value="2" selected> 2° ANO - ENSINO FUNDAMENTAL I</option>
                                        @elseif(old('serie') == 3)
                                            <option data-tokens="ketchup mustard" value="3" selected> 3° ANO - ENSINO FUNDAMENTAL I</option>
                                        @elseif(old('serie') == 4)
                                            <option data-tokens="ketchup mustard" value="4" selected> 4° ANO - ENSINO FUNDAMENTAL I</option>
                                        @elseif(old('serie') == 5)
                                            <option data-tokens="ketchup mustard" value="5" selected> 5° ANO - ENSINO FUNDAMENTAL I</option>
                                        @elseif(old('serie') == 6)
                                            <option data-tokens="ketchup mustard" value="6" selected> 6° ANO - ENSINO FUNDAMENTAL II</option>
                                        @elseif(old('serie') == 7)
                                            <option data-tokens="ketchup mustard" value="7" selected> 7° ANO - ENSINO FUNDAMENTAL II</option>
                                        @elseif(old('serie') == 8)
                                            <option data-tokens="ketchup mustard" value="8" selected> 8° ANO - ENSINO FUNDAMENTAL II</option>
                                        @elseif(old('serie') == 9)
                                            <option data-tokens="ketchup mustard" value="9" selected> 9° ANO - ENSINO FUNDAMENTAL II</option>
                                        @else
                                            <option data-tokens="ketchup mustard" value="" selected>SELECIONE...</option>
                                        @endif

                                        <option data-tokens="ketchup mustard" value="1"> 1° ANO - ENSINO FUNDAMENTAL I</option>
                                        <option data-tokens="ketchup mustard" value="2"> 2° ANO - ENSINO FUNDAMENTAL I</option>
                                        <option data-tokens="ketchup mustard" value="3"> 3° ANO - ENSINO FUNDAMENTAL I</option>
                                        <option data-tokens="ketchup mustard" value="4"> 4° ANO - ENSINO FUNDAMENTAL I</option>
                                        <option data-tokens="ketchup mustard" value="5"> 5° ANO - ENSINO FUNDAMENTAL I</option>
                                        <option data-tokens="ketchup mustard" value="6"> 6° ANO - ENSINO FUNDAMENTAL II</option>
                                        <option data-tokens="ketchup mustard" value="7"> 7° ANO - ENSINO FUNDAMENTAL II</option>
                                        <option data-tokens="ketchup mustard" value="8"> 8° ANO - ENSINO FUNDAMENTAL II</option>
                                        <option data-tokens="ketchup mustard" value="9"> 9° ANO - ENSINO FUNDAMENTAL II</option>
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
                                        @if(old('status') == "A")
                                            <option data-tokens="ketchup mustard" value="A" selected> A </option>
                                        @elseif(old('status') == "B")
                                            <option data-tokens="ketchup mustard" value="B" selected> B </option>
                                        @elseif(old('status') == "C")
                                            <option data-tokens="ketchup mustard" value="C" selected> C </option>
                                        @elseif(old('status') == "D")
                                            <option data-tokens="ketchup mustard" value="D" selected> D </option>
                                        @elseif(old('status') == "E")
                                            <option data-tokens="ketchup mustard" value="E" selected> E </option>
                                        @else
                                            <option data-tokens="ketchup mustard" value="" selected> SELECIONE... </option>
                                        @endif
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
                                        @if(old('turno') == "M")
                                            <option data-tokens="ketchup mustard" value="M" selected> MANHÃ </option>
                                        @elseif(old('turno') == "T")
                                            <option data-tokens="ketchup mustard" value="T" selected> TARDE </option>
                                        @elseif(old('turno') == "N")
                                            <option data-tokens="ketchup mustard" value="N" selected> NOITE </option>
                                        @else
                                            <option data-tokens="ketchup mustard" value="" selected>SELECIONE...</option>
                                        @endif
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
                                    <input id="ano" type="text" class="form-control" name="ano" value="{{ old('ano') }}">
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
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return [
            'nome'              =>'required|string|min:8',
            'rg'                =>'required',
            'nascimento'        =>'required|date_format:d/m/Y',
            'nome_mae'          =>'required|string|min:8',
            'nome_pai'          =>'required|string|min:8',
            'rua'               =>'required|string|min:5',
            'cidade'            =>'required|string|min:5',
            'bairro'            =>'required|string|min:5',
            'cep'               =>'required|string|min:9',
        ];
    }

    public function messages()
    {
        return [
            'nome.required'         =>'O nome é obrigatório',
            'nome.string'           =>'O nome tem que ser string',
            'nome.min'              =>'O nome deve possuir ao menos 8 letras',
            'rg.required'           =>'O RG é obrigatório',
            'nascimento.required'   =>'A data de nascimento é obrigatória',
            'nascimento.date_format'=>'Entre com uma data válida',
            'nome_mae.required'     =>'O Nome da Mãe é obrigatório',
            'nome_mae.string'       =>'O Nome da Mãe tem que ser string',
            'nome_mae.min'          =>'O Nome da Mãe deve possuir ao menos 8 letras',
            'nome_pai.required'     =>'O Nome do Pai é obrigatório',
            'nome_pai.string'       =>'O Nome do Pai tem que ser string',
            'nome_pai.min'          =>'O Nome do Pai deve possuir ao menos 8 letras',
            'rua.required'          =>'O nome da rua é obrigatório',
            'rua.string'            =>'O nome da rua tem que ser string',
            'rua.min'               =>'O nome da rua deve possuir ao menos 5 letras',
            'cidade.required'       =>'A cidade é obrigatória',
            'cidade.string'         =>'A cidade tem que ser string',
            'cidade.min'            =>'A cidade deve possuir ao menos 5 letras',
            'bairro.required'       =>'O bairro é obrigatório',
            'bairro.string'         =>'O bairro tem que ser string',
            'bairro.min'            =>'O bairro deve possuir ao menos 5 letras',
            'cep.required'          =>'O CEP é obrigatório',
            'cep.string'            =>'O CEP tem que ser string',
            'cep.min'               =>'O CEP deve possuir ao menos 8 dígitos',
        ];
    }
}

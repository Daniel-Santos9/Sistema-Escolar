<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AlunoRequest;
use App\Http\Models\Aluno;
use App\Http\Models\Pais;
use App\Http\Models\Endereco;

class AlunoController extends Controller
{
     private $aluno;
     private $end;
     private $pais;

    public function __construct(Aluno $aluno, Endereco $end, Pais $pais){
        $this->middleware('auth');
        $this->aluno = $aluno;
        $this->end 	 = $end;
        $this->pais  = $pais;
    }

    public function create(){
    	return view('aluno.create');
    }

    public function store(AlunoRequest $req){

		//Cadastro dos pais
		$pais = Pais::create([
	        'nome_mae'          => $req->input('nome_mae'),
        	'nome_pai'          => $req->input('nome_pai')
		]);

		//Cadastro do endereço
		$endereco = $pais->endereco()
		->create([
          'rua'  		=> $req->input('rua'),
          'numero'      => $req->input('numero'),
          'bairro'      => $req->input('bairro'),
          'cep'         => $req->input('cep'),
          'cidade'      => $req->input('cidade')
		]);

		//Cadastro do aluno
      $aluno = $pais->alunos()
        ->create([
	        'nome'          => $req->input('nome'),
	        'nascimento'    => implode("-", array_reverse(explode("/",$req->input('nascimento')))),
	        'rg'            => $req->input('rg'),
	        'nis'           => $req->input('nis')
        ]);

      if($pais && $endereco && $aluno){
         return redirect()->route('aluno.show')
                ->withInput()
                ->with('success','O aluno: '.$aluno->nome.' foi cadastrado no sistema');
      }
    }

    public function show(Request $req){

        $str = $req->get('pesquisa','');
        if($str){
            $alunos = $this->aluno->where('nome','LIKE','%'.$str.'%')->get();
        }
        else{
    		$alunos = $this->aluno->all();
        }

    	return view('aluno.show',compact('alunos'));

    }

    public function edit($id){
    	$aluno = $this->aluno->find($id);
    	$aluno->nascimento = implode("/", array_reverse(explode("-",$aluno->nascimento)));
    	return view('aluno.edit',compact('aluno'));

    }

    public function update(AlunoRequest $req, $id){

    	$alu = $this->aluno->find($id);

		//Atualização do aluno
    	$alu->nome = $req->input('nome');
    	$alu->nascimento = implode("-", array_reverse(explode("/",$req->input('nascimento'))));
    	$alu->nis = $req->input('nis');
    	$alu->rg = $req->input('rg');
    	$aluno = $alu->save();



		//Atualização dos pais
		$pai = $alu->pais;
		$pais = $pai->update([
	        'nome_mae'          => $req->input('nome_mae'),
        	'nome_pai'          => $req->input('nome_pai')
		]);


		//Atualização do endereço
		$endereco = $pai->endereco
		->update([
          'rua'  		=> $req->input('rua'),
          'numero'      => $req->input('numero'),
          'bairro'      => $req->input('bairro'),
          'cep'         => $req->input('cep'),
          'cidade'      => $req->input('cidade')
		]);

      if($pais && $endereco && $aluno){
         return redirect()->route('aluno.show')
                ->withInput()
                ->with('success','O aluno: '.$alu->nome.' foi atualizado no sistema');
      }
    }

	public function delete($id){
		$aluno = $this->aluno->find($id);
		$nome = $aluno->nome;
		$aluno->turma()->dissociate();
		$aluno->save();

		if($aluno){
			if($aluno->pais()->delete()){
				if($aluno->delete()){
		            return redirect()->route('aluno.show')
	                ->withInput()
	            	->with('success','O aluno: '.$nome.' foi removido do sistema');
	            }
			}
		}
	}
}

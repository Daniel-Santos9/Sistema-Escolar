<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Turma;
use App\Http\Models\Disciplina;
use App\Http\Models\Nota;

class NotaController extends Controller
{
     private $nota;
     private $turma;
     private $disciplina;

    public function __construct(Nota $nota, Turma $turma, Disciplina $disciplina){
        $this->middleware('auth');
        $this->nota 		= $nota;
        $this->turma 	 	= $turma;
        $this->disciplina  	= $disciplina;
    }

    public function create(){
    	$turmas = $this->turma->all();
    	return view('nota.create', compact('turmas'));
    }

    public function store(){

    }
}

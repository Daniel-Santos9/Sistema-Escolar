<?php

namespace App\Http\Controllers;

use App\Http\Models\Disciplina;
use App\Http\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DisciplinaController extends Controller
{
    private $turma;
    private $disciplina;

    public function __construct(Turma $turma, Disciplina $disciplina)
    {
        $this->middleware('auth');
        $this->turma = $turma;
        $this->disciplina = $disciplina;
    }


    public function create(){
        return view('disciplina.create');
    }

    public function store(Request $res){

        $validador = Validator::make($res->all(), [
            'nome' => 'required|string|max:255',
            'ch' => 'required|int|max:11|',
        ]);

        if($validador->fails())
        {
            return redirect()->route('disciplina.create')
                ->withErrors($validador)
                ->withInput();
        }else
        {
            $this->disciplina->nome = $res->input('nome');
            $this->disciplina->ch = $res->input('ch');

            $user_ins = $this->disciplina->save();

            if($user_ins)
            {
                return redirect()->route('disciplina.show')
                    ->withInput()
                    ->with('inser',true);
            }
        }
    }

    public function show(Request $request){

        $str = $request->get('consulta','');
        if($str){
          $disciplinas = $this->disciplina->where('nome','=',$str)->get();
        }
        else{
            $disciplinas = $this->disciplina->all();
        }

        return view('disciplina.show',compact('disciplinas'));
    }
    public function edit ($id){

        $disc = $this->disciplina->find($id);
        return view('disciplina.edit', compact('disc'));
    }

    public function update(Request $req, $id){

        $disc = $this->disciplina->find($id);

            $validador = Validator::make($req->all(), [
         		'nome' => 'required|string|max:255',
            	'ch' => 'required|int|max:255|',
            ]);


        if($validador->fails())
        {
            return redirect()->route('disciplina.edit', $id)
                ->withErrors($validador)
                ->withInput();
        }else
        {
            $disc->nome = $req->input('nome');
            $disc->ch = $req->input('ch');

            $disc->save();

            return redirect()->route('disciplina.show')
                ->withInput()
                ->with('update',true);
        }
    }

        public function delete($id){

        $disc = $this->disciplina->find($id);
        $disc->delete();

        return redirect()->route('disciplina.show')
            ->withInput()
            ->with('delete',true);

    }



}

<?php

namespace App\Http\Controllers;
use App\Http\Models\Turma;
use App\Http\Models\Disciplina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DateTime;

class TurmaController extends Controller
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
        return view('turma.create');
    }


    public function store(Request $res){

        $validador = Validator::make($res->all(), [
            'serie'     => 'required|integer|min:1',
            'status'    => 'required|string|min:1',
            'turno'     => 'required|string|min:1',
            'ano'       => 'required|date_format:Y',
        ]);

        if($validador->fails())
        {
            return redirect()->route('turma.create')
                ->withErrors($validador)
                ->withInput();
        }else
        {
            $this->turma->serie  = $res->input('serie');
            $this->turma->turno  = $res->input('turno');
            $this->turma->status = $res->input('status');
            $this->turma->ano    = $res->input('ano');

            $inserido = $this->turma->save();
            $associa = $this->associaDisciplina($this->turma);

            if($inserido && $associa)
            {
                return redirect()->route('turma.show')
                    ->withInput()
                    ->with('inser',true);
            }
        }
    }

    public function show(Request $request){

        $str = $request->get('consulta','');
        if($str){
            $turmas = $this->turma->where('serie','LIKE','%'.$str.'%')->get();
        }
        else{
            $turmas = $this->turma->all();
        }

        return view('turma.show',compact('turmas'));
    }

    public function edit ($id){
        $turma = $this->turma->find($id);
        return view('turma.edit', compact('turma'));
    }

    public function update(Request $res, $id){

        $turma = $this->turma->find($id);
        $desassocia = $this->desassociaDisciplina($turma);

        $validador = Validator::make($res->all(), [
            'serie'     => 'required|integer|min:1',
            'status'    => 'required|string|min:1',
            'turno'     => 'required|string|min:1',
            'ano'       => 'required|date_format:Y',
        ]);


        if($validador->fails()){

            return redirect()->route('turma.edit', $id)
                ->withErrors($validador)
                ->withInput();
        }
        else{

            $turma->serie = $res->input('serie');
            $turma->turno = $res->input('turno');
            $turma->status = $res->input('status');
            $turma->ano    = $res->input('ano');

            $inserido = $turma->save();

            $associa = $this->associaDisciplina($turma);

            if($desassocia && $inserido && $associa){
                return redirect()->route('turma.show')
                    ->withInput()
                    ->with('update',true);
            }

        }
    }

    public function delete($id){

        $turma = $this->turma->find($id);
        $disciplinas = $turma->disciplinas;

        if($disciplinas){
            $desassocia = $this->desassociaDisciplina($turma);
        }

        if($turma->delete() && $desassocia){
            return redirect()->route('turma.show')
                ->withInput()
                ->with('delete',true);
        }

    }

    public function associaDisciplina(Turma $turma){

        if($turma->serie >= 6){
            $disciplinas = $this->disciplina->where('nivel','=','II')->orWhere('nivel','=','III')->get();
        }
        else{
            $disciplinas = $this->disciplina->where('nivel','=','I')->orWhere('nivel','=','III')->get();
        }

        if($disciplinas){
            foreach ($disciplinas as $disciplina) {
                $turma->disciplinas()->attach($disciplina);
            }
            return true;  
        }
        
        return false;  
    }

    public function desassociaDisciplina(Turma $turma){

        $disciplinas = $turma->disciplinas;

        if($disciplinas){
            foreach ($disciplinas as $disciplina) {
                $turma->disciplinas()->detach($disciplina);
            }
            return true;  
        }
        
        return false;  
    }

}

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
            'serie' => 'required|string|min:10',
            'status' => 'required|string|min:1',
            'turno' => 'required|string|min:1',
            'ano'=> 'required|date',
        ]);

        if($validador->fails())
        {
            return redirect()->route('turma.create')
                ->withErrors($validador)
                ->withInput();
        }else
        {
            $dataUSA = date_format(new DateTime($res->input('ano')), "Y-m-d");
            $this->turma->serie = $res->input('serie');
            $this->turma->turno = $res->input('turno');
            $this->turma->status = $res->input('status');
            $this->turma->ano = $dataUSA;

            $turma_ins = $this->turma->save();

            if($turma_ins)
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

        $validador = Validator::make($res->all(), [
            'serie' => 'required|string|min:10',
            'status' => 'required|string|min:1',
            'turno' => 'required|string|min:1',
            'ano'=> 'required|date',
        ]);


        if($validador->fails())
        {
            return redirect()->route('turma.edit', $id)
                ->withErrors($validador)
                ->withInput();
        }else
        {
            $dataUSA = new DateTime($res->input('ano'));
            $turma->serie = $res->input('serie');
            $turma->turno = $res->input('turno');
            $turma->status = $res->input('status');
            $turma->ano = $dataUSA->format("Y-m-d");

            $turma->save();

            return redirect()->route('turma.show')
                ->withInput()
                ->with('update',true);
        }
    }

    public function delete($id){

        $turma = $this->turma->find($id);
        $turma->delete();

        return redirect()->route('turma.show')
            ->withInput()
            ->with('delete',true);

    }
}

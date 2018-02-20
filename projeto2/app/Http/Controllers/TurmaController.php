<?php

namespace App\Http\Controllers;
use App\Http\Models\Turma;
use App\Http\Models\Disciplina;
use Illuminate\Http\Request;

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if($validador->fails())
        {
            return redirect()->route('turma.create')
                ->withErrors($validador)
                ->withInput();
        }else
        {
            $this->user->name = $res->input('name');
            $this->user->email = $res->input('email');
            $this->user->password = bcrypt($res->input['password']);

            $user_ins = $this->user->save();

            if($user_ins)
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
            $turmas = $this->turma->where('serie','=',$str)->get();
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

    public function update(Request $req, $id){

        $turma = $this->turma->find($id);

        $validador = Validator::make($req->all(), [
            'serie' => 'required|numeric|min:1',
            'ano' => 'required|string',
            'turno' => 'required|numeric|min:1',
            'status'=> 'required|string',
        ]);


        if($validador->fails())
        {
            return redirect()->route('turma.edit', $id)
                ->withErrors($validador)
                ->withInput();
        }else
        {
            $turma->serie = $req->input('serie');
            $turma->ano = $req->input('ano');
            $turma->turno = $req->input('turno');
            $turma->turno = $req->input('status');

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

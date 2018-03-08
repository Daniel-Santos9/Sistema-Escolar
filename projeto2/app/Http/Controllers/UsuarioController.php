<?php

namespace App\Http\Controllers;
use App\Http\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->middleware('auth');
        $this->user = $user;
    }

    public function index()
    {
        return view('usuario.index');
    }

    public function create(){
        return view('usuario.create');
    }
    
    public function store(Request $res){

        $validador = Validator::make($res->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if($validador->fails())
        {
            return redirect()->route('usuario.create')
                ->withErrors($validador)
                ->withInput();
        }else
        {
            $this->user->name = $res->input('name');
            $this->user->email = $res->input('email');
            $this->user->password = bcrypt($res->input('password'));

            $user_ins = $this->user->save();

            if($user_ins)
            {
                return redirect()->route('usuario.show')
                    ->withInput()
                    ->with('inser',true);
            }
            return 'NÃO FUNCIONOU!!' ;
        }
    }

    public function show(){
        $usuarios = $this->user->all();
        return view('usuario.show',compact('usuarios'));
    }

    public function edit ($id){
        $user = $this->user->find($id);
        return view('usuario.edit', compact('user'));
    }

    public function update(Request $req, $id){

        $usuario = $this->user->find($id);

        if($req->input('password')==''){

            if($usuario->email==$req->input('email'))
            {
                $validador = Validator::make($req->all(), [
                    'name' => 'required|string|max:255'
                ]);

                $usuario->name = $req->input('name');
            }
            else
            {

                $validador = Validator::make($req->all(), [
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:160|unique:users',
                ]);

                $usuario->name = $req->input('name');
                $usuario->email = $req->input('email');

            }
        }
        else
        {
            if($usuario->email==$req->input('email'))
            {
                $validador = Validator::make($req->all(), [
                    'name' => 'required|string|max:255',
                    'password' => 'string|min:6|confirmed',
                ]);

                $usuario->name = $req->input('name');
                $usuario->password = bcrypt($req->input('password'));
            }
            else
            {
                $validador = Validator::make($req->all(), [
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:160|unique:users',
                    'password' => 'string|min:6|confirmed',
                ]);

                $usuario->name = $req->input('name');
                $usuario->password = bcrypt($req->input('password'));
                $usuario->email = $req->input('email');
            }
        }

        if($validador->fails())
        {
            return redirect()->route('usuario.edit', $id)
                ->withErrors($validador)
                ->withInput();
        }else
        {
            $usuario->save();

            return redirect()->route('usuario.show')
                ->withInput()
                ->with('update',true);
        }
    }

    public function delete($id){

        $usuario = $this->user->find($id);
        $usuario->delete();

        return redirect()->route('usuario.show')
            ->withInput()
            ->with('delete',true);

    }
}
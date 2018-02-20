<?php

namespace App\Http\Controllers;

use App\Http\Models\Disciplina;
use App\Http\Models\Turma;
use Illuminate\Http\Request;

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
}

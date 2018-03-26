<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Disciplina;

class DisciplinaSeeder extends Seeder
{

    public function run()
    {
        Disciplina::create([
            'nome' => 'MATEMÁTICA',
            'ch' => 80,
            'nivel' => 'III'
        ]);

        Disciplina::create([
            'nome' => 'PORTUGUÊS',
            'ch' => 80,
            'nivel' => 'III'
        ]);

        Disciplina::create([
            'nome' => 'ARTE',
            'ch' => 20,
            'nivel' => 'III'
        ]);

        Disciplina::create([
            'nome' => 'CIÊNCIAS',
            'ch' => 40,
            'nivel' => 'III'
        ]);

        Disciplina::create([
            'nome' => 'HISTÓRIA',
            'ch' => 40,
            'nivel' => 'III'
        ]);

        Disciplina::create([
            'nome' => 'GEOGRAFIA',
            'ch' => 40,
            'nivel' => 'III'
        ]);

        Disciplina::create([
            'nome' => 'EDUCAÇÃO FÍSICA',
            'ch' => 40,
            'nivel' => 'III'
        ]);

        Disciplina::create([
            'nome' => 'INGLÊS',
            'ch' => 40,
            'nivel' => 'III'
        ]);

        Disciplina::create([
            'nome' => 'REDAÇÃO',
            'ch' => 40,
            'nivel' => 'II'
        ]);

        Disciplina::create([
            'nome' => 'GEOMETRIA',
            'ch' => 40,
            'nivel' => 'II'
        ]);

    }
}

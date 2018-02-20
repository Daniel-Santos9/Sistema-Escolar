<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $table = 'disciplina';

    protected $fillable = [
        'nome', 'ch'
    ];

    public function turmas(){
        return $this->belongsToMany(Turma::class,'rdt');
    }
}

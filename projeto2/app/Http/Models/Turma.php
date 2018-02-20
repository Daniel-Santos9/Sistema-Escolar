<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $table = 'turma';

    protected $fillable = [
        'serie', 'turno','ano','status'
    ];
    public function disciplinas(){
        return $this->belongsToMany(Disciplina::class,'rdt');
    }
}

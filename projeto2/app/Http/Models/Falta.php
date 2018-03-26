<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Falta extends Model
{
    protected $table = 'falta';

    protected $fillable = [
        'mes', 'qtd','disciplina_id','aluno_id'
    ];

 	protected $guarded = [
 		'id'
 	];

 	public function aluno(){
		return $this->belongsTo(Aluno::class);
 	}

 	public function disciplina(){
		return $this->belongsTo(Disciplina::class);
 	}
}

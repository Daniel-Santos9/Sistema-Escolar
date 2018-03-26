<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $table = 'nota';

    protected $fillable = [
        'bimestre', 'nota','disciplina_id','aluno_id'
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

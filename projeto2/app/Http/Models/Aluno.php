<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $table = 'aluno';

    protected $fillable = [
        'nome', 'nascimento','turma_id','pais_id','rg','nis'
    ];

 	protected $guarded = [
 		'id'
 	];

 	public function turma(){
		return $this->belongsTo(Turma::class);
 	}

 	public function pais(){
		return $this->belongsTo(Pais::class);
 	}

 	public function faltas(){
 		return $this->hasMany(Falta::class);
 	}

 	public function notas(){
 		return $this->hasMany(Nota::class);
 	}
}

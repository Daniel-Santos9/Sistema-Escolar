<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = 'pais';

    protected $fillable = [
        'nome_pai', 'nome_mae'
    ];

 	protected $guarded = [
 		'id'
 	];

 	public function alunos(){
 		return $this->hasMany(Aluno::class);
 	}

 	public function endereco(){
		return $this->hasOne(Endereco::class);
 	}
}

<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $table = 'disciplina';

    protected $fillable = [
        'nome', 'ch'
    ];

 	protected $guarded = [
 		'id'
 	];

    public function turmas(){
        return $this->belongsToMany(Turma::class)->withTimestamps();
    }

 	public function faltas(){
 		return $this->hasMany(Falta::class);
 	}

 	public function notas(){
 		return $this->hasMany(Nota::class);
 	}
}

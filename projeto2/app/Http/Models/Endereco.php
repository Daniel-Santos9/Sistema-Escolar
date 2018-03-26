<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'endereco';

    protected $fillable = [
        'cidade', 'cep','pais_id','rua','bairro','numero'
    ];

 	protected $guarded = [
 		'id'
 	];

 	public function pais(){
		return $this->belongsTo(Pais::class);
 	}
}

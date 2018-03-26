<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunoTable extends Migration
{

    public function up()
    {
        Schema::create('aluno', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 160);
            $table->string('rg', 12)->nullable();
            $table->date('nascimento');
            $table->string('nis', 15)->nullable();
            $table->unsignedBigInteger('pais_id');
            $table->unsignedBigInteger('turma_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('aluno');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFkTable extends Migration
{

    public function up(){

        Schema::table('aluno', function ($table) {
            $table->foreign('pais_id')->references('id')->on('pais')->onDelete('cascade');
            $table->foreign('turma_id')->references('id')->on('turma')->onDelete('cascade');
        });

        Schema::table('endereco', function ($table) {
            $table->foreign('pais_id')->references('id')->on('pais')->onDelete('cascade');
        });

        Schema::table('nota', function ($table) {
            $table->foreign('aluno_id')->references('id')->on('aluno')->onDelete('cascade');
            $table->foreign('disciplina_id')->references('id')->on('disciplina')->onDelete('cascade');
        });

        Schema::table('falta', function ($table) {
            $table->foreign('aluno_id')->references('id')->on('aluno')->onDelete('cascade');
            $table->foreign('disciplina_id')->references('id')->on('disciplina')->onDelete('cascade');
        });

        Schema::table('disciplina_turma', function ($table) {
            $table->foreign('disciplina_id')->references('id')->on('disciplina')->onDelete('cascade');
            $table->foreign('turma_id')->references('id')->on('turma')->onDelete('cascade');
        });

    }

    public function down()
    {
        Schema::dropIfExists('fk');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisciplinaTurmaTable extends Migration
{
    public function up()
    {
        Schema::create('disciplina_turma', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('turma_id');
            $table->unsignedBigInteger('disciplina_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('disciplina_turma');
    }
}

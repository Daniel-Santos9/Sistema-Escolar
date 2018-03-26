<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotaTable extends Migration
{
    public function up()
    {
        Schema::create('nota', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('bimestre');
            $table->double('nota', 4, 2);
            $table->unsignedBigInteger('aluno_id');
            $table->unsignedBigInteger('disciplina_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nota');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaltaTable extends Migration
{
    public function up()
    {
        Schema::create('falta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mes', 20);
            $table->unsignedInteger('qtd');
            $table->unsignedBigInteger('aluno_id');
            $table->unsignedBigInteger('disciplina_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('falta');
    }

}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisciplinaTable extends Migration
{
    public function up()
    {
        Schema::create('disciplina', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome',100);
            $table->Integer('ch');
            $table->enum('nivel', ['I', 'II','III']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('disciplina');
    }
}

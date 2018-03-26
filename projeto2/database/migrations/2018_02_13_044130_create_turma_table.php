<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurmaTable extends Migration
{

    public function up()
    {
        Schema::create('turma', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('serie'); // trocar por integer e concertar a view
            $table->enum('turno', ['M', 'T']);
            $table->year('ano');
            $table->string('status',1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('turma');
    }
}

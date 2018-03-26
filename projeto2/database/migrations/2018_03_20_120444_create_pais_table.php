<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaisTable extends Migration
{

    public function up()
    {
        Schema::create('pais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome_pai', 160);
            $table->string('nome_mae', 160);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pais');
    }
}

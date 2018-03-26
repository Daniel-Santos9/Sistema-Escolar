<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecoTable extends Migration
{

    public function up()
    {
        Schema::create('endereco', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cidade', 100)->default('CEDRO');
            $table->string('cep', 10)->default('64300-000');
            $table->string('rua', 160)->nullable();
            $table->string('bairro', 160)->nullable();
            $table->integer('numero')->nullable();
            $table->unsignedBigInteger('pais_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('endereco');
    }
}

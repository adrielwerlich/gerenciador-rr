<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', ['cpf', 'cnpj', 'carteira-de-trabalho','rg'])->nullable();
            $table->string('foto-frente')->nullable();
            $table->string('foto-verso')->nullable();
            $table->string('numero-do-documento');
            $table->string('comentario_descricao');
            $table->foreign('usuario')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentos');
    }
}

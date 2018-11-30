<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicos', function (Blueprint $table) {
            $table->increments('id');
            $table->double('valor');
            $table->unsignedInteger('id_tipo_de_servico');
            $table->foreign('id_tipo_de_servico')->references('id')->on('tipos_de_servicos')->onDelete('cascade');
            $table->unsignedInteger('id_endereco');
            $table->foreign('id_endereco')->references('id')->on('enderecos')->onDelete('cascade');
            $table->date('data_prevista_inicio');
            $table->string('descricao_detalhes')-nullable();
            

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
        Schema::dropIfExists('servicos');
    }
}

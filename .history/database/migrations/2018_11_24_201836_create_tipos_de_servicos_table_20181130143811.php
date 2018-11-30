<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiposDeServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_de_servicos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo-do-servico');
            $table->string('descricao_detalhes');
            $table->double('valor_por_metro²')->nullable();
            $table->double('valor_por_hora')->nullable();

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
        Schema::dropIfExists('tipos_de_servicos');
    }
}

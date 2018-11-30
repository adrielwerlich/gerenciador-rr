<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdemDeServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordem_de_servicos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('os-num')->nullable();
            $table->unsignedinteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('descricao_detalhes')-nullable();            
            $table->enum('estagio', ['negociando','em atendimento','concluido'])->nullable();
            
            $table->foreign('id_categoria')->references('id')->on('categorias')->onDelete('cascade')->change();
            
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
        Schema::dropIfExists('ordem_de_servicos');
    }
}

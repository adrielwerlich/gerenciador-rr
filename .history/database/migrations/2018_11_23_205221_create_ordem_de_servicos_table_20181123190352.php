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
            $table->integer('user_id_transaction')->nullable();

            $table->string('categoria')->nullable();
            $table->string('categoria')->nullable();
            
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

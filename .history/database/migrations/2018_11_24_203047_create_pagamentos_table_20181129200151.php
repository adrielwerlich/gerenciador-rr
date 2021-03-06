<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('vencimento');
            $table->double('valor');
            $table->integer('parcelas')->nullable();
            $table->boolean('parcelado');
            $table->unsignedinteger('id_tipo_pagamento');
            $table->foreign('id_tipo_pagamento')->references('id')->on('tipo_de_pagamentos')->onDelete('cascade');

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
        Schema::dropIfExists('pagamentos');
    }
}

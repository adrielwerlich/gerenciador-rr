<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddValuePerSquareAndHour extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tipos_de_servicos', function (Blueprint $table) {
            $table->double('valor_por_metro²');
            $table->double('valor_por_hora');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tipos_de_servicos', function (Blueprint $table) {
            $table->dropColumn('valor_comum');            
        });
    }
}

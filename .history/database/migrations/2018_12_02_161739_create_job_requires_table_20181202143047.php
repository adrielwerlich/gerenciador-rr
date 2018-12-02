<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobRequiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_requires', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tipos_de_servicos_id');
            $table->foreign('tipos_de_servicos_id')->references('id')->on('tipos_de_servicos')->onDelete('cascade');
            $table->unsignedInteger('enderecos_id');
            $table->foreign('enderecos_id')->references('id')->on('enderecos')->onDelete('cascade');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
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
        Schema::dropIfExists('job_requires');
    }
}

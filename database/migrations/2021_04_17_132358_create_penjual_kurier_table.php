<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualKurierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjual_kurier', function (Blueprint $table) {
            $table->id('idPenjualKurier');
            $table->unsignedBigInteger('idPenjual');
            $table->unsignedBigInteger('idKurier');

            $table->foreign('idPenjual')->references('idPenjual')->on('penjual');
            $table->foreign('idKurier')->references('idKurier')->on('kurier');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjual_kurier');
    }
}

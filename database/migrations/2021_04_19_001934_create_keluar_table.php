<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeluarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluar', function (Blueprint $table) {
            $table->id('idKeluar');
            $table->unsignedBigInteger('idBuku');
            $table->unsignedBigInteger('idPenjual');
            $table->unsignedBigInteger('idAlamat');
            $table->unsignedBigInteger('idKurier');
            $table->integer('kuantitiBuku');
            $table->float('jumlahHargaBuku');

            $table->foreign('idBuku')->references('idBuku')->on('buku');
            $table->foreign('idPenjual')->references('idPenjual')->on('penjual');
            $table->foreign('idAlamat')->references('idAlamat')->on('alamat');
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
        Schema::dropIfExists('keluar');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->string('idPesanan')->primary();
            $table->unsignedBigInteger('idAlamat');
            $table->unsignedBigInteger('idKurier');
            $table->unsignedBigInteger('idPembeli');
            $table->unsignedBigInteger('idPenjual');
            $table->float('subHargaPesanan');
            $table->float('hargaPesanan');
            $table->string('gambarTransaksi');
            $table->string('statusPesanan');
            $table->integer('tarikhWaktuPesanan');

            $table->foreign('idAlamat')->references('idAlamat')->on('alamat');
            $table->foreign('idKurier')->references('idKurier')->on('kurier');
            $table->foreign('idPembeli')->references('idPembeli')->on('pembeli');
            $table->foreign('idPenjual')->references('idPenjual')->on('penjual');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanan');
    }
}

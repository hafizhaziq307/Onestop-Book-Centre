<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id('idPenilaian');
            $table->unsignedBigInteger('idPembeli');
            $table->string('idPesanan');
            $table->unsignedBigInteger('idBuku');
            $table->integer('markahPenilaian');

            $table->foreign('idPembeli')->references('idPembeli')->on('pembeli');
            $table->foreign('idPesanan')->references('idPesanan')->on('pesanan');
            $table->foreign('idBuku')->references('idBuku')->on('buku');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penilaian');
    }
}

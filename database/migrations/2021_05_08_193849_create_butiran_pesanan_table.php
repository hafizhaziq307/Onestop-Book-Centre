<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateButiranPesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('butiran_pesanan', function (Blueprint $table) {
            $table->id('idButiranPesanan');
            $table->string('idPesanan');
            $table->unsignedBigInteger('idBuku');
            $table->integer('kuantitiPesanan');
            $table->float('jumlahHargaBuku');

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
        Schema::dropIfExists('butiran_pesanan');
    }
}

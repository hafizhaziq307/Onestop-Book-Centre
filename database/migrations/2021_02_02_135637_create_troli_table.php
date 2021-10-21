<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTroliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('troli', function (Blueprint $table) {
            $table->id("idTroli");

            $table->unsignedBigInteger('idBuku');
            $table->integer("kuantitiTroli");
            $table->float("hargaTroli", 8, 2);
            $table->unsignedBigInteger('idPembeli');


            $table->foreign('idBuku')->references('idBuku')->on('buku');
            $table->foreign('idPembeli')->references('idPembeli')->on('pembeli');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('troli');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id("idBuku");
            $table->string("tajukBuku",100);
            $table->string("isbnBuku",50);
            $table->string("pengarangBuku",50);
            $table->string("penerbitBuku",50);
            $table->date("tarikhTerbitBuku");
            $table->string("ukuranBuku",50);
            $table->integer("mukaSuratBuku");
            $table->string("sinopsisBuku",1000);
            $table->date("tarikhCiptaBuku");
            $table->integer("stokBuku");
            $table->float("hargaBuku",9,2);
            $table->string("jenisKulitBuku",50);
            $table->string("gambarBuku", 50);
            $table->string("statusBuku",50);
            $table->unsignedBigInteger("idGenre");
            $table->unsignedBigInteger("idPenjual");

            $table->foreign('idPenjual')->references('idPenjual')->on('penjual');
            $table->foreign('idGenre')->references('idGenre')->on('genre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku');
    }
}

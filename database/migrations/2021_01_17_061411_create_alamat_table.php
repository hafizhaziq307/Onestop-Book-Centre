<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlamatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alamat', function (Blueprint $table) {
            $table->id("idAlamat");
            $table->string('namaPenerima');
            $table->string('noTel');
            $table->string("butiranAlamat",100);     
            $table->string('poskod',50);
            $table->unsignedBigInteger('idPembeli');

            $table->foreign('idPembeli')->references('idPembeli')->on('pembeli');
            $table->foreign('poskod')->references('poskod')->on('poskod');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alamat');
    }
}

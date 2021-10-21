<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjual', function (Blueprint $table) {
            $table->id("idPenjual");
            $table->string('emelPenjual', 50)->unique();
            $table->string('namaPenjual', 50);
            $table->string('kataLaluanPenjual', 50);
            $table->string('noTelPenjual', 50);
            $table->string('noAkaunBankPenjual', 50);
            $table->string('watakPenjual', 50);
            $table->string('gambarPenjual', 50);
            $table->date('tarikhDaftarPenjual');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjual');
    }
}

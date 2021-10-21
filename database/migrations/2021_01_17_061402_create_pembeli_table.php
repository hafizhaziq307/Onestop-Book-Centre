<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembeliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembeli', function (Blueprint $table) {
            $table->id("idPembeli");
            $table->string('emelPembeli', 50)->unique();
            $table->string('namaPembeli', 50);
            $table->string('kataLaluanPembeli',50);
            $table->string('noTelPembeli',50)->nullable();
            $table->string('watakPembeli',50);
            $table->string('gambarPembeli',50);
            $table->date('tarikhDaftarPembeli');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembeli');
    }
}

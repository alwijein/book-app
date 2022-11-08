<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMidTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mid_test', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemesan');
            $table->string('no_hp');
            $table->string('nama_kereta');
            $table->string('stasiun_tujuan');
            $table->bigInteger('harga_tiket');
            $table->bigInteger('jumlah_tiket');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mid_test');
    }
}

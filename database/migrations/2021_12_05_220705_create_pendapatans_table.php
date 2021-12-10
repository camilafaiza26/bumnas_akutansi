<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendapatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendapatans', function (Blueprint $table) {
            $table->id('id_pendapatan');
            $table->bigInteger('jumlah_pendapatan');
            $table->integer('tahun_ke');
            $table->bigInteger('kegiatan_id')->unsigned()->index();
            $table->foreign('kegiatan_id')->references('id')->on('kegiatans')->onDelete('cascade');
            $table->bigInteger('bunga_id')->unsigned()->index();
            $table->foreign('bunga_id')->references('id_bunga')->on('bungas')->onDelete('cascade');
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
        Schema::dropIfExists('pendapatans');
    }
}

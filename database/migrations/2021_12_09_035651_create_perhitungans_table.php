<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerhitungansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perhitungans', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('kegiatan_id')->unsigned()->index();
            $table->foreign('kegiatan_id')->references('id')->on('kegiatans')->onDelete('cascade');
            $table->bigInteger('total_pendapatan');
            $table->bigInteger('initial_outlay');
            $table->bigInteger('total_variable');
            $table->bigInteger('total_semi');
            $table->bigInteger('total_tetap');
            $table->integer('waktu');
            $table->bigInteger('bunga_id')->unsigned()->index();
            $table->foreign('bunga_id')->references('id_bunga')->on('bungas')->onDelete('cascade');
            $table->double('npv');
            $table->string('status');
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
        Schema::dropIfExists('perhitungans');
    }
}

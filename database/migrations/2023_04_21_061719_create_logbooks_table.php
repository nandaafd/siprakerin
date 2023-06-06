<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('logbook', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->foreign('siswa_id')->references('id')->on('siswa');
            $table->string('impresi');
            $table->string('kegiatan');
            $table->string('deskripsi_kegiatan',512);
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('logbook');
    }
};

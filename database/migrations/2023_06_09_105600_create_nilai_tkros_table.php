<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('nilai_tkro', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->foreign('siswa_id')->references('id')->on('siswa');
            $table->string('prodi');
            $table->string('mitra');
            $table->string('disiplin');
            $table->string('kerjasama');
            $table->string('tanggungjawab');
            $table->string('inisiatif');
            $table->string('kebersihan');
            $table->string('keberhasilan');
            $table->string('perawatan_engine')->nullable();
            $table->string('perawatan_chasis')->nullable();
            $table->string('perawatan_kelistrikan')->nullable();
            $table->string('kkk')->nullable();
            $table->string('teknis')->nullable();
            $table->string('rata_rata');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nilai_tkro');
    }
};

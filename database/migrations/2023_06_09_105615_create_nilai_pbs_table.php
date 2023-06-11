<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('nilai_pbs', function (Blueprint $table) {
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
            $table->string('marketing')->nullable();
            $table->string('cs')->nullable();
            $table->string('teller')->nullable();
            $table->string('administrasi')->nullable();
            $table->string('teknis')->nullable();
            $table->string('rata_rata');
            $table->string('nilai_huruf');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nilai_pbs');
    }
};

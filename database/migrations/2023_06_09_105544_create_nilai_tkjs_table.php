<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('nilai_tkj', function (Blueprint $table) {
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
            $table->string('teknis_1')->nullable();
            $table->string('teknis_2')->nullable();
            $table->string('teknis_3')->nullable();
            $table->string('teknis_4')->nullable();
            $table->string('teknis_5')->nullable();
            $table->string('rata_rata');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nilai_tkj');
    }
};

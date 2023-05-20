<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('prakerin', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('prodi');
            $table->string('angkatan');
            $table->string('mitra_perusahaan');
            $table->string('bidang_mitra');
            $table->string('alamat_mitra');
            $table->string('bukti_diterima')->nullable();
            $table->string('kontak_perusahaan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('prakerin');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('tanggal_terbit');
            $table->string('isi_berita',512);
            $table->string('penulis');
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('berita');
    }
};

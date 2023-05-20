<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('mitra', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mitra');
            $table->string('foto_mitra')->nullable();
            $table->string('alamat');
            $table->string('bidang');
            $table->string('kuota');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mitra');
    }
};

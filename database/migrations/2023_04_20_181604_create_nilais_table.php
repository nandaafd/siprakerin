<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{

    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->foreign('siswa_id')->references('id')->on('siswa');
            $table->unsignedBigInteger('pembimbing_lapangan_id');
            $table->foreign('pembimbing_lapangan_id')->references('id')->on('pembimbing_lapangan');
            $table->integer('nilai_rata_rata')->default(0);
            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('nilai');
    }
};

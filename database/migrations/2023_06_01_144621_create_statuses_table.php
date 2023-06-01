<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('status', function (Blueprint $table) {
            $table->id();
            $table->string('pendaftaran')->nullable();
            $table->string('penilaian')->nullable();
            $table->string('logbook')->nullable();
            $table->string('absensi')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('status');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('siswa', function (Blueprint $table) {
            $table->unsignedBigInteger('pembimbing_lapangan_id')->nullable();
            $table->foreign('pembimbing_lapangan_id')->references('id')->on('pembimbing_lapangan');
        });
    }

    public function down()
    {
        Schema::table('siswa', function (Blueprint $table) {
            $table->dropForeign(['pembimbing_lapangan_id']);
            $table->dropColumn('pembimbing_lapangan_id');
        });
    }
};

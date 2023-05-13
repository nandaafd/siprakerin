<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('nilai', function (Blueprint $table) {
            $table->unsignedBigInteger('pembimbing_lapangan_id')->after('siswa_id');
            $table->foreign('pembimbing_lapangan_id')->references('id')->on('pembimbing_lapangan');
        });
    }

    public function down()
    {
        Schema::table('nilai', function (Blueprint $table) {
            $table->dropForeign(['pembimbing_lapangan_id']);
            $table->dropColumn('pembimbing_lapangan_id');
        });
    }
};

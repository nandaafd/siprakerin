<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->foreign('siswa_id')->references('id')->on('siswas');
            $table->integer('nilai_A')->default(0);
            $table->integer('nilai_B')->default(0);
            $table->integer('nilai_C')->default(0);
            $table->integer('nilai_total')->default(0);
        });

        // Set initial total value based on column1, column2, column3
        DB::table('nilais')->update(['nilai_total' => DB::raw('nilai_A + nilai_B + nilai_C')]);

        // Create trigger to update total value when column1, column2, column3 are updated
        DB::unprepared('CREATE TRIGGER update_total_value BEFORE UPDATE ON nilais FOR EACH ROW SET NEW.nilai_total = NEW.nilai_A + NEW.nilai_B + NEW.nilai_C');
        DB::unprepared('CREATE TRIGGER `update_total_value_before_insert` BEFORE INSERT ON `nilais` FOR EACH ROW SET NEW.nilai_total = NEW.nilai_A + NEW.nilai_B + NEW.nilai_C');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilais');
    }
};

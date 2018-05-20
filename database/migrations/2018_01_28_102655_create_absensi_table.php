<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbsensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik', 20);
            $table->string('cuti', 20);
            $table->string('ijin', 20);
            $table->string('spj', 20);
            $table->string('bolos', 20);
            $table->string('jam_lembur', 20);
            $table->string('kek_jam_kerja', 20);
            $table->string('weekday', 20);
            $table->string('weekend', 20);
            $table->string('holiday', 20);
            $table->datetime('periode');
            $table->string('status', 20);
            $table->datetime('penggajian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensi');
    }
}

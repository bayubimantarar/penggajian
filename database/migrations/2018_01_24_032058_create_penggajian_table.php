<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenggajianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penggajian', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik', 20);
            $table->text('gaji_pokok')->nullable();
            $table->text('kinerja')->nullable();
            $table->text('makan')->nullable();
            $table->text('transport')->nullable();
            $table->text('lembur')->nullable();
            $table->text('rapel_iso')->nullable();
            $table->text('bpjs_1')->nullable();
            $table->text('bpjs_2')->nullable();
            $table->text('pinjaman')->nullable();
            $table->text('kehadiran')->nullable();
            $table->text('kekurangan_jam_kerja')->nullable();
            $table->text('premi_ketenaga_kerjaan_1')->nullable();
            $table->text('premi_kesehatan_1')->nullable();
            $table->text('premi_ketenaga_kerjaan_2')->nullable();
            $table->text('premi_kesehatan_2')->nullable();
            $table->text('pembulatan')->nullable();
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
        Schema::dropIfExists('penggajian');
    }
}

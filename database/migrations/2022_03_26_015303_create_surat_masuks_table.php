<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('no_agenda', 20);
            $table->string('kode_unik', 50)->nullable();
            $table->string('nomor_surat', 50)->unique();
            $table->date('tanggal_surat');
            $table->string('perihal', 100);
            $table->string('pengirim', 50);
            $table->string('penerima', 50);
            $table->string('softcopy', 50)->nullable();
            $table->string('keterangan', 100)->nullable();
            $table->dateTime('tanggal_sekretariat');
            $table->dateTime('tanggal_sekretaris')->nullable();
            $table->dateTime('tanggal_pimpinan')->nullable();
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
        Schema::dropIfExists('surat_masuks');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keluars', function (Blueprint $table) {
            $table->id();
            $table->string('no_agenda');
            $table->string('nomor_halaman');
            $table->string('klasifikasi');
            $table->string('nomor_surat');
            $table->date('tanggal_surat');
            $table->string('perihal');
            $table->string('pengirim');
            $table->string('penerima');
            $table->string('keterangan')->nullable();
            $table->string('softcopy')->nullable();
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
        Schema::dropIfExists('surat_keluars');
    }
}

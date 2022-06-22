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
            $table->string('no_agenda', 20);
            $table->string('nomor_halaman', 20);
            $table->string('klasifikasi', 20);
            $table->string('nomor_surat', 50)->unique();
            $table->date('tanggal_surat');
            $table->string('perihal', 100);
            $table->string('pengirim', 50);
            $table->string('penerima', 50);
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

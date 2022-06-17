<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUndangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('undangans', function (Blueprint $table) {
            $table->id();
            $table->string('no_urut');
            $table->string('pengirim');
            $table->string('penerima');
            $table->date('tanggal');
            $table->string('nomor_surat');
            $table->string('perihal');
            $table->string('keterangan')->nullable();
            $table->string('softcopy')->nullable();
            $table->dateTime('tanggal_sekretariat');
            $table->dateTime('tanggal_sekretaris')->nullable();
            $table->dateTime('tanggal_pimpinan')->nullable();
            $table->string('kode_unik')->nullable();
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
        Schema::dropIfExists('undangans');
    }
}

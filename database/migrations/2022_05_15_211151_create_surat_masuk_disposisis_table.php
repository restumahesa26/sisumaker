<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratMasukDisposisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_masuk_disposisis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surat_masuk_id')->references('id')->on('surat_masuks')->onDelete('cascade')->onUpdate('cascade');
            $table->string('tujuan', 100);
            $table->string('tindak_lanjut', 50);
            $table->string('catatan', 100)->nullable();
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
        Schema::dropIfExists('disposisis');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUndanganDisposisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('undangan_disposisis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('undangan_id')->references('id')->on('undangans')->onDelete('cascade')->onUpdate('cascade');
            $table->string('tujuan');
            $table->string('tindak_lanjut');
            $table->string('catatan');
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
        Schema::dropIfExists('undangan_disposisis');
    }
}

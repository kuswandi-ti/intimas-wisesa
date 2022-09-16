<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangKeluarDtlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_keluar_dtl', function (Blueprint $table) {
            $table->id();
            $table->foreign('header_id')->references('id')->on('barang_keluar_hdr');
            $table->foreign('barang_id')->references('id')->on('barang');
            $table->text('deskripsi_barang')->nullable();
            $table->integer('qty');
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
        Schema::dropIfExists('barang_keluar_dtl');
    }
}

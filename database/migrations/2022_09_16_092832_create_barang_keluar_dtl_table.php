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
            $table->bigInteger('header_id')->unsigned()->nullable();
            $table->bigInteger('barang_id')->unsigned()->nullable();
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->string('satuan');
            $table->text('deskripsi_barang')->nullable();
            $table->integer('qty');
            $table->timestamps();
            $table->foreign('header_id')->references('id')->on('barang_keluar_hdr');
            $table->foreign('barang_id')->references('id')->on('barang');
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

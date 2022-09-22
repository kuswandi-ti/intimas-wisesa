<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangMasukDtlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_masuk_dtl', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('header_id')->unsigned()->nullable();
            $table->bigInteger('barang_id')->unsigned()->nullable();
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->string('satuan');
            $table->text('deskripsi_barang')->nullable();
            $table->integer('qty');
            $table->timestamps();
            $table->foreign('header_id')->references('id')->on('barang_masuk_hdr');
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
        Schema::dropIfExists('barang_masuk_dtl');
    }
}

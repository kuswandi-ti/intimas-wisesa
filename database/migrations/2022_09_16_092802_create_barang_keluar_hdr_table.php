<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangKeluarHdrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_keluar_hdr', function (Blueprint $table) {
            $table->id();
            $table->string('no_dokumen');
            $table->date('tgl_dokumen');
            $table->bigInteger('customer_id')->unsigned()->nullable();
            $table->text('alamat')->nullable();
            $table->string('nama_kontak')->nullable();
            $table->string('nomor_kontak')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang_keluar_hdr');
    }
}

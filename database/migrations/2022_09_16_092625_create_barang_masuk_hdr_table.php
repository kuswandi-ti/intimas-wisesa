<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangMasukHdrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_masuk_hdr', function (Blueprint $table) {
            $table->id();
            $table->string('no_dokumen');
            $table->date('tgl_dokumen');
            $table->bigInteger('supplier_id')->unsigned()->nullable();
            $table->text('alamat')->nullable();
            $table->string('nama_kontak')->nullable();
            $table->string('nomor_kontak')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
            $table->foreign('supplier_id')->references('id')->on('supplier');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang_masuk_hdr');
    }
}

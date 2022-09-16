<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCustomerToBarangMasukHdrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('barang_masuk_hdr', function (Blueprint $table) {
            $table->foreign('header_id')->references('id')->on('barang_masuk_hdr')->after('tgl_dokumen');
            $table->foreign('supplier_id')->references('id')->on('supplier')->after('header_id');
            $table->text('alamat')->after('supplier_id')->nullable();
            $table->string('nama_kontak')->after('alamat')->nullable();
            $table->string('nomor_kontak')->after('nama_kontak')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('barang_masuk_hdr', function (Blueprint $table) {
            $table->dropForeign('barang_masuk_hdr_supplier_id_foreign');
            $table->dropIndex('barang_masuk_hdr_supplier_id_index');
            $table->dropColumn([
                'supplier_id',
                'alamat',
                'nama_kontak',
                'nomor_kontak'
            ]);
        });
    }
}

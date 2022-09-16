<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCustomerToBarangKeluarHdrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('barang_keluar_hdr', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('customer')->after('tgl_dokumen');
            $table->text('alamat')->after('customer_id')->nullable();
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
        Schema::table('barang_keluar_hdr', function (Blueprint $table) {
            $table->dropForeign('barang_keluar_hdr_customer_id_foreign');
            $table->dropIndex('barang_keluar_hdr_customer_id_index');
            $table->dropColumn([
                'customer_id',
                'alamat',
                'nama_kontak',
                'nomor_kontak'
            ]);
        });
    }
}

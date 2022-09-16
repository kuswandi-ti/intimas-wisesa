<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnBarangToBarangMasukDtlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('barang_masuk_dtl', function (Blueprint $table) {
            $table->foreign('barang_id')->references('id')->on('barang')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('barang_masuk_dtl', function (Blueprint $table) {
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

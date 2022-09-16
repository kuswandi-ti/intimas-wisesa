<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBarangToBarangKeluarDtl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('barang_keluar_dtl', function (Blueprint $table) {
            $table->string('nama_barang')->after('qty');
			$table->text('deskripsi_barang')->after('nama_barang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('barang_keluar_dtl', function (Blueprint $table) {
            $table->dropColumn([
				'nama_barang',
				'deskripsi_barang'
			]);
        });
    }
}

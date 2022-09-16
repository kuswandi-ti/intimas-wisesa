<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSatuanToBarangMasukDtl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('barang_masuk_dtl', function (Blueprint $table) {
            $table->string('satuan')->after('deskripsi_barang');
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
            $table->dropColumn([
				'satuan'
			]);
        });
    }
}

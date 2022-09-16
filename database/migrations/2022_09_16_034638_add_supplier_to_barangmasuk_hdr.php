<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSupplierToBarangmasukHdr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('barang_masuk_hdr', function (Blueprint $table) {
            $table->string('kode_supplier')->after('tgl_dokumen');
			$table->string('nama_supplier')->after('kode_supplier');
			$table->string('alamat_supplier')->after('nama_supplier');
			$table->string('contact_name_supplier')->after('alamat_supplier');
			$table->string('contact_no_supplier')->after('contact_name_supplier');
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
            $table->dropColumn([
				'kode_supplier',
				'nama_supplier',
				'alamat_supplier',
				'contact_name_supplier',
				'contact_no_supplier'
			]);
        });
    }
}

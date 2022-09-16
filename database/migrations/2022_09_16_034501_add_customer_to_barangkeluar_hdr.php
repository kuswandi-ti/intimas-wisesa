<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCustomerToBarangkeluarHdr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('barang_keluar_hdr', function (Blueprint $table) {
            $table->string('kode_customer')->after('tgl_customer');
			$table->string('nama_customer')->after('kode_customer');
			$table->string('alamat_customer')->after('nama_customer');
			$table->string('contact_name_customer')->after('alamat_customer');
			$table->string('contact_no_customer')->after('contact_name_customer');
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
            $table->dropColumn([
				'kode_customer',
				'nama_customer',
				'alamat_customer',
				'contact_name_customer',
				'contact_no_customer'
			]);
        });
    }
}

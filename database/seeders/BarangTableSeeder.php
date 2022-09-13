<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BarangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barang')->insert([
            'kode_barang'       => 'B001',
            'nama_barang'       => 'Laptop Core i7',
            'deskripsi'         => 'Laptop spek game',
            'nama_supplier'     => 'PT. ABC',
            'satuan'            => 'Unit',
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('barang')->insert([
            'kode_barang'       => 'B002',
            'nama_barang'       => 'Kardus Bekas Packing',
            'deskripsi'         => 'Dus bekas unit laptong & monitor',
            'nama_supplier'     => 'PT. DEF',
            'satuan'            => 'Kg',
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('barang')->insert([
            'kode_barang'       => 'B003',
            'nama_barang'       => 'Keyboard Logitech',
            'deskripsi'         => 'Keyboard logitech type wireless',
            'nama_supplier'     => 'PT. DEF',
            'satuan'            => 'Pcs',
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}

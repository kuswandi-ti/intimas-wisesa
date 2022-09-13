<?php

namespace App\Imports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\ToModel;

class BarangImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Barang([
            'kode_barang'   => $row[0],
            'nama_barang'   => $row[1],
            'deskripsi'     => $row[2],
            'nama_customer' => $row[3],
            'nama_supplier' => $row[4],
            'satuan'        => $row[5],
        ]);
    }
}

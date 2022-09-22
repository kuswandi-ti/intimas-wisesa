<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'supplier';
    protected $fillable = [
        'kode_supplier', 'nama_supplier', 'alamat',
        'nama_kontak', 'nomor_kontak'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table        = 'customer';
    protected $primaryKey   = 'id';

    protected $fillable = [
        'kode_customer', 'nama_customer', 'alamat',
        'nama_kontak', 'nomor_kontak'
    ];
}

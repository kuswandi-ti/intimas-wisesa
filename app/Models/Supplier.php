<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'supplier';
    protected $primaryKey = 'id';

    protected $fillable = [
        'kode_supplier', 'nama_supplier', 'alamat',
        'contact_name', 'contact_no'
    ];
}

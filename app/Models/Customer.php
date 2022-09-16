<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';
    protected $primaryKey = 'id';

    protected $fillable = [
        'kode_customer', 'nama_customer', 'alamat',
        'contact_name', 'contact_no'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_restoran', 'nama_pemilik', 'nomor_telepon', 'email','kota','alamat' // ... other fields as per your database columns
    ];
    protected $table = 'Tenant';
}

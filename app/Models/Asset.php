<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kategori',
        'lokasi',
        'status',
        'tanggal_pembelian',
        'nilai',
    ];

    protected $dates = ['tanggal_pembelian'];
}
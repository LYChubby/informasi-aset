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
        'deskripsi',
    ];

    protected $casts = [
    'tanggal_pembelian' => 'datetime', // Ganti 'date' menjadi 'datetime'
];

// Atau lebih baik gunakan:
protected $dates = [
    'tanggal_pembelian',
    'created_at',
    'updated_at',
];
}
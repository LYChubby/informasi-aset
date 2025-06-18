<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAset extends Model
{
    use HasFactory;

    protected $fillable = [
        'aset_id',
        'jenis',
        'merk',
        'tipe',
        'serial_number',
        'hostname',
    ];

    public function asetIT()
    {
        return $this->belongsTo(AsetIT::class, 'aset_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'aset_id',
        'title',
        'nama_aset',
        'kategori',
        'lokasi',
        'laporan',
        'status',
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'aset_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

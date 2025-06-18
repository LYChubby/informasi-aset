<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsetIT extends Model
{
    use HasFactory;

    protected $table = 'asets';

    protected $fillable = [
        'tgl_terima',
        'kondisi',
        'status',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dataAset()
    {
        return $this->hasOne(DataAset::class, 'aset_id');
    }
}

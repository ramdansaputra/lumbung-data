<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanAnggaran extends Model
{
    use HasFactory;

    protected $table = 'kegiatan_anggaran';

    protected $fillable = [
        'bidang_id',
        'nama_kegiatan',
        'kode',
    ];

    public function bidangAnggaran()
    {
        return $this->belongsTo(BidangAnggaran::class, 'bidang_id');
    }
}

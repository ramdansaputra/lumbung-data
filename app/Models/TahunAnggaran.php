<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAnggaran extends Model
{
    use HasFactory;

    protected $table = 'tahun_anggaran';

    protected $fillable = [
        'tahun',
        'status',
    ];

    protected $casts = [
        'tahun' => 'integer',
    ];

    public function apbdes()
    {
        return $this->hasMany(Apbdes::class, 'tahun_id');
    }

    public function kasDesa()
    {
        return $this->hasMany(KasDesa::class, 'tahun_id');
    }
}

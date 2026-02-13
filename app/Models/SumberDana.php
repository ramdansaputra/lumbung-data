<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SumberDana extends Model
{
    use HasFactory;

    protected $table = 'sumber_dana';

    protected $fillable = [
        'nama_sumber',
        'keterangan',
    ];

    public function apbdes()
    {
        return $this->hasMany(Apbdes::class, 'sumber_dana_id');
    }
}

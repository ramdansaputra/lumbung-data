<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vaksin extends Model {
    use HasFactory, SoftDeletes;

    protected $table = 'vaksin';

    protected $fillable = [
        'nik',
        'nama_penerima',
        'jenis_kelamin',
        'tgl_lahir',
        'umur',
        'dusun',
        'rt',
        'rw',
        'alamat',
        'jenis_vaksin',
        'kategori_vaksin',
        'dosis',
        'tanggal_vaksin',
        'tempat_pelayanan',
        'petugas',
        'batch_vaksin',
        'status',
        'no_sertifikat',
        'keterangan',
    ];

    protected $casts = [
        'tgl_lahir' => 'date',
        'tanggal_vaksin' => 'date',
        'dosis' => 'integer',
        'umur' => 'integer',
    ];

    // Scopes
    public function scopeSudahVaksin($query) {
        return $query->where('status', 'sudah');
    }

    public function scopeBelumVaksin($query) {
        return $query->where('status', 'belum');
    }

    public function scopeByDusun($query, string $dusun) {
        return $query->where('dusun', $dusun);
    }

    public function scopeByJenisVaksin($query, string $jenis) {
        return $query->where('jenis_vaksin', $jenis);
    }

    // Accessor
    public function getDosiLabelAttribute(): string {
        return match ($this->dosis) {
            1 => 'Dosis 1',
            2 => 'Dosis 2',
            3 => 'Dosis 3',
            4 => 'Booster',
            default => 'Dosis ' . $this->dosis,
        };
    }

    public function getStatusLabelAttribute(): string {
        return match ($this->status) {
            'sudah' => 'Sudah Vaksin',
            'belum' => 'Belum Vaksin',
            'tunda' => 'Ditunda',
            default => '-',
        };
    }

    public function getStatusBadgeAttribute(): string {
        return match ($this->status) {
            'sudah' => 'success',
            'belum' => 'danger',
            'tunda' => 'warning',
            default => 'secondary',
        };
    }
}

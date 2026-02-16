<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kia extends Model {
    use HasFactory, SoftDeletes;

    protected $table = 'kia';

    protected $fillable = [
        'no_register',
        'posyandu_id',
        'nik_ibu',
        'nama_ibu',
        'tgl_lahir_ibu',
        'umur_ibu',
        'alamat_ibu',
        'dusun',
        'rt',
        'rw',
        'no_hp',
        'kehamilan_ke',
        'hpht',
        'taksiran_lahir',
        'status_kehamilan',
        'status_resiko',
        'tempat_pemeriksaan',
        'tanggal_melahirkan',
        'jenis_persalinan',
        'penolong_persalinan',
        'nik_anak',
        'nama_anak',
        'jenis_kelamin_anak',
        'tgl_lahir_anak',
        'berat_lahir',
        'panjang_lahir',
        'keterangan',
    ];

    protected $casts = [
        'tgl_lahir_ibu' => 'date',
        'hpht' => 'date',
        'taksiran_lahir' => 'date',
        'tanggal_melahirkan' => 'date',
        'tgl_lahir_anak' => 'date',
        'berat_lahir' => 'decimal:2',
        'panjang_lahir' => 'decimal:2',
        'kehamilan_ke' => 'integer',
        'umur_ibu' => 'integer',
    ];

    // Relasi
    public function posyandu() {
        return $this->belongsTo(Posyandu::class);
    }

    public function pemantauanBumil() {
        return $this->hasMany(PemantauanBumil::class);
    }

    public function pemantauanAnak() {
        return $this->hasMany(PemantauanAnak::class);
    }

    public function stuntingScorecard() {
        return $this->hasMany(StuntingScorecard::class);
    }

    // Scope
    public function scopeHamil($query) {
        return $query->where('status_kehamilan', 'hamil');
    }

    public function scopeResikoTinggi($query) {
        return $query->where('status_resiko', 'resiko_tinggi');
    }

    public function scopePunyaAnak($query) {
        return $query->whereNotNull('nama_anak');
    }

    // Generate no register otomatis
    public static function generateNoRegister(): string {
        $tahun = date('Y');
        $bulan = date('m');
        $lastId = self::withTrashed()->whereYear('created_at', $tahun)->count() + 1;
        return 'KIA/' . $tahun . '/' . $bulan . '/' . str_pad($lastId, 4, '0', STR_PAD_LEFT);
    }

    // Accessor
    public function getUmurAnakBulanAttribute(): ?int {
        if (!$this->tgl_lahir_anak) return null;
        return (int) $this->tgl_lahir_anak->diffInMonths(now());
    }

    public function getStatusResikoLabelAttribute(): string {
        return match ($this->status_resiko) {
            'resiko_tinggi' => 'Risiko Tinggi',
            'resiko_rendah' => 'Risiko Rendah',
            default => 'Normal',
        };
    }
}

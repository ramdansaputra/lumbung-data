<?php

require_once 'vendor/autoload.php';

use Illuminate\Foundation\Application;
use App\Models\Penduduk;
use App\Models\PendataanKesehatan;

$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "Checking for existing penduduk records...\n";
$penduduk = Penduduk::take(10)->get();

if ($penduduk->isEmpty()) {
    echo "No penduduk records found. Creating sample penduduk first...\n";

    // Create sample penduduk
    $penduduk1 = Penduduk::create([
        'nama' => 'Ahmad Raffi',
        'nik' => '3301234567890001',
        'tanggal_lahir' => '2020-01-15',
        'jenis_kelamin' => 'L',
        'alamat' => 'Jl. Sudirman No. 1',
        'rt' => '001',
        'rw' => '001',
        'desa_id' => 1,
        'wilayah_id' => 1,
        'keluarga_id' => 1,
        'rumah_tangga_id' => 1,
        'status_kependudukan' => 'tetap',
        'agama' => 'Islam',
        'pendidikan' => 'SD',
        'pekerjaan' => 'Pelajar',
        'status_perkawinan' => 'belum_kawin',
        'kewarganegaraan' => 'WNI'
    ]);

    $penduduk2 = Penduduk::create([
        'nama' => 'Zahra Alifah',
        'nik' => '3301234567890002',
        'tanggal_lahir' => '2021-03-20',
        'jenis_kelamin' => 'P',
        'alamat' => 'Jl. Sudirman No. 2',
        'rt' => '001',
        'rw' => '001',
        'desa_id' => 1,
        'wilayah_id' => 1,
        'keluarga_id' => 1,
        'rumah_tangga_id' => 1,
        'status_kependudukan' => 'tetap',
        'agama' => 'Islam',
        'pendidikan' => 'TK',
        'pekerjaan' => 'Pelajar',
        'status_perkawinan' => 'belum_kawin',
        'kewarganegaraan' => 'WNI'
    ]);

    $penduduk3 = Penduduk::create([
        'nama' => 'Siti Nurhaliza',
        'nik' => '3301234567890003',
        'tanggal_lahir' => '2019-07-10',
        'jenis_kelamin' => 'P',
        'alamat' => 'Jl. Sudirman No. 3',
        'rt' => '001',
        'rw' => '001',
        'desa_id' => 1,
        'wilayah_id' => 1,
        'keluarga_id' => 1,
        'rumah_tangga_id' => 1,
        'status_kependudukan' => 'tetap',
        'agama' => 'Islam',
        'pendidikan' => 'SD',
        'pekerjaan' => 'Pelajar',
        'status_perkawinan' => 'belum_kawin',
        'kewarganegaraan' => 'WNI'
    ]);

    $penduduk4 = Penduduk::create([
        'nama' => 'Budi Santoso',
        'nik' => '3301234567890004',
        'tanggal_lahir' => '1985-05-12',
        'jenis_kelamin' => 'L',
        'alamat' => 'Jl. Sudirman No. 4',
        'rt' => '002',
        'rw' => '001',
        'desa_id' => 1,
        'wilayah_id' => 1,
        'keluarga_id' => 2,
        'rumah_tangga_id' => 2,
        'status_kependudukan' => 'tetap',
        'agama' => 'Islam',
        'pendidikan' => 'SMA',
        'pekerjaan' => 'Petani',
        'status_perkawinan' => 'kawin',
        'kewarganegaraan' => 'WNI'
    ]);

    $penduduk5 = Penduduk::create([
        'nama' => 'Maya Sari',
        'nik' => '3301234567890005',
        'tanggal_lahir' => '1988-09-25',
        'jenis_kelamin' => 'P',
        'alamat' => 'Jl. Sudirman No. 4',
        'rt' => '002',
        'rw' => '001',
        'desa_id' => 1,
        'wilayah_id' => 1,
        'keluarga_id' => 2,
        'rumah_tangga_id' => 2,
        'status_kependudukan' => 'tetap',
        'agama' => 'Islam',
        'pendidikan' => 'SMA',
        'pekerjaan' => 'Ibu Rumah Tangga',
        'status_perkawinan' => 'kawin',
        'kewarganegaraan' => 'WNI'
    ]);

    $penduduk = collect([$penduduk1, $penduduk2, $penduduk3, $penduduk4, $penduduk5]);
}

echo "Creating sample pendataan kesehatan data...\n";

$jenis_pemeriksaan = [
    'Pemeriksaan Rutin',
    'Pemeriksaan Balita',
    'Pemeriksaan Lansia',
    'Pemeriksaan Kehamilan',
    'Pemeriksaan Umum',
    'Pemeriksaan Darah',
    'Pemeriksaan Gigi',
    'Pemeriksaan Mata'
];

$tekanan_darah_options = [
    '120/80',
    '130/85',
    '110/70',
    '125/82',
    '115/75',
    '135/90'
];

$status_gizi_options = ['normal', 'kurang', 'lebih', 'obesitas'];

// Create sample pendataan kesehatan records
foreach ($penduduk as $p) {
    // Create multiple records per penduduk with different dates
    for ($i = 0; $i < rand(1, 3); $i++) {
        PendataanKesehatan::create([
            'penduduk_id' => $p->id,
            'tanggal' => now()->subDays(rand(1, 90)),
            'jenis_pemeriksaan' => collect($jenis_pemeriksaan)->random(),
            'berat_badan' => rand(40, 120) + (rand(0, 9) / 10),
            'tinggi_badan' => rand(80, 180) + (rand(0, 9) / 10),
            'tekanan_darah' => collect($tekanan_darah_options)->random(),
            'status_gizi' => collect($status_gizi_options)->random(),
            'keterangan' => 'Pemeriksaan kesehatan rutin',
            'kelurahan' => 'Kelurahan ' . rand(1, 10)
        ]);
    }
}

echo "Sample data created successfully!\n";
echo "Total penduduk records: " . Penduduk::count() . "\n";
echo "Total pendataan kesehatan records: " . PendataanKesehatan::count() . "\n";

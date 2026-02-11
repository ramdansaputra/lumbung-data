<?php

require_once 'vendor/autoload.php';

use Illuminate\Foundation\Application;
use App\Models\Penduduk;
use App\Models\Vaksin;

$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "Checking for existing penduduk records...\n";
$penduduk = Penduduk::take(5)->get();

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

    $penduduk = collect([$penduduk1, $penduduk2, $penduduk3]);
}

echo "Creating sample vaksin data...\n";

$jenis_vaksin = [
    'Hepatitis B',
    'DPT',
    'Polio',
    'Campak',
    'BCG',
    'MMR',
    'Varisela',
    'HPV'
];

$petugas_options = [
    'Dr. Ahmad',
    'Dr. Siti',
    'Dr. Budi',
    'Suster Ani',
    'Suster Maya'
];

$status_options = ['sudah', 'belum', 'jadwal_ulang'];

// Create sample vaksin records
foreach ($penduduk as $p) {
    // Create multiple vaksin records per penduduk
    for ($i = 0; $i < rand(1, 3); $i++) {
        Vaksin::create([
            'penduduk_id' => $p->id,
            'jenis_vaksin' => collect($jenis_vaksin)->random(),
            'dosis' => rand(1, 3),
            'tanggal_vaksinasi' => now()->subDays(rand(1, 365)),
            'tempat_vaksinasi' => 'Puskesmas ' . rand(1, 5),
            'petugas' => collect($petugas_options)->random(),
            'status' => collect($status_options)->random(),
            'efek_samping' => rand(0, 1) ? 'Tidak ada' : 'Demam ringan',
            'tanggal_jadwal_ulang' => rand(0, 1) ? now()->addDays(rand(30, 90)) : null
        ]);
    }
}

echo "Sample data created successfully!\n";
echo "Total vaksin records: " . Vaksin::count() . "\n";
?>

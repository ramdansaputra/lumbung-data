<?php

require_once 'vendor/autoload.php';

use Illuminate\Foundation\Application;
use App\Models\Penduduk;
use App\Models\PemantauanKesehatan;

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

echo "Creating sample pemantauan kesehatan data...\n";

$jenis_pemantauan_options = [
    'Pemeriksaan Rutin Balita',
    'Pemeriksaan Kehamilan',
    'Pemeriksaan Lansia',
    'Pemeriksaan Umum',
    'Pemeriksaan Darah',
    'Pemeriksaan Gigi',
    'Pemeriksaan Mata'
];

$petugas_options = [
    'Dr. Ahmad',
    'Dr. Siti',
    'Dr. Budi',
    'Suster Ani',
    'Suster Maya'
];

$status_options = ['aktif', 'selesai', 'ditunda'];
$status_stunting_options = ['normal', 'stunting', 'risiko_stunting'];

// Create sample pemantauan kesehatan records
foreach ($penduduk as $p) {
    // Create multiple records per penduduk with different dates
    for ($i = 0; $i < rand(1, 3); $i++) {
        PemantauanKesehatan::create([
            'penduduk_id' => $p->id,
            'tanggal' => now()->subDays(rand(1, 90)),
            'nama_pasien' => $p->nama,
            'jenis_pemantauan' => collect($jenis_pemantauan_options)->random(),
            'tanggal_mulai' => now()->subDays(rand(1, 90)),
            'frekuensi' => rand(1, 12) . ' bulan',
            'petugas' => collect($petugas_options)->random(),
            'status' => collect($status_options)->random(),
            'catatan' => 'Pemeriksaan kesehatan rutin',
            'status_stunting' => collect($status_stunting_options)->random()
        ]);
    }
}

echo "Sample data created successfully!\n";
echo "Total pemantauan kesehatan records: " . PemantauanKesehatan::count() . "\n";
?>

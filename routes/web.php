<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\AnalisisController;
use App\Http\Controllers\Admin\BantuanController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\IdentitasDesaController;
use App\Http\Controllers\Admin\InfoDesaController;
use App\Http\Controllers\Admin\KehadiranController;
use App\Http\Controllers\Admin\KeluargaController;
use App\Http\Controllers\Admin\KesehatanController;
use App\Http\Controllers\Admin\KeuanganController;
use App\Http\Controllers\Admin\LayananSuratController;
use App\Http\Controllers\Admin\PendudukController;
use App\Http\Controllers\Admin\PengaduanController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Admin\RumahTanggaController;
use App\Http\Controllers\Admin\RumahTanggaAnggotaController;
use App\Http\Controllers\Admin\SekretariatController;
use App\Http\Controllers\Admin\WilayahController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SetupController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| FRONTEND ROUTES
|--------------------------------------------------------------------------
*/

// HOME
Route::get('/', [App\Http\Controllers\FrontendController::class, 'home'])->name('home');

// BERITA DESA
Route::get('/berita', [App\Http\Controllers\FrontendController::class, 'berita'])->name('berita');
Route::get('/artikel/{id}', [App\Http\Controllers\FrontendController::class, 'artikelShow'])->name('artikel.show');

// PROGRAM KERJA
Route::get('/program', function () {
    return view('frontend.program');
})->name('program');

// PROFIL DESA
Route::get('/profil', [App\Http\Controllers\FrontendController::class, 'profil'])->name('profil');

// WILAYAH ADMINISTRATIF
Route::get('/wilayah', [App\Http\Controllers\FrontendController::class, 'wilayah'])->name('wilayah');

// KONTAK
Route::get('/kontak', function () {
    return view('frontend.kontak');
})->name('kontak');

// LOGIN
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// SETUP
Route::get('/setup', [SetupController::class, 'showSetup'])->name('setup')->middleware('check.setup');
Route::post('/setup', [SetupController::class, 'register'])->name('setup.register');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES (JANGAN DIUBAH)
|--------------------------------------------------------------------------
*/

// Identitas Desa routes - accessible without identitas desa check
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    /*
    |--------------------------------------------------------------------------
    | IDENTITAS DESA
    |--------------------------------------------------------------------------
    */
    Route::get(
        '/identitas-desa',
        [App\Http\Controllers\Admin\IdentitasDesaController::class, 'index']
    )->name('identitas-desa.index');

    Route::get(
        '/identitas-desa/edit',
        [App\Http\Controllers\Admin\IdentitasDesaController::class, 'edit']
    )->name('identitas-desa.edit');

    Route::put(
        '/identitas-desa',
        [App\Http\Controllers\Admin\IdentitasDesaController::class, 'update']
    )->name('identitas-desa.update');
});

// Other admin routes - require identitas desa to be filled
Route::prefix('admin')->name('admin.')->middleware(['auth', 'check.identitas.desa'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | STATISTIK DESA
    |--------------------------------------------------------------------------
    */
    Route::get('/statistik/kependudukan', [\App\Http\Controllers\Admin\StatistikController::class, 'kependudukan'])->name('statistik.kependudukan');

    Route::get('/statistik/laporan-bulanan', function (\Illuminate\Http\Request $request) {
        // Bulan dan tahun bisa diteruskan via query ?month=1&year=2024
        $month = $request->query('month');
        $year = $request->query('year');

        $now = Carbon::now();
        if ($month && $year) {
            try {
                $start = Carbon::createFromDate((int)$year, (int)$month, 1)->startOfDay();
            } catch (\Exception $e) {
                $start = $now->copy()->startOfMonth();
            }
        } else {
            $start = $now->copy()->startOfMonth();
        }
        $end = $start->copy()->endOfMonth()->endOfDay();

        $year = $start->year;
        $month = $start->month;

        // Total penduduk hidup saat ini
        $total_penduduk = \App\Models\Penduduk::where('status_hidup', 'hidup')->count();

        // Kelahiran: penduduk yang ber-tanggal_lahir pada bulan ini dan catatan dibuat pada bulan ini
        $lahir = \App\Models\Penduduk::whereYear('tanggal_lahir', $year)
            ->whereMonth('tanggal_lahir', $month)
            ->whereBetween('created_at', [$start, $end])
            ->count();

        // Penduduk baru yang tercatat pada bulan ini
        $created = \App\Models\Penduduk::whereBetween('created_at', [$start, $end])->count();

        // Pendatang: entri baru selain kelahiran
        $datang = max(0, $created - $lahir);

        // Kematian: penduduk yang status_hidup berubah menjadi 'meninggal' pada bulan ini (updated_at)
        $meninggal = \App\Models\Penduduk::where('status_hidup', 'meninggal')
            ->whereBetween('updated_at', [$start, $end])
            ->count();

        // Pindah: tidak ada field eksplisit, set 0 (atau modifikasi jika ada tabel mutasi)
        $pindah = 0;

        $mutasi = [
            'lahir' => $lahir,
            'meninggal' => $meninggal,
            'datang' => $datang,
            'pindah' => $pindah,
        ];

        // Detail laporan dengan persentase terhadap total penduduk
        $makePercent = function ($count) use ($total_penduduk) {
            $pct = $total_penduduk > 0 ? round(($count / $total_penduduk) * 100, 2) : 0;
            $sign = $pct >= 0 ? '+' : '';
            return $sign . $pct . '%';
        };

        $laporan = [
            ['kategori' => 'Kelahiran', 'jumlah' => $lahir, 'persen' => $makePercent($lahir)],
            ['kategori' => 'Kematian', 'jumlah' => $meninggal, 'persen' => $makePercent($meninggal)],
            ['kategori' => 'Pendatang', 'jumlah' => $datang, 'persen' => $makePercent($datang)],
            ['kategori' => 'Pindah', 'jumlah' => $pindah, 'persen' => $makePercent($pindah)],
        ];

        $data = [
            'bulan' => $start->translatedFormat('F Y'),
            'total_penduduk' => $total_penduduk,
            'mutasi' => $mutasi,
            'laporan' => $laporan,
        ];

        return view('admin.statistik.laporan-bulanan', compact('data'));
    })->name('statistik.laporan-bulanan');

    Route::get('/statistik/kelompok-rentan', function () {
        $data = [
            'kelompok_rentan' => [
                'lansia_sendiri' => 45,
                'disabilitas' => 23,
                'janda_duda' => 67,
                'yatim_piatu' => 12,
                'fakir_miskin' => 156,
                'anak_terlantar' => 8,
            ],
            'bantuan' => [
                'PKH' => 89,
                'BPNT' => 134,
                'BLT' => 45,
                'PBI_JKN' => 78,
            ]
        ];

        return view('admin.statistik.kelompok-rentan', compact('data'));
    })->name('statistik.kelompok-rentan');

    Route::get('/statistik/penduduk', function () {
        // Get all population data with relationships for detailed report
        $penduduk = \App\Models\Penduduk::with(['keluargas'])
            ->where('status_hidup', 'hidup')
            ->orderBy('nama')
            ->paginate(50);

        // Statistics for summary cards
        $total_penduduk = \App\Models\Penduduk::where('status_hidup', 'hidup')->count();
        $laki_laki = \App\Models\Penduduk::where('status_hidup', 'hidup')
            ->where('jenis_kelamin', 'L')
            ->count();
        $perempuan = \App\Models\Penduduk::where('status_hidup', 'hidup')
            ->where('jenis_kelamin', 'P')
            ->count();
        $kepala_keluarga = \App\Models\Keluarga::count();

        $data = [
            'penduduk' => $penduduk,
            'total_penduduk' => $total_penduduk,
            'laki_laki' => $laki_laki,
            'perempuan' => $perempuan,
            'kepala_keluarga' => $kepala_keluarga,
        ];

        return view('admin.statistik.penduduk', compact('data'));
    })->name('statistik.penduduk');

    /*
    |--------------------------------------------------------------------------
    | MASTER DATA
    |--------------------------------------------------------------------------
    */
    Route::get('/penduduk', [App\Http\Controllers\Admin\PendudukController::class, 'index'])->name('penduduk');
    Route::get('/penduduk/create', [App\Http\Controllers\Admin\PendudukController::class, 'create'])->name('penduduk.create');
    Route::post('/penduduk', [App\Http\Controllers\Admin\PendudukController::class, 'store'])->name('penduduk.store');
    Route::get('/penduduk/{penduduk}', [App\Http\Controllers\Admin\PendudukController::class, 'show'])->name('penduduk.show');
    Route::post('/penduduk/import', [App\Http\Controllers\Admin\PendudukController::class, 'import'])->name('penduduk.import');
    Route::get('/penduduk/{penduduk}/edit', [App\Http\Controllers\Admin\PendudukController::class, 'edit'])->name('penduduk.edit');
    Route::put('/penduduk/{penduduk}', [App\Http\Controllers\Admin\PendudukController::class, 'update'])->name('penduduk.update');
    Route::get('/penduduk/{penduduk}/delete', [App\Http\Controllers\Admin\PendudukController::class, 'confirmDestroy'])->name('penduduk.confirm-destroy');
    Route::delete('/penduduk/{penduduk}', [App\Http\Controllers\Admin\PendudukController::class, 'destroy'])->name('penduduk.destroy');

    Route::get('/keluarga', [App\Http\Controllers\admin\KeluargaController::class, 'index'])->name('keluarga');
    Route::get('/keluarga/create', [App\Http\Controllers\admin\KeluargaController::class, 'create'])->name('keluarga.create');
    Route::post('/keluarga', [App\Http\Controllers\admin\KeluargaController::class, 'store'])->name('keluarga.store');
    Route::get('/keluarga/{keluarga}', [App\Http\Controllers\admin\KeluargaController::class, 'show'])->name('keluarga.show');
    Route::get('/keluarga/{keluarga}/edit', [App\Http\Controllers\admin\KeluargaController::class, 'edit'])->name('keluarga.edit');
    Route::put('/keluarga/{keluarga}', [App\Http\Controllers\admin\KeluargaController::class, 'update'])->name('keluarga.update');
    Route::get('/keluarga/{keluarga}/delete', [App\Http\Controllers\admin\KeluargaController::class, 'confirmDestroy'])->name('keluarga.confirm-destroy');
    Route::delete('/keluarga/{keluarga}', [App\Http\Controllers\admin\KeluargaController::class, 'destroy'])->name('keluarga.destroy');

    Route::resource('rumah-tangga', App\Http\Controllers\Admin\RumahTanggaController::class)->names([
        'index' => 'rumah-tangga.index',
        'create' => 'rumah-tangga.create',
        'store' => 'rumah-tangga.store',
        'show' => 'rumah-tangga.show',
        'edit' => 'rumah-tangga.edit',
        'update' => 'rumah-tangga.update',
        'destroy' => 'rumah-tangga.destroy',
    ]);

    Route::get('/rumah-tangga/{rumahTangga}/delete', [App\Http\Controllers\Admin\RumahTanggaController::class, 'confirmDestroy'])->name('rumah-tangga.confirm-destroy');

    // Rumah Tangga Anggota Routes
    Route::prefix('rumah-tangga/{rumahTangga}/anggota')->name('rumah-tangga-anggota.')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\RumahTanggaAnggotaController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Admin\RumahTanggaAnggotaController::class, 'create'])->name('create');
        Route::post('/', [App\Http\Controllers\Admin\RumahTanggaAnggotaController::class, 'store'])->name('store');
        Route::get('/{anggota}/edit', [App\Http\Controllers\Admin\RumahTanggaAnggotaController::class, 'edit'])->name('edit');
        Route::put('/{anggota}', [App\Http\Controllers\Admin\RumahTanggaAnggotaController::class, 'update'])->name('update');
        Route::delete('/{anggota}', [App\Http\Controllers\Admin\RumahTanggaAnggotaController::class, 'destroy'])->name('destroy');
    });

    Route::get('/kelompok', function () {
        return view('admin.kelompok');
    })->name('kelompok');

    Route::get('/data-suplemen', function () {
        return view('admin.data-suplemen');
    })->name('data-suplemen');

    Route::get('/calon-pemilih', function () {
        return view('admin.calon-pemilih');
    })->name('calon-pemilih');

    /*
    |--------------------------------------------------------------------------
    | LAYANAN
    |--------------------------------------------------------------------------
    */
    Route::get('/surat', function () {
        return view('admin.surat');
    })->name('surat');

    /*
    |--------------------------------------------------------------------------
    | LAYANAN SURAT
    |--------------------------------------------------------------------------
    */
    Route::get('/layanan-surat/pengaturan', [App\Http\Controllers\Admin\LayananSuratController::class, 'pengaturan'])->name('layanan-surat.pengaturan');
    Route::get('/layanan-surat/cetak', [App\Http\Controllers\Admin\LayananSuratController::class, 'cetak'])->name('layanan-surat.cetak');
    Route::get('/layanan-surat/permohonan', [App\Http\Controllers\Admin\LayananSuratController::class, 'permohonan'])->name('layanan-surat.permohonan');
    Route::get('/layanan-surat/arsip', [App\Http\Controllers\Admin\LayananSuratController::class, 'arsip'])->name('layanan-surat.arsip');
    Route::get('/layanan-surat/daftar-persyaratan', [App\Http\Controllers\Admin\LayananSuratController::class, 'daftarPersyaratan'])->name('layanan-surat.daftar-persyaratan');
    Route::post('/layanan-surat/template', [App\Http\Controllers\Admin\LayananSuratController::class, 'storeTemplate'])->name('layanan-surat.storeTemplate');

    /*
    |--------------------------------------------------------------------------
    | SEKRETARIAT
    |--------------------------------------------------------------------------
    */
    Route::get('/sekretariat/informasi-publik', [App\Http\Controllers\Admin\SekretariatController::class, 'informasiPublik'])->name('sekretariat.informasi-publik');
    Route::get('/sekretariat/inventaris', [App\Http\Controllers\Admin\SekretariatController::class, 'inventaris'])->name('sekretariat.inventaris');
    Route::get('/sekretariat/klasifikasi-surat', [App\Http\Controllers\Admin\SekretariatController::class, 'klasifikasiSurat'])->name('sekretariat.klasifikasi-surat');

    /*
    |--------------------------------------------------------------------------
    | ANALISIS
    |--------------------------------------------------------------------------
    */
    Route::get('/analisis', [AnalisisController::class, 'index'])
        ->name('analisis');

    Route::get('/analisis/kependudukan', [AnalisisController::class, 'analisisKependudukan'])
        ->name('analisis.kependudukan');

    Route::get('/analisis/ekonomi', [AnalisisController::class, 'analisisEkonomi'])
        ->name('analisis.ekonomi');

    Route::get('/analisis/kesehatan', [AnalisisController::class, 'analisisKesehatan'])
        ->name('analisis.kesehatan');

    Route::get('/analisis/pendidikan', [AnalisisController::class, 'analisisPendidikan'])
        ->name('analisis.pendidikan');

    Route::get('/analisis/export/{type}', [AnalisisController::class, 'exportLaporan'])
        ->name('analisis.export');

    Route::get('/analisis/print/{type}', [AnalisisController::class, 'printLaporan'])
        ->name('analisis.print');

    /*
    |--------------------------------------------------------------------------
    | BANTUAN
    |--------------------------------------------------------------------------
    */
    Route::get('/bantuan', [BantuanController::class, 'index'])
        ->name('bantuan');

    /*
    |--------------------------------------------------------------------------
    | KESEHATAN
    |--------------------------------------------------------------------------
    */
    Route::get('/kesehatan/pendataan', [App\Http\Controllers\Admin\KesehatanController::class, 'pendataan'])->name('kesehatan.pendataan');
    Route::get('/kesehatan/pemantauan', [App\Http\Controllers\Admin\KesehatanController::class, 'pemantauan'])->name('kesehatan.pemantauan');
    Route::get('/kesehatan/vaksin', [App\Http\Controllers\Admin\KesehatanController::class, 'vaksin'])->name('kesehatan.vaksin');
    Route::get('/kesehatan/stunting', [App\Http\Controllers\Admin\KesehatanController::class, 'stunting'])->name('kesehatan.stunting');


    /*
    |--------------------------------------------------------------------------
    | KEHADIRAN
    |--------------------------------------------------------------------------
    */
    Route::get('/kehadiran/hari-libur', [App\Http\Controllers\Admin\KehadiranController::class, 'hariLibur'])->name('kehadiran.hari-libur');
    Route::get('/kehadiran/pengaduan', [App\Http\Controllers\Admin\KehadiranController::class, 'pengaduan'])->name('kehadiran.pengaduan');
    Route::get('/kehadiran/rekapitulasi', [App\Http\Controllers\Admin\KehadiranController::class, 'rekapitulasi'])->name('kehadiran.rekapitulasi');
    Route::get('/kehadiran/jam-kerja', [App\Http\Controllers\Admin\KehadiranController::class, 'jamKerja'])->name('kehadiran.jam-kerja');
    Route::get('/kehadiran/alasan-keluar', [App\Http\Controllers\Admin\KehadiranController::class, 'alasanKeluar'])->name('kehadiran.alasan-keluar');

    /*
    |--------------------------------------------------------------------------
    | KEUANGAN & LAPORAN
    |--------------------------------------------------------------------------
    */
    Route::get('/keuangan', function () {
        return view('admin.keuangan');
    })->name('keuangan');

    Route::get('/keuangan/laporan', [App\Http\Controllers\Admin\KeuanganController::class, 'laporan'])->name('keuangan.laporan');
    Route::get('/keuangan/input-data', [App\Http\Controllers\Admin\KeuanganController::class, 'inputData'])->name('keuangan.input-data');
    Route::get('/keuangan/laporan-apbdes', [App\Http\Controllers\Admin\KeuanganController::class, 'laporanApbdes'])->name('keuangan.laporan-apbdes');

    Route::get('/laporan', function () {
        return view('admin.laporan');
    })->name('laporan');

    /*
    |--------------------------------------------------------------------------
    | ARTIKEL
    |--------------------------------------------------------------------------
    */
    Route::resource('artikel', ArtikelController::class);

    /*
    |--------------------------------------------------------------------------
    | SISTEM
    |--------------------------------------------------------------------------
    */
    Route::get('/pengguna', [App\Http\Controllers\Admin\PenggunaController::class, 'index'])->name('pengguna.index');
    Route::get('/pengguna/create', [App\Http\Controllers\Admin\PenggunaController::class, 'create'])->name('pengguna.create');
    Route::post('/pengguna', [App\Http\Controllers\Admin\PenggunaController::class, 'store'])->name('pengguna.store');
    Route::get('/pengguna/{user}', [App\Http\Controllers\Admin\PenggunaController::class, 'show'])->name('pengguna.show');
    Route::get('/pengguna/{user}/edit', [App\Http\Controllers\Admin\PenggunaController::class, 'edit'])->name('pengguna.edit');
    Route::put('/pengguna/{user}', [App\Http\Controllers\Admin\PenggunaController::class, 'update'])->name('pengguna.update');
    Route::delete('/pengguna/{user}', [App\Http\Controllers\Admin\PenggunaController::class, 'destroy'])->name('pengguna.destroy');

    /*
    |--------------------------------------------------------------------------
    | IDENTITAS DESA
    |--------------------------------------------------------------------------
    */
    Route::get(
        '/identitas-desa',
        [App\Http\Controllers\Admin\IdentitasDesaController::class, 'index']
    )->name('identitas-desa.index');

    Route::get(
        '/identitas-desa/edit',
        [App\Http\Controllers\Admin\IdentitasDesaController::class, 'edit']
    )->name('identitas-desa.edit');

    Route::put(
        '/identitas-desa',
        [App\Http\Controllers\Admin\IdentitasDesaController::class, 'update']
    )->name('identitas-desa.update');

    /*
    |--------------------------------------------------------------------------
    | INFO DESA
    |--------------------------------------------------------------------------
    */
    Route::resource('info-desa/wilayah-administratif', App\Http\Controllers\Admin\WilayahController::class)->names([
        'index' => 'info-desa.wilayah-administratif',
        'create' => 'info-desa.wilayah-administratif.create',
        'store' => 'info-desa.wilayah-administratif.store',
        'show' => 'info-desa.wilayah-administratif.show',
        'edit' => 'info-desa.wilayah-administratif.edit',
        'update' => 'info-desa.wilayah-administratif.update',
        'destroy' => 'info-desa.wilayah-administratif.destroy',
    ]);

    Route::get('/info-desa/wilayah-administratif/{wilayah}/delete', [App\Http\Controllers\Admin\WilayahController::class, 'confirmDestroy'])->name('info-desa.wilayah-administratif.confirm-destroy');

    /*
    |--------------------------------------------------------------------------
    | PEMBANGUNAN
    |--------------------------------------------------------------------------
    */
    Route::get('/pembangunan', function () {
        return view('admin.pembangunan');
    })->name('pembangunan');

    /*
    |--------------------------------------------------------------------------
    | LAPAK
    |--------------------------------------------------------------------------
    */
    Route::get('/lapak', function () {
        return view('admin.lapak');
    })->name('lapak');

    /*
    |--------------------------------------------------------------------------
    | PENGADUAN
    |--------------------------------------------------------------------------
    */
    Route::get('/pengaduan', [App\Http\Controllers\Admin\PengaduanController::class, 'index'])->name('pengaduan');
});

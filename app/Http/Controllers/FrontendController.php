<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

// --- LIST MODEL YANG DIGUNAKAN ---
use App\Models\Penduduk;
use App\Models\Keluarga;
use App\Models\Wilayah;
use App\Models\Artikel;
use App\Models\IdentitasDesa;
use App\Models\DataPerangkatDesa; 
use App\Models\AsetDesa;          
use App\Models\Apbdes;
use App\Models\KategoriKonten;

class FrontendController extends Controller
{
    /**
     * Mengambil Data Identitas Desa (Shared)
     */
    private function getIdentitasDesa()
    {
        return IdentitasDesa::first() ?? new IdentitasDesa();
    }

    public function home()
    {
        $identitas = $this->getIdentitasDesa();

        // 1. DATA DESA INFO
        $desaInfo = [
            'nama_desa' => $identitas->nama_desa ?? 'Nama Desa Belum Diisi',
            'kecamatan' => $identitas->kecamatan ?? '-',
            'kabupaten' => $identitas->kabupaten ?? '-',
            'provinsi' => $identitas->provinsi ?? '-',
            'email_desa' => $identitas->email_desa ?? '-',
            'telepon_desa' => $identitas->telepon_desa ?? '-',
            'alamat_kantor' => $identitas->alamat_kantor ?? '-',
            'deskripsi_singkat' => 'Website resmi pemerintah desa yang menyajikan informasi secara transparan dan akuntabel.',
            'gambar_kantor' => $identitas->gambar_kantor ? asset('storage/' . $identitas->gambar_kantor) : 'https://via.placeholder.com/600x600?text=Kantor+Desa',
            'logo' => $identitas->logo_desa ? asset('storage/' . $identitas->logo_desa) : null,
        ];

        // 2. STATISTIK
        $statistik = [
            [
                'label' => 'Total Penduduk',
                'value' => Penduduk::where('status_hidup', 'hidup')->count(),
                'icon' => 'users',
                'color' => 'emerald'
            ],
            [
                'label' => 'Laki-laki',
                'value' => Penduduk::where('status_hidup', 'hidup')->where('jenis_kelamin', 'L')->count(),
                'icon' => 'user',
                'color' => 'blue'
            ],
            [
                'label' => 'Perempuan',
                'value' => Penduduk::where('status_hidup', 'hidup')->where('jenis_kelamin', 'P')->count(),
                'icon' => 'user',
                'color' => 'rose'
            ],
            [
                'label' => 'Total Keluarga',
                'value' => Keluarga::count(),
                'icon' => 'home',
                'color' => 'amber'
            ],
        ];

        // 3. ARTIKEL TERBARU
        $artikelQuery = Artikel::latest('created_at')->take(3)->get();
        $artikelTerbaru = $artikelQuery->map(function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->nama,
                'excerpt' => Str::limit(strip_tags($item->deskripsi), 100),
                'date' => $item->created_at->format('Y-m-d'),
                'category' => 'Berita',
                'image' => $item->gambar ? asset('storage/' . $item->gambar) : 'https://via.placeholder.com/400x300?text=Berita',
                'author' => 'Admin'
            ];
        });

        // 4. PERANGKAT DESA (Untuk Home)
        $perangkatQuery = DataPerangkatDesa::whereIn('jabatan', ['kades', 'sekdes'])
            ->where('status', 'aktif')
            ->get();
            
        $perangkatUtama = $perangkatQuery->map(function($p) {
            return [
                'nama' => $p->nama,
                'posisi' => $this->formatJabatan($p->jabatan),
                // Gunakan UI Avatar karena kolom foto tidak ada di database perangkat_desa
                'foto' => 'https://ui-avatars.com/api/?name='.urlencode($p->nama).'&background=10b981&color=fff&size=500'
            ];
        });

        // 5. DATA APBDES
        $tahunIni = date('Y');
        $totalAnggaran = Apbdes::sum('anggaran'); 
        
        $sumberDana = Apbdes::join('sumber_dana', 'apbdes.sumber_dana_id', '=', 'sumber_dana.id')
            ->select('sumber_dana.nama_sumber', DB::raw('sum(apbdes.anggaran) as total'))
            ->groupBy('sumber_dana.nama_sumber')
            ->get();

        $anggaranChart = [
            'total' => 'Rp ' . number_format($totalAnggaran, 0, ',', '.'),
            'tahun' => $tahunIni,
            'detail' => $sumberDana
        ];

        // 6. AGENDA KEGIATAN
        $agendaTerbaru = DB::table('agenda')
            ->where('tgl_agenda', '>=', now())
            ->orderBy('tgl_agenda', 'asc')
            ->take(4)
            ->get()
            ->map(function($item) {
                return [
                    'tanggal' => Carbon::parse($item->tgl_agenda)->isoFormat('D'),
                    'bulan' => Carbon::parse($item->tgl_agenda)->isoFormat('MMM'),
                    'judul' => $item->keterangan ?? 'Kegiatan Desa',
                    'lokasi' => $item->lokasi_kegiatan ?? 'Balai Desa',
                    'koordinator' => $item->koordinator_kegiatan
                ];
            });

        return view('frontend.pages.home', compact(
            'desaInfo', 
            'statistik', 
            'artikelTerbaru', 
            'perangkatUtama',
            'anggaranChart',
            'agendaTerbaru'
        ));
    }

    public function berita()
    {
        $artikels = Artikel::latest('created_at')->paginate(9);
        $kategoriBlog = KategoriKonten::where('status', 'aktif')->pluck('nama_kategori', 'slug')->toArray();
        $kategoriBlog = array_merge(['semua' => 'Semua'], $kategoriBlog);

        $artikelList = collect($artikels->items())->map(function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->nama,
                'excerpt' => Str::limit(strip_tags($item->deskripsi), 120),
                'date' => $item->created_at->format('Y-m-d'),
                'category' => 'Berita',
                'image' => $item->gambar ? asset('storage/' . $item->gambar) : 'https://via.placeholder.com/400x300?text=Berita',
                'author' => 'Admin',
                'views' => 0, 
            ];
        });

        $artikelTerbaru = $artikelList->take(3);

        return view('frontend.pages.artikel.index', compact('artikels', 'kategoriBlog', 'artikelList', 'artikelTerbaru'));
    }

    public function artikelShow($id)
    {
        $artikel = Artikel::findOrFail($id);
        
        $artikelFormatted = (object) [
            'id' => $artikel->id,
            'title' => $artikel->nama,
            'content' => $artikel->deskripsi, 
            'date' => $artikel->created_at,
            'image' => $artikel->gambar ? asset('storage/' . $artikel->gambar) : null,
            'author' => 'Admin',
            'category' => 'Berita'
        ];

        $artikelTerbaru = Artikel::latest()->take(4)->get()->map(function($item){
             return [
                'id' => $item->id,
                'title' => $item->nama,
                'image' => $item->gambar ? asset('storage/' . $item->gambar) : 'https://via.placeholder.com/100',
                'views' => 0,
                'date' => $item->created_at
             ];
        });

        return view('frontend.pages.artikel.show', [
            'artikel' => $artikelFormatted,
            'artikels' => $artikelTerbaru 
        ]);
    }

    public function profil()
    {
        $identitas = $this->getIdentitasDesa();

        // 1. Profil Utama
        $profil = [
            'nama_desa' => $identitas->nama_desa,
            'kode_desa' => $identitas->kode_desa,
            'kecamatan' => $identitas->kecamatan,
            'kabupaten' => $identitas->kabupaten,
            'provinsi' => $identitas->provinsi,
            'email_desa' => $identitas->email_desa ?? 'Belum diatur',
            'telepon_desa' => $identitas->telepon_desa ?? 'Belum diatur',
            'alamat_kantor' => $identitas->alamat_kantor,
            'gambar_kantor' => $identitas->gambar_kantor ? asset('storage/' . $identitas->gambar_kantor) : 'https://via.placeholder.com/800x400?text=Foto+Kantor',
            'latitude' => $identitas->latitude,
            'longitude' => $identitas->longitude,
            'link_peta' => $identitas->link_peta ?? "https://www.google.com/maps?q={$identitas->latitude},{$identitas->longitude}&z=15&output=embed",
        ];

        // 2. Deskripsi (Didefinisikan Manual karena tidak ada di DB)
        $deskripsi = "Desa " . ($identitas->nama_desa ?? 'Kami') . " adalah desa yang terletak di Kecamatan " . ($identitas->kecamatan ?? '-') . ", Kabupaten " . ($identitas->kabupaten ?? '-') . ". Desa ini memiliki potensi sumber daya alam dan sumber daya manusia yang unggul.";

        // 3. Statistik Card Kecil
        $infoDesa = [
            ['label' => 'Penduduk', 'value' => Penduduk::where('status_hidup', 'hidup')->count(), 'icon' => 'users'],
            ['label' => 'Keluarga', 'value' => Keluarga::count(), 'icon' => 'home'],
            ['label' => 'Wilayah Dusun', 'value' => Wilayah::count(), 'icon' => 'map'],
            ['label' => 'Luas Wilayah', 'value' => ($identitas->luas_wilayah ?? 0) . ' Ha', 'icon' => 'globe'],
        ];

        // 4. Visi Misi
        $visiMisi = [
            'visi' => 'Terwujudnya Desa yang Maju, Mandiri, dan Sejahtera Berlandaskan Gotong Royong.',
            'misi' => [
                'Mewujudkan pemerintahan desa yang jujur, transparan, dan akuntabel.',
                'Meningkatkan kualitas pelayanan publik dan administrasi kependudukan.',
                'Mendorong pembangunan infrastruktur yang merata dan berkelanjutan.',
                'Mengembangkan potensi ekonomi lokal melalui UMKM dan BUMDes.'
            ]
        ];

        // 5. Data Kepala Desa & Perangkat
        $kades = DataPerangkatDesa::where('jabatan', 'kades')->where('status', 'aktif')->first();
        
        $perangkatLain = DataPerangkatDesa::where('jabatan', '!=', 'kades')
            ->where('status', 'aktif')
            ->orderByRaw("FIELD(jabatan, 'sekdes', 'kasi', 'kaur', 'kadus')")
            ->get()
            ->map(function($p) {
                return [
                    'nama' => $p->nama,
                    'jabatan' => $this->formatJabatan($p->jabatan),
                    'foto' => 'https://ui-avatars.com/api/?name='.urlencode($p->nama).'&background=059669&color=fff'
                ];
            });

        // Mengirimkan variabel $deskripsi agar tidak error
        return view('frontend.pages.profil.index', compact(
            'profil', 
            'deskripsi', 
            'infoDesa', 
            'visiMisi', 
            'kades',
            'perangkatLain'
        ));
    }

    public function profilKepalaDesa()
    {
        $identitas = $this->getIdentitasDesa();
        $dataKades = DataPerangkatDesa::where('jabatan', 'kades')->where('status', 'aktif')->first();

        return view('frontend.pages.profil.kepala-desa', [
            'identitas_desa' => $identitas,
            'kades' => $dataKades
        ]);
    }

    public function pemerintahan()
    {
        // Ambil data perangkat desa yang aktif
        $perangkat = DataPerangkatDesa::where('status', 'aktif')->get();

        // Mapping jabatan enum ke nama yang bagus
        $struktur = [
            [
                'kategori' => 'Pimpinan Desa',
                'anggota' => $perangkat->filter(fn($p) => in_array($p->jabatan, ['kades', 'sekdes']))
                    ->sortBy(fn($p) => $p->jabatan === 'kades' ? 0 : 1)
                    ->map(fn($p) => [
                        'nama' => $p->nama,
                        'posisi' => $this->formatJabatan($p->jabatan),
                        'nip' => $p->no_sk,
                        'status' => 'Aktif',
                        'foto' => 'https://ui-avatars.com/api/?name='.urlencode($p->nama).'&background=059669&color=fff&size=500'
                ])
            ],
            [
                'kategori' => 'Pelaksana Kewilayahan (Kepala Dusun)',
                'anggota' => $perangkat->filter(fn($p) => $p->jabatan == 'kadus')->map(fn($p) => [
                    'nama' => $p->nama,
                    'posisi' => 'Kepala Dusun',
                    'nip' => $p->no_sk,
                    'status' => 'Aktif',
                    'foto' => 'https://ui-avatars.com/api/?name='.urlencode($p->nama).'&background=059669&color=fff&size=500'
                ])
            ],
            [
                'kategori' => 'Pelaksana Teknis & Urusan',
                'anggota' => $perangkat->filter(fn($p) => in_array($p->jabatan, ['kasi', 'kaur']))->map(fn($p) => [
                    'nama' => $p->nama,
                    'posisi' => $this->formatJabatan($p->jabatan),
                    'nip' => $p->no_sk,
                    'status' => 'Aktif',
                    'foto' => 'https://ui-avatars.com/api/?name='.urlencode($p->nama).'&background=059669&color=fff&size=500'
                ])
            ]
        ];

        // Definisikan variabel array pemerintahan terlebih dahulu
        $pemerintahan = ['struktur' => $struktur];
        
        // Definisikan variabel BPD
        $badan_permusyawaratan = []; 

        // Masukkan nama variabelnya saja ke dalam compact
        return view('frontend.pages.pemerintahan.index', compact('pemerintahan', 'badan_permusyawaratan'));
    }

    public function dataDesa()
    {
        // 1. Statistik Kependudukan (Card Utama)
        $statistikPenduduk = [
            ['label' => 'Total Penduduk', 'value' => Penduduk::where('status_hidup', 'hidup')->count(), 'color' => 'emerald', 'icon' => 'users'],
            ['label' => 'Laki-laki', 'value' => Penduduk::where('status_hidup', 'hidup')->where('jenis_kelamin', 'L')->count(), 'color' => 'blue', 'icon' => 'user'],
            ['label' => 'Perempuan', 'value' => Penduduk::where('status_hidup', 'hidup')->where('jenis_kelamin', 'P')->count(), 'color' => 'rose', 'icon' => 'user'],
            ['label' => 'Total Keluarga', 'value' => Keluarga::count(), 'color' => 'amber', 'icon' => 'home'],
        ];

        // Hitung total penduduk hidup untuk persentase
        $totalPenduduk = Penduduk::where('status_hidup', 'hidup')->count();

        // 2. Statistik Pendidikan (Group by kolom pendidikan)
        $pendidikanData = Penduduk::where('status_hidup', 'hidup')
            ->select('pendidikan', DB::raw('count(*) as total'))
            ->groupBy('pendidikan')
            ->orderBy('total', 'desc') // Urutkan dari terbanyak
            ->get();
        
        $statistikPendidikan = $pendidikanData->map(function($item) use ($totalPenduduk) {
            return [
                'label' => $item->pendidikan ?? 'Tidak Sekolah',
                'value' => $item->total,
                'persen' => $totalPenduduk > 0 ? round(($item->total / $totalPenduduk) * 100, 1) : 0
            ];
        });

        // 3. Statistik Pekerjaan
        $pekerjaanData = Penduduk::where('status_hidup', 'hidup')
            ->select('pekerjaan', DB::raw('count(*) as total'))
            ->groupBy('pekerjaan')
            ->orderBy('total', 'desc')
            ->get();

        $statistikPekerjaan = $pekerjaanData->map(function($item) use ($totalPenduduk) {
            return [
                'label' => ucwords(str_replace('_', ' ', $item->pekerjaan)),
                'value' => $item->total,
                'persen' => $totalPenduduk > 0 ? round(($item->total / $totalPenduduk) * 100, 1) : 0
            ];
        });

        // 4. Aset Desa
        $asetDesa = AsetDesa::where('status', 'aktif')->get()->map(function($item){
            return [
                'nama' => $item->nama_aset,
                'deskripsi' => ucfirst($item->jenis_aset) . ' - ' . $item->lokasi,
                'kondisi' => ucfirst($item->kondisi),
                'tahun' => $item->tahun_perolehan,
                'nilai' => 'Rp ' . number_format($item->nilai, 0, ',', '.')
            ];
        });

        // 5. Anggaran Desa (APBDes)
        $tahunIni = date('Y');
        $totalAnggaran = Apbdes::sum('anggaran');
        
        $sumberDana = Apbdes::join('sumber_dana', 'apbdes.sumber_dana_id', '=', 'sumber_dana.id')
            ->select('sumber_dana.nama_sumber', DB::raw('sum(apbdes.anggaran) as total'))
            ->groupBy('sumber_dana.nama_sumber')
            ->orderBy('total', 'desc')
            ->get()
            ->map(function($item) use ($totalAnggaran) {
                return [
                    'sumber' => $item->nama_sumber,
                    'nilai' => 'Rp ' . number_format($item->total, 0, ',', '.'),
                    'persentase' => $totalAnggaran > 0 ? round(($item->total / $totalAnggaran) * 100, 1) : 0
                ];
            });

        $anggaranDesa = [
            'tahun' => $tahunIni,
            'total_anggaran' => 'Rp ' . number_format($totalAnggaran, 0, ',', '.'),
            'sumber_dana' => $sumberDana
        ];

        // 6. Data Agama (Tambahan agar lebih lengkap seperti referensi)
        $agamaData = Penduduk::where('status_hidup', 'hidup')
            ->select('agama', DB::raw('count(*) as total'))
            ->groupBy('agama')
            ->orderBy('total', 'desc')
            ->get();

        $statistikAgama = $agamaData->map(function($item) use ($totalPenduduk) {
            return [
                'label' => $item->agama,
                'value' => $item->total,
                'persen' => $totalPenduduk > 0 ? round(($item->total / $totalPenduduk) * 100, 1) : 0
            ];
        });

        return view('frontend.pages.data-desa.index', compact(
            'statistikPenduduk',
            'statistikPendidikan',
            'statistikPekerjaan',
            'asetDesa',
            'anggaranDesa',
            'statistikAgama' // Baru ditambahkan
        ));
    }

    public function wilayah()
    {
        $wilayahRecords = Wilayah::all();

        $statistik = [
            ['label' => 'Total Dusun', 'value' => $wilayahRecords->unique('dusun')->count(), 'icon' => 'map'],
            ['label' => 'Total RW', 'value' => $wilayahRecords->sum('rw'), 'icon' => 'users'], 
            ['label' => 'Total RT', 'value' => $wilayahRecords->sum('rt'), 'icon' => 'home'], 
            ['label' => 'Total Penduduk', 'value' => $wilayahRecords->sum('jumlah_penduduk'), 'icon' => 'user'],
        ];

        $wilayahList = $wilayahRecords->map(function ($wilayah) {
            return [
                'id' => $wilayah->id,
                'nama' => $wilayah->dusun ?? 'Dusun',
                'deskripsi' => "Wilayah administratif Dusun " . $wilayah->dusun,
                'kepala_dusun' => $wilayah->ketua_rw ?? 'Belum Ada', 
                'jumlah_rw' => $wilayah->rw ?? 0,
                'jumlah_rt' => $wilayah->rt ?? 0,
                'jumlah_penduduk' => $wilayah->jumlah_penduduk,
            ];
        });

        return view('frontend.pages.wilayah.index', compact('statistik', 'wilayahList'));
    }

    public function wilayahShow($id)
    {
        $wilayah = Wilayah::findOrFail($id);
        return view('frontend.pages.wilayah.show', compact('wilayah'));
    }

    public function kontak()
    {
        $identitas = $this->getIdentitasDesa();

        $infoKontak = [
            'alamat' => $identitas->alamat_kantor ?? 'Alamat belum diatur',
            'telepon' => $identitas->telepon_desa ?? $identitas->ponsel_desa ?? '-',
            'email' => $identitas->email_desa ?? '-',
            'jam_operasional' => 'Senin - Kamis (08.00 - 16.00), Jumat (08.00 - 14.00)', 
            'latitude' => $identitas->latitude,
            'longitude' => $identitas->longitude,
        ];

        $departemen = [
            [
                'nama' => 'Pelayanan Umum & Administrasi',
                'penanggung_jawab' => 'Sekretariat Desa',
                'telepon' => $identitas->telepon_desa ?? '-',
                'email' => $identitas->email_desa ?? '-'
            ]
        ];

        return view('frontend.pages.kontak.index', compact('infoKontak', 'departemen'));
    }

    public function storeKontak(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string',
        ]);

        return redirect()->route('kontak')
            ->with('success', 'Pesan Anda berhasil dikirim. Kami akan segera menghubungi Anda kembali.');
    }

    private function formatJabatan($kode)
    {
        $map = [
            'kades' => 'Kepala Desa',
            'sekdes' => 'Sekretaris Desa',
            'kasi' => 'Kepala Seksi',
            'kaur' => 'Kepala Urusan',
            'kadus' => 'Kepala Dusun'
        ];
        return $map[$kode] ?? ucfirst($kode);
    }
}
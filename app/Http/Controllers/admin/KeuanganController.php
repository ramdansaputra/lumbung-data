<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TransaksiKas;
use App\Models\Apbdes;
use App\Models\RealisasiAnggaran;
use App\Models\TahunAnggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KeuanganController extends Controller {
    public function __construct() {
        // Tambahkan middleware auth dan permission jika ada
        $this->middleware(['auth', 'role:admin']);
    }

    public function index() {
        try {
            // Calculate summary data from transaksi_kas
            $totalPemasukan = TransaksiKas::where('tipe', 'masuk')->sum('jumlah');
            $totalPengeluaran = TransaksiKas::where('tipe', 'keluar')->sum('jumlah');
            $saldoSaatIni = $totalPemasukan - $totalPengeluaran;

            // Calculate anggaran terealisasi from realisasi_anggaran
            $anggaranTerealisasi = RealisasiAnggaran::sum('jumlah');

            // Recent transactions with relationships
            $recentTransactions = TransaksiKas::with('realisasiAnggaran')
                ->latest()
                ->take(3)
                ->get();

            return view('admin.keuangan', compact(
                'totalPemasukan',
                'totalPengeluaran',
                'saldoSaatIni',
                'anggaranTerealisasi',
                'recentTransactions'
            ));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memuat data keuangan: ' . $e->getMessage());
        }
    }

    public function laporan(Request $request) {
        try {
            // Validasi input
            $validated = $request->validate([
                'tahun' => 'nullable|integer|min:2000|max:' . (date('Y') + 1),
                'bulan' => 'nullable|string',
                'jenis' => 'nullable|in:Semua,Pemasukan,Pengeluaran,Saldo',
                'search' => 'nullable|string|max:255',
            ]);

            $tahun = $validated['tahun'] ?? null;
            $bulan = $validated['bulan'] ?? 'Semua';
            $jenis = $validated['jenis'] ?? 'Semua';
            $search = $validated['search'] ?? null;

            // Build query with filters
            $query = TransaksiKas::with('realisasiAnggaran');

            if ($tahun) {
                $query->whereYear('tanggal', $tahun);
            }

            if ($bulan && $bulan !== 'Semua') {
                $query->whereMonth('tanggal', $bulan);
            }

            if ($jenis && $jenis !== 'Semua') {
                if ($jenis === 'Pemasukan') {
                    $query->where('tipe', 'masuk');
                } elseif ($jenis === 'Pengeluaran') {
                    $query->where('tipe', 'keluar');
                }
                // Untuk 'Saldo', tampilkan semua transaksi
            }

            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('keterangan', 'like', '%' . $search . '%')
                        ->orWhere('kategori', 'like', '%' . $search . '%')
                        ->orWhere('nomor_bukti', 'like', '%' . $search . '%');
                });
            }

            // Get transactions ordered by date
            $transactions = $query->orderBy('tanggal', 'asc')
                ->orderBy('id', 'asc')
                ->paginate(20);

            // Calculate summary data based on filters
            $summaryQuery = TransaksiKas::query();

            if ($tahun) {
                $summaryQuery->whereYear('tanggal', $tahun);
            }

            if ($bulan && $bulan !== 'Semua') {
                $summaryQuery->whereMonth('tanggal', $bulan);
            }

            if ($search) {
                $summaryQuery->where(function ($q) use ($search) {
                    $q->where('keterangan', 'like', '%' . $search . '%')
                        ->orWhere('kategori', 'like', '%' . $search . '%')
                        ->orWhere('nomor_bukti', 'like', '%' . $search . '%');
                });
            }

            $totalPemasukan = (clone $summaryQuery)->where('tipe', 'masuk')->sum('jumlah');
            $totalPengeluaran = (clone $summaryQuery)->where('tipe', 'keluar')->sum('jumlah');
            $saldoSaatIni = $totalPemasukan - $totalPengeluaran;

            // Calculate running balance for each transaction
            // Hitung saldo awal (sebelum filter)
            $saldoAwal = 0;
            if ($transactions->count() > 0) {
                $firstTransaction = $transactions->first();
                $saldoAwal = TransaksiKas::where(function ($q) use ($firstTransaction) {
                    $q->where('tanggal', '<', $firstTransaction->tanggal)
                        ->orWhere(function ($sq) use ($firstTransaction) {
                            $sq->where('tanggal', '=', $firstTransaction->tanggal)
                                ->where('id', '<', $firstTransaction->id);
                        });
                })->get()->reduce(function ($carry, $item) {
                    return $carry + ($item->tipe === 'masuk' ? $item->jumlah : -$item->jumlah);
                }, 0);
            }

            $runningBalance = $saldoAwal;
            foreach ($transactions as $transaction) {
                if ($transaction->tipe === 'masuk') {
                    $runningBalance += $transaction->jumlah;
                } else {
                    $runningBalance -= $transaction->jumlah;
                }
                $transaction->running_balance = $runningBalance;
            }

            // Get available years for filter
            $availableYears = TransaksiKas::selectRaw('YEAR(tanggal) as year')
                ->distinct()
                ->orderBy('year', 'desc')
                ->pluck('year');

            // Get bulan options
            $bulanOptions = [
                'Semua' => 'Semua',
                '1' => 'Januari',
                '2' => 'Februari',
                '3' => 'Maret',
                '4' => 'April',
                '5' => 'Mei',
                '6' => 'Juni',
                '7' => 'Juli',
                '8' => 'Agustus',
                '9' => 'September',
                '10' => 'Oktober',
                '11' => 'November',
                '12' => 'Desember'
            ];

            // Hitung jumlah bulan unik berdasarkan filter
            $monthsCount = (clone $summaryQuery)
                ->selectRaw('COUNT(DISTINCT DATE_FORMAT(tanggal, "%Y-%m")) as total_bulan')
                ->value('total_bulan');

            $averageMonthly = $monthsCount > 0 ? $totalPemasukan / $monthsCount : 0;

            return view('admin.keuangan.laporan', compact(
                'transactions',
                'totalPemasukan',
                'totalPengeluaran',
                'saldoSaatIni',
                'averageMonthly',
                'availableYears',
                'bulanOptions',
                'tahun',
                'bulan',
                'jenis',
                'search'
            ));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memuat laporan: ' . $e->getMessage());
        }
    }

    public function inputData() {
        try {
            // Get recent transactions for display with relationships
            $recentTransactions = TransaksiKas::with('realisasiAnggaran')
                ->latest()
                ->take(5)
                ->get();

            return view('admin.keuangan.input-data', compact('recentTransactions'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memuat halaman input data: ' . $e->getMessage());
        }
    }

    public function store(Request $request) {
        try {
            // Validasi input
            $validated = $request->validate([
                'tanggal' => 'required|date|before_or_equal:today',
                'tipe' => 'required|in:masuk,keluar',
                'jumlah' => 'required|numeric|min:0.01',
                'keterangan' => 'required|string|max:1000',
                'kategori' => 'nullable|string|max:255',
                'nomor_bukti' => 'nullable|string|max:255',
                'file-upload' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:10240', // 10MB
            ]);

            DB::beginTransaction();

            $data = [
                'tanggal' => $validated['tanggal'],
                'tipe' => $validated['tipe'],
                'jumlah' => $validated['jumlah'],
                'keterangan' => $validated['keterangan'],
                'kategori' => $validated['kategori'] ?? null,
                'nomor_bukti' => $validated['nomor_bukti'] ?? null,
            ];

            // Handle file upload
            if ($request->hasFile('file-upload')) {
                $file = $request->file('file-upload');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('transaksi', $filename, 'public');
                $data['lampiran'] = $path;
            }

            TransaksiKas::create($data);

            DB::commit();

            return redirect()->route('admin.keuangan.input-data')
                ->with('success', 'Data transaksi berhasil disimpan.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal menyimpan data transaksi: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function laporanApbdes(Request $request) {
        try {
            // Validasi input
            $validated = $request->validate([
                'tahun' => 'nullable|integer|min:2000|max:' . (date('Y') + 1),
                'periode' => 'nullable|in:semua,jan-jun,jul-des',
            ]);

            // Get current year or default to current year
            $tahun = $validated['tahun'] ?? date('Y');
            $periode = $validated['periode'] ?? 'semua';

            // Get APBDes data with relationships (optimized)
            $pendapatanQuery = Apbdes::with([
                'kegiatanAnggaran.bidangAnggaran',
                'sumberDana',
                'realisasiAnggaran'
            ])->whereHas('tahunAnggaran', function ($q) use ($tahun) {
                $q->where('tahun', $tahun);
            })->whereHas('kegiatanAnggaran.bidangAnggaran', function ($q) {
                $q->where('nama_bidang', 'like', '%pendapatan%');
            });

            $belanjaQuery = Apbdes::with([
                'kegiatanAnggaran.bidangAnggaran',
                'sumberDana',
                'realisasiAnggaran'
            ])->whereHas('tahunAnggaran', function ($q) use ($tahun) {
                $q->where('tahun', $tahun);
            })->whereHas('kegiatanAnggaran.bidangAnggaran', function ($q) {
                $q->where('nama_bidang', 'not like', '%pendapatan%');
            });

            // Filter by periode if needed
            if ($periode !== 'semua') {
                $months = $periode === 'jan-jun' ? [1, 2, 3, 4, 5, 6] : [7, 8, 9, 10, 11, 12];

                $pendapatanQuery->whereHas('realisasiAnggaran', function ($q) use ($months) {
                    $q->whereMonth('tanggal', $months);
                });

                $belanjaQuery->whereHas('realisasiAnggaran', function ($q) use ($months) {
                    $q->whereMonth('tanggal', $months);
                });
            }

            $pendapatan = $pendapatanQuery->get();
            $belanja = $belanjaQuery->get();

            // Calculate totals
            $totalPendapatan = $pendapatan->sum('anggaran');
            $totalBelanja = $belanja->sum('anggaran');

            // Calculate realisasi for each item
            foreach ($pendapatan as $item) {
                $item->realisasi = $item->realisasiAnggaran->sum('jumlah');
            }

            foreach ($belanja as $item) {
                $item->realisasi = $item->realisasiAnggaran->sum('jumlah');
            }

            // Get total realisasi
            $realisasiPendapatan = $pendapatan->sum('realisasi');
            $realisasiBelanja = $belanja->sum('realisasi');

            // Get available years from tahun_anggaran table
            $availableYears = TahunAnggaran::orderBy('tahun', 'desc')
                ->pluck('tahun');

            return view('admin.keuangan.laporan-apbdes', compact(
                'pendapatan',
                'belanja',
                'totalPendapatan',
                'totalBelanja',
                'realisasiPendapatan',
                'realisasiBelanja',
                'tahun',
                'periode',
                'availableYears'
            ));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memuat laporan APBDes: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id) {
        try {
            $validated = $request->validate([
                'tanggal' => 'required|date|before_or_equal:today',
                'tipe' => 'required|in:masuk,keluar',
                'jumlah' => 'required|numeric|min:0.01',
                'keterangan' => 'required|string|max:1000',
                'kategori' => 'nullable|string|max:255',
                'nomor_bukti' => 'nullable|string|max:255',
                'file-upload' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:10240',
            ]);

            DB::beginTransaction();

            $transaksi = TransaksiKas::findOrFail($id);

            $data = [
                'tanggal' => $validated['tanggal'],
                'tipe' => $validated['tipe'],
                'jumlah' => $validated['jumlah'],
                'keterangan' => $validated['keterangan'],
                'kategori' => $validated['kategori'] ?? null,
                'nomor_bukti' => $validated['nomor_bukti'] ?? null,
            ];

            // Handle file upload
            if ($request->hasFile('file-upload')) {
                // Delete old file if exists
                if ($transaksi->lampiran && Storage::disk('public')->exists($transaksi->lampiran)) {
                    Storage::disk('public')->delete($transaksi->lampiran);
                }

                $file = $request->file('file-upload');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('transaksi', $filename, 'public');
                $data['lampiran'] = $path;
            }

            $transaksi->update($data);

            DB::commit();

            return redirect()->back()->with('success', 'Data transaksi berhasil diupdate.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal mengupdate data transaksi: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy($id) {
        try {
            DB::beginTransaction();

            $transaksi = TransaksiKas::findOrFail($id);

            // Delete file if exists
            if ($transaksi->lampiran && Storage::disk('public')->exists($transaksi->lampiran)) {
                Storage::disk('public')->delete($transaksi->lampiran);
            }

            $transaksi->delete();

            DB::commit();

            return redirect()->back()->with('success', 'Data transaksi berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus data transaksi: ' . $e->getMessage());
        }
    }
}

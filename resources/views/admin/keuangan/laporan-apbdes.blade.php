@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6 no-print">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-slate-800 mb-2">Laporan APBDes</h1>
                <p class="text-slate-600">Anggaran Pendapatan dan Belanja Desa</p>
            </div>
            <div class="flex gap-3">
                <button onclick="window.print()"
                    class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                    <i class="fas fa-print mr-2"></i>Print
                </button>
                <button onclick="exportPDF()"
                    class="px-4 py-2 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition">
                    <i class="fas fa-download mr-2"></i>Export PDF
                </button>
            </div>
        </div>
    </div>

    <!-- Success/Error Messages -->
    @if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg flex items-center no-print">
        <i class="fas fa-check-circle mr-3"></i>
        <span>{{ session('success') }}</span>
    </div>
    @endif

    @if(session('error'))
    <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg flex items-center no-print">
        <i class="fas fa-exclamation-circle mr-3"></i>
        <span>{{ session('error') }}</span>
    </div>
    @endif

    <!-- Period Selection -->
    <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6 no-print">
        <form method="GET" action="{{ route('admin.keuangan.laporan-apbdes') }}"
            class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Tahun Anggaran</label>
                <select name="tahun"
                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                    @foreach($availableYears as $year)
                    <option value="{{ $year }}" {{ request('tahun', $tahun)==$year ? 'selected' : '' }}>{{ $year }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Periode</label>
                <select name="periode"
                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                    <option value="semua" {{ request('periode', $periode)=='semua' ? 'selected' : '' }}>Semua</option>
                    <option value="jan-jun" {{ request('periode', $periode)=='jan-jun' ? 'selected' : '' }}>Januari -
                        Juni</option>
                    <option value="jul-des" {{ request('periode', $periode)=='jul-des' ? 'selected' : '' }}>Juli -
                        Desember</option>
                </select>
            </div>
            <div class="flex items-end">
                <button type="submit"
                    class="px-6 py-2 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition">
                    <i class="fas fa-search mr-2"></i>Tampilkan
                </button>
            </div>
        </form>
    </div>

    <!-- APBDes Report -->
    <div class="bg-white rounded-lg shadow-sm border border-slate-200 overflow-hidden" id="apbdes-report">
        <!-- Report Header -->
        <div class="bg-slate-50 px-6 py-4 border-b border-slate-200">
            <div class="text-center">
                <h2 class="text-xl font-bold text-slate-800">ANGGARAN PENDAPATAN DAN BELANJA DESA</h2>
                <p class="text-sm text-slate-600 mt-1">Tahun Anggaran {{ $tahun }}</p>
                @if($periode !== 'semua')
                <p class="text-sm text-slate-600">
                    Periode: {{ $periode === 'jan-jun' ? 'Januari - Juni' : 'Juli - Desember' }}
                </p>
                @endif
                <p class="text-sm text-slate-600">DESA LUMBUNG</p>
            </div>
        </div>

        <div class="p-6">
            <!-- Pendapatan Section -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-slate-800 mb-4 border-b-2 border-emerald-500 pb-2">
                    A. PENDAPATAN
                </h3>
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-slate-300">
                        <thead>
                            <tr class="bg-slate-100">
                                <th
                                    class="border border-slate-300 px-4 py-2 text-left text-sm font-medium text-slate-700">
                                    Kode</th>
                                <th
                                    class="border border-slate-300 px-4 py-2 text-left text-sm font-medium text-slate-700">
                                    Uraian</th>
                                <th
                                    class="border border-slate-300 px-4 py-2 text-center text-sm font-medium text-slate-700">
                                    Anggaran (Rp)</th>
                                <th
                                    class="border border-slate-300 px-4 py-2 text-center text-sm font-medium text-slate-700">
                                    Realisasi (Rp)</th>
                                <th
                                    class="border border-slate-300 px-4 py-2 text-center text-sm font-medium text-slate-700">
                                    %</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pendapatan as $item)
                            <tr class="hover:bg-slate-50">
                                <td class="border border-slate-300 px-4 py-2 text-sm">
                                    {{ $item->kegiatanAnggaran->kode ?? 'N/A' }}
                                </td>
                                <td class="border border-slate-300 px-4 py-2 text-sm">
                                    {{ $item->kegiatanAnggaran->nama_kegiatan ?? 'N/A' }}
                                </td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-right">
                                    {{ number_format($item->anggaran, 0, ',', '.') }}
                                </td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-right">
                                    {{ number_format($item->realisasi ?? 0, 0, ',', '.') }}
                                </td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">
                                    {{ $item->anggaran > 0 ? number_format(($item->realisasi ?? 0) / $item->anggaran *
                                    100, 1) : 0 }}%
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5"
                                    class="border border-slate-300 px-4 py-4 text-center text-sm text-slate-500">
                                    Tidak ada data pendapatan
                                </td>
                            </tr>
                            @endforelse
                            <tr class="bg-emerald-50 font-semibold">
                                <td class="border border-slate-300 px-4 py-2 text-sm" colspan="2">JUMLAH PENDAPATAN</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-right">
                                    {{ number_format($totalPendapatan, 0, ',', '.') }}
                                </td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-right">
                                    {{ number_format($realisasiPendapatan, 0, ',', '.') }}
                                </td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">
                                    {{ $totalPendapatan > 0 ? number_format($realisasiPendapatan / $totalPendapatan *
                                    100, 1) : 0 }}%
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Belanja Section -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-slate-800 mb-4 border-b-2 border-red-500 pb-2">
                    B. BELANJA
                </h3>
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-slate-300">
                        <thead>
                            <tr class="bg-slate-100">
                                <th
                                    class="border border-slate-300 px-4 py-2 text-left text-sm font-medium text-slate-700">
                                    Kode</th>
                                <th
                                    class="border border-slate-300 px-4 py-2 text-left text-sm font-medium text-slate-700">
                                    Uraian</th>
                                <th
                                    class="border border-slate-300 px-4 py-2 text-center text-sm font-medium text-slate-700">
                                    Anggaran (Rp)</th>
                                <th
                                    class="border border-slate-300 px-4 py-2 text-center text-sm font-medium text-slate-700">
                                    Realisasi (Rp)</th>
                                <th
                                    class="border border-slate-300 px-4 py-2 text-center text-sm font-medium text-slate-700">
                                    %</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($belanja as $item)
                            <tr class="hover:bg-slate-50">
                                <td class="border border-slate-300 px-4 py-2 text-sm">
                                    {{ $item->kegiatanAnggaran->kode ?? 'N/A' }}
                                </td>
                                <td class="border border-slate-300 px-4 py-2 text-sm">
                                    {{ $item->kegiatanAnggaran->nama_kegiatan ?? 'N/A' }}
                                </td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-right">
                                    {{ number_format($item->anggaran, 0, ',', '.') }}
                                </td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-right">
                                    {{ number_format($item->realisasi ?? 0, 0, ',', '.') }}
                                </td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">
                                    {{ $item->anggaran > 0 ? number_format(($item->realisasi ?? 0) / $item->anggaran *
                                    100, 1) : 0 }}%
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5"
                                    class="border border-slate-300 px-4 py-4 text-center text-sm text-slate-500">
                                    Tidak ada data belanja
                                </td>
                            </tr>
                            @endforelse
                            <tr class="bg-red-50 font-semibold">
                                <td class="border border-slate-300 px-4 py-2 text-sm" colspan="2">JUMLAH BELANJA</td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-right">
                                    {{ number_format($totalBelanja, 0, ',', '.') }}
                                </td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-right">
                                    {{ number_format($realisasiBelanja, 0, ',', '.') }}
                                </td>
                                <td class="border border-slate-300 px-4 py-2 text-sm text-center">
                                    {{ $totalBelanja > 0 ? number_format($realisasiBelanja / $totalBelanja * 100, 1) : 0
                                    }}%
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Summary -->
            <div class="bg-slate-50 rounded-lg p-6 border-2 border-slate-300">
                <h4 class="text-lg font-semibold text-slate-800 mb-4 text-center">RINGKASAN APBDes</h4>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center p-4 bg-white rounded-lg border border-emerald-200">
                        <p class="text-sm text-slate-600 mb-2">Total Pendapatan</p>
                        <p class="text-xl font-bold text-emerald-600">
                            Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                        </p>
                        <p class="text-xs text-slate-500 mt-1">
                            Realisasi: {{ $totalPendapatan > 0 ? number_format($realisasiPendapatan / $totalPendapatan *
                            100, 1) : 0 }}%
                        </p>
                    </div>
                    <div class="text-center p-4 bg-white rounded-lg border border-red-200">
                        <p class="text-sm text-slate-600 mb-2">Total Belanja</p>
                        <p class="text-xl font-bold text-red-600">
                            Rp {{ number_format($totalBelanja, 0, ',', '.') }}
                        </p>
                        <p class="text-xs text-slate-500 mt-1">
                            Realisasi: {{ $totalBelanja > 0 ? number_format($realisasiBelanja / $totalBelanja * 100, 1)
                            : 0 }}%
                        </p>
                    </div>
                    <div class="text-center p-4 bg-white rounded-lg border border-blue-200">
                        <p class="text-sm text-slate-600 mb-2">Surplus/Defisit</p>
                        <p
                            class="text-xl font-bold {{ ($totalPendapatan - $totalBelanja) >= 0 ? 'text-blue-600' : 'text-red-600' }}">
                            Rp {{ number_format($totalPendapatan - $totalBelanja, 0, ',', '.') }}
                        </p>
                        <p class="text-xs text-slate-500 mt-1">
                            {{ ($totalPendapatan - $totalBelanja) >= 0 ? 'Surplus' : 'Defisit' }}
                        </p>
                    </div>
                </div>

                <!-- Additional Summary -->
                <div class="mt-6 pt-4 border-t border-slate-300">
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <p class="text-slate-600">Realisasi Pendapatan:</p>
                            <p class="font-semibold text-emerald-600">Rp {{ number_format($realisasiPendapatan, 0, ',',
                                '.') }}</p>
                        </div>
                        <div>
                            <p class="text-slate-600">Realisasi Belanja:</p>
                            <p class="font-semibold text-red-600">Rp {{ number_format($realisasiBelanja, 0, ',', '.') }}
                            </p>
                        </div>
                        <div>
                            <p class="text-slate-600">Sisa Anggaran Pendapatan:</p>
                            <p class="font-semibold text-slate-700">Rp {{ number_format($totalPendapatan -
                                $realisasiPendapatan, 0, ',', '.') }}</p>
                        </div>
                        <div>
                            <p class="text-slate-600">Sisa Anggaran Belanja:</p>
                            <p class="font-semibold text-slate-700">Rp {{ number_format($totalBelanja -
                                $realisasiBelanja, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer untuk Print -->
            <div class="mt-8 print-only hidden">
                <div class="grid grid-cols-2 gap-8 mt-12">
                    <div class="text-center">
                        <p class="mb-16">Mengetahui,</p>
                        <p class="font-semibold">Kepala Desa Lumbung</p>
                        <div class="mt-16 pt-2 border-t border-slate-800 inline-block px-16">
                            <p>(Nama & Tanda Tangan)</p>
                        </div>
                    </div>
                    <div class="text-center">
                        <p class="mb-16">{{ date('d F Y') }}</p>
                        <p class="font-semibold">Bendahara Desa</p>
                        <div class="mt-16 pt-2 border-t border-slate-800 inline-block px-16">
                            <p>(Nama & Tanda Tangan)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function exportPDF() {
    alert('Fungsi export PDF akan segera tersedia. Untuk saat ini silakan gunakan Print to PDF dari browser.');
    window.print();
}
</script>

<style>
    @media print {
        .no-print {
            display: none !important;
        }

        .print-only {
            display: block !important;
        }

        body {
            print-color-adjust: exact;
            -webkit-print-color-adjust: exact;
        }

        table {
            page-break-inside: avoid;
        }
    }
</style>
@endsection
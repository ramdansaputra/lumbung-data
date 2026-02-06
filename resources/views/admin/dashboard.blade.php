@extends('layouts.admin')

@section('content')

<!-- HEADER SECTION -->
<div class="mb-8">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-4xl font-bold text-slate-900">Dashboard Desa</h1>
            <p class="text-slate-600 mt-2">Selamat datang kembali, Administrator</p>
        </div>
        <div class="flex items-center gap-3 text-sm">
            <div class="px-4 py-2 rounded-lg bg-emerald-100 text-emerald-700 font-semibold shadow-sm">
                <span class="inline-block w-2 h-2 bg-emerald-600 rounded-full mr-2"></span>Online
            </div>
            <div class="px-4 py-2 rounded-lg bg-blue-100 text-blue-700 font-semibold shadow-sm">
                {{ now()->format('d M Y') }}
            </div>
        </div>
    </div>
</div>

<!-- MAIN DASHBOARD CARDS - ROW 1 -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">

    <!-- Total Penduduk -->
    <a href="/admin/penduduk" class="group bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden border border-slate-200 hover:border-emerald-300">
        <div class="p-6">
            <div class="flex items-center justify-between mb-3">
                <div class="p-3 rounded-lg bg-sky-100 text-sky-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10a3 3 0 11-6 0 3 3 0 016 0zM12 14a8 8 0 00-8 8v2h16v-2a8 8 0 00-8-8z"></path>
                    </svg>
                </div>
            </div>
            <h3 class="text-sm text-slate-600 font-medium">Total Penduduk</h3>
            <p class="text-3xl font-bold text-slate-900 mt-2">{{ number_format($pendudukCount ?? 0) }}</p>
            <p class="text-xs text-slate-500 mt-3">→ Lihat detail penduduk</p>
        </div>
    </a>

    <!-- Total Keluarga -->
    <a href="/admin/keluarga" class="group bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden border border-slate-200 hover:border-emerald-300">
        <div class="p-6">
            <div class="flex items-center justify-between mb-3">
                <div class="p-3 rounded-lg bg-emerald-100 text-emerald-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 11l-4-4m0 0l-2-2m2 2l2-2m-2 2l4 4m0 0l2 2m-2-2l-2 2"></path>
                    </svg>
                </div>
            </div>
            <h3 class="text-sm text-slate-600 font-medium">Total Keluarga</h3>
            <p class="text-3xl font-bold text-slate-900 mt-2">{{ number_format($keluargaCount ?? 0) }}</p>
            <p class="text-xs text-slate-500 mt-3">→ Lihat detail keluarga</p>
        </div>
    </a>

    <!-- Rumah Tangga -->
    <a href="/admin/rumah-tangga" class="group bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden border border-slate-200 hover:border-emerald-300">
        <div class="p-6">
            <div class="flex items-center justify-between mb-3">
                <div class="p-3 rounded-lg bg-amber-100 text-amber-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 6a2 2 0 012-2h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"></path>
                    </svg>
                </div>
            </div>
            <h3 class="text-sm text-slate-600 font-medium">Rumah Tangga</h3>
            <p class="text-3xl font-bold text-slate-900 mt-2">{{ number_format($rumahTanggaCount ?? 0) }}</p>
            <p class="text-xs text-slate-500 mt-3">→ Lihat detail rumah tangga</p>
        </div>
    </a>

    <!-- Surat Tercetak -->
    <a href="/admin/layanan-surat/cetak" class="group bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden border border-slate-200 hover:border-emerald-300">
        <div class="p-6">
            <div class="flex items-center justify-between mb-3">
                <div class="p-3 rounded-lg bg-blue-100 text-blue-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
            <h3 class="text-sm text-slate-600 font-medium">Surat Tercetak</h3>
            <p class="text-3xl font-bold text-slate-900 mt-2">{{ number_format($suratCount ?? 0) }}</p>
            <p class="text-xs text-slate-500 mt-3">→ Lihat daftar surat</p>
        </div>
    </a>

</div>

<!-- STATISTIK ROW -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-5 mb-8">

    <!-- Statistik Penduduk -->
    <div class="bg-white rounded-xl shadow-md border border-slate-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-bold text-slate-900">Statistik Penduduk</h3>
            <span class="text-xs font-semibold text-emerald-600 bg-emerald-50 px-3 py-1 rounded-full">Live</span>
        </div>
        <div class="space-y-4">
            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                <span class="text-sm text-slate-600">Total Penduduk</span>
                <span class="text-xl font-bold text-slate-900">{{ number_format($pendudukCount ?? 0) }}</span>
            </div>
            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                <span class="text-sm text-slate-600">Total Keluarga</span>
                <span class="text-xl font-bold text-slate-900">{{ number_format($keluargaCount ?? 0) }}</span>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-sm text-slate-600">Rata-rata Jiwa/KK</span>
                <span class="text-xl font-bold text-slate-900">{{ $keluargaCount > 0 ? number_format($pendudukCount / $keluargaCount, 1) : '0' }}</span>
            </div>
        </div>
    </div>

    <!-- Master Data Overview -->
    <div class="bg-white rounded-xl shadow-md border border-slate-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-bold text-slate-900">Master Data</h3>
            <span class="text-xs font-semibold text-blue-600 bg-blue-50 px-3 py-1 rounded-full">Aktual</span>
        </div>
        <div class="space-y-4">
            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                <span class="text-sm text-slate-600">Wilayah Desa</span>
                <span class="text-xl font-bold text-slate-900">{{ number_format($wilayahCount ?? 0) }}</span>
            </div>
            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                <span class="text-sm text-slate-600">Pengguna Sistem</span>
                <span class="text-xl font-bold text-slate-900">{{ number_format($totalUsers ?? 0) }}</span>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-sm text-slate-600">Surat Layanan</span>
                <span class="text-xl font-bold text-slate-900">{{ number_format($suratCount ?? 0) }}</span>
            </div>
        </div>
    </div>

    <!-- Sistem Info -->
    <div class="bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-xl shadow-md border border-emerald-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-bold text-emerald-900">Status Sistem</h3>
            <span class="inline-block w-3 h-3 bg-emerald-500 rounded-full animate-pulse"></span>
        </div>
        <div class="space-y-4">
            <div>
                <p class="text-sm text-emerald-700 font-medium">Keadaan Sistem</p>
                <p class="text-lg font-bold text-emerald-900 mt-1">Aktif & Normal</p>
            </div>
            <div class="pt-3 border-t border-emerald-200">
                <p class="text-xs text-emerald-700">Terakhir Update</p>
                <p class="text-sm font-semibold text-emerald-900 mt-1">{{ now()->format('d M Y H:i') }}</p>
            </div>
        </div>
    </div>

</div>

<!-- BOTTOM SECTION -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

    <!-- Recent Activities -->
    <div class="bg-white rounded-xl shadow-md border border-slate-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-bold text-slate-900">Aktivitas Terbaru</h3>
            <a href="/admin/penduduk" class="text-xs font-semibold text-emerald-600 hover:text-emerald-700">Lihat Semua →</a>
        </div>
        <div class="space-y-3">
            @forelse($recentPenduduk ?? [] as $penduduk)
                <div class="flex items-start gap-3 pb-3 border-b border-slate-100 last:border-b-0 last:pb-0">
                    <div class="mt-1">
                        <div class="w-2 h-2 bg-emerald-500 rounded-full"></div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-slate-900 truncate">Penduduk baru: {{ $penduduk->nama ?? 'N/A' }}</p>
                        <p class="text-xs text-slate-500 mt-1">{{ $penduduk->created_at ? $penduduk->created_at->diffForHumans() : 'Baru saja' }}</p>
                    </div>
                </div>
            @empty
                <div class="text-center py-8">
                    <svg class="w-12 h-12 text-slate-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </svg>
                    <p class="text-sm text-slate-500">Tidak ada aktivitas terbaru</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Quick Links & Informasi -->
    <div class="bg-white rounded-xl shadow-md border border-slate-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-bold text-slate-900">Tautan Cepat</h3>
            <span class="text-xs font-semibold text-slate-600 bg-slate-50 px-3 py-1 rounded-full">8 Menu</span>
        </div>
        <div class="grid grid-cols-2 gap-3">
            <a href="/admin/penduduk" class="p-3 rounded-lg border border-slate-200 hover:bg-slate-50 hover:border-emerald-300 transition-all text-center">
                <p class="text-xs text-slate-600 font-medium">Penduduk</p>
                <p class="text-xs text-slate-500 mt-1">Data Master</p>
            </a>
            <a href="/admin/keluarga" class="p-3 rounded-lg border border-slate-200 hover:bg-slate-50 hover:border-emerald-300 transition-all text-center">
                <p class="text-xs text-slate-600 font-medium">Keluarga</p>
                <p class="text-xs text-slate-500 mt-1">Data Master</p>
            </a>
            <a href="/admin/layanan-surat/cetak" class="p-3 rounded-lg border border-slate-200 hover:bg-slate-50 hover:border-emerald-300 transition-all text-center">
                <p class="text-xs text-slate-600 font-medium">Surat</p>
                <p class="text-xs text-slate-500 mt-1">Layanan</p>
            </a>
            <a href="/admin/statistik/kependudukan" class="p-3 rounded-lg border border-slate-200 hover:bg-slate-50 hover:border-emerald-300 transition-all text-center">
                <p class="text-xs text-slate-600 font-medium">Statistik</p>
                <p class="text-xs text-slate-500 mt-1">Laporan</p>
            </a>
            <a href="/admin/artikel" class="p-3 rounded-lg border border-slate-200 hover:bg-slate-50 hover:border-emerald-300 transition-all text-center">
                <p class="text-xs text-slate-600 font-medium">Artikel</p>
                <p class="text-xs text-slate-500 mt-1">Berita</p>
            </a>
            <a href="/admin/pengguna" class="p-3 rounded-lg border border-slate-200 hover:bg-slate-50 hover:border-emerald-300 transition-all text-center">
                <p class="text-xs text-slate-600 font-medium">Pengguna</p>
                <p class="text-xs text-slate-500 mt-1">Kelola</p>
            </a>
        </div>
    </div>

</div>

@endsection

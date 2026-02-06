@extends('layouts.admin')

@section('title', 'Data Penduduk')

@section('content')

<!-- ================= HEADER ================= -->
<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-extrabold text-slate-800">Data Penduduk</h1>
        <p class="text-sm text-slate-500">
            Informasi detail penduduk desa
        </p>
    </div>

    <div class="flex gap-3">
        <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            Export PDF
        </button>
        <button class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            Export Excel
        </button>
    </div>
</div>

<!-- ================= SUMMARY CARDS ================= -->
<div class="grid grid-cols-1 md:grid-cols-6 gap-4 mb-8">

    <div class="bg-white p-5 rounded-xl shadow">
        <p class="text-xs text-slate-500">Total Penduduk</p>
        <h3 class="text-2xl font-bold mt-1">{{ number_format($data['total_penduduk']) }}</h3>
    </div>

    <div class="bg-white p-5 rounded-xl shadow">
        <p class="text-xs text-slate-500">Kepala Keluarga</p>
        <h3 class="text-2xl font-bold mt-1">{{ number_format($data['kepala_keluarga']) }}</h3>
    </div>

    <div class="bg-white p-5 rounded-xl shadow text-blue-600">
        <p class="text-xs">Laki-laki</p>
        <h3 class="text-2xl font-bold mt-1">{{ number_format($data['laki_laki']) }}</h3>
    </div>

    <div class="bg-white p-5 rounded-xl shadow text-pink-600">
        <p class="text-xs">Perempuan</p>
        <h3 class="text-2xl font-bold mt-1">{{ number_format($data['perempuan']) }}</h3>
    </div>

    <div class="bg-white p-5 rounded-xl shadow text-green-600">
        <p class="text-xs">Usia Produktif</p>
        <h3 class="text-2xl font-bold mt-1">{{ number_format($data['usia_produktif']) }}</h3>
    </div>

    <div class="bg-white p-5 rounded-xl shadow text-orange-600">
        <p class="text-xs">Usia Non Produktif</p>
        <h3 class="text-2xl font-bold mt-1">{{ number_format($data['usia_non_produktif']) }}</h3>
    </div>

</div>

<!-- ================= DISTRIBUSI USIA ================= -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

    <!-- DISTRIBUSI USIA -->
    <div class="bg-white rounded-xl shadow p-6">
        <h4 class="font-semibold mb-4 flex items-center gap-2">
            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
            Distribusi Usia
        </h4>

        <div class="space-y-3">
            @foreach($data['distribusi_usia'] as $range => $jumlah)
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-3 h-3 rounded-full bg-blue-500"></div>
                    <span class="text-sm font-medium">{{ $range }} tahun</span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-sm text-slate-600">{{ number_format($jumlah) }}</span>
                    <span class="text-xs text-slate-500">
                        ({{ round(($jumlah / $data['total_penduduk']) * 100, 1) }}%)
                    </span>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- STATUS PERKAWINAN -->
    <div class="bg-white rounded-xl shadow p-6">
        <h4 class="font-semibold mb-4 flex items-center gap-2">
            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
            </svg>
            Status Perkawinan
        </h4>

        <div class="space-y-3">
            @foreach($data['status_perkawinan'] as $status => $jumlah)
            <div class="flex items-center justify-between p-3 bg-slate-50 rounded-lg">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-green-100 flex items-center justify-center">
                        <span class="text-xs font-bold text-green-600">{{ substr($jumlah, 0, 2) }}</span>
                    </div>
                    <div>
                        <p class="font-medium text-green-800">{{ ucwords(str_replace('_', ' ', $status)) }}</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="font-bold text-green-600">{{ number_format($jumlah) }}</p>
                    <p class="text-xs text-green-500">orang</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>

<!-- ================= ANALISIS ================= -->
<div class="bg-white rounded-xl shadow p-6">
    <h4 class="font-semibold mb-4">Analisis Demografi</h4>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- RASIO JENIS KELAMIN -->
        <div class="text-center p-4 bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg border border-blue-200">
            <h5 class="font-medium text-blue-800 mb-2">Rasio Jenis Kelamin</h5>
            <div class="text-3xl font-bold text-blue-600 mb-1">
                {{ round(($data['laki_laki'] / $data['perempuan']) * 100, 1) }}%
            </div>
            <p class="text-xs text-blue-600">laki-laki per 100 perempuan</p>
        </div>

        <!-- DEPENDENCY RATIO -->
        <div class="text-center p-4 bg-gradient-to-br from-green-50 to-green-100 rounded-lg border border-green-200">
            <h5 class="font-medium text-green-800 mb-2">Dependency Ratio</h5>
            <div class="text-3xl font-bold text-green-600 mb-1">
                {{ round(($data['usia_non_produktif'] / $data['usia_produktif']) * 100, 1) }}%
            </div>
            <p class="text-xs text-green-600">non produktif per produktif</p>
        </div>

        <!-- RATA-RATA ANGGOTA KELUARGA -->
        <div class="text-center p-4 bg-gradient-to-br from-purple-50 to-purple-100 rounded-lg border border-purple-200">
            <h5 class="font-medium text-purple-800 mb-2">Rata-rata Anggota Keluarga</h5>
            <div class="text-3xl font-bold text-purple-600 mb-1">
                {{ round($data['total_penduduk'] / $data['kepala_keluarga'], 1) }}
            </div>
            <p class="text-xs text-purple-600">orang per KK</p>
        </div>

    </div>

    <!-- REKOMENDASI -->
    <div class="mt-6 p-4 bg-slate-50 rounded-lg border">
        <h5 class="font-medium text-slate-700 mb-2">Rekomendasi</h5>
        <p class="text-sm text-slate-600">
            @if($data['usia_produktif'] > $data['usia_non_produktif'])
                Struktur penduduk didominasi usia produktif, potensi pembangunan tinggi.
            @else
                Perlu perhatian khusus pada kelompok usia non produktif untuk kesejahteraan sosial.
            @endif
            @if(round($data['total_penduduk'] / $data['kepala_keluarga'], 1) > 4)
                Rata-rata anggota keluarga cukup besar, perlu perhatian pada program KB.
            @else
                Ukuran keluarga relatif kecil, mendukung program kesejahteraan keluarga.
            @endif
        </p>
    </div>
</div>

@endsection

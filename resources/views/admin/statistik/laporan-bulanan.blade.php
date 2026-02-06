@extends('layouts.admin')

@section('title', 'Laporan Bulanan')

@section('content')

<!-- ================= HEADER ================= -->
<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-extrabold text-slate-800">Laporan Bulanan</h1>
        <p class="text-sm text-slate-500">
            Laporan mutasi penduduk bulan {{ $data['bulan'] }}
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
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">

    <div class="bg-white p-6 rounded-xl shadow">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-slate-500">Total Penduduk</p>
                <h3 class="text-2xl font-bold mt-1">{{ number_format($data['total_penduduk']) }}</h3>
            </div>
            <div class="p-3 bg-blue-100 rounded-lg">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-slate-500">Kelahiran</p>
                <h3 class="text-2xl font-bold text-green-600 mt-1">{{ $data['mutasi']['lahir'] }}</h3>
            </div>
            <div class="p-3 bg-green-100 rounded-lg">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-slate-500">Kematian</p>
                <h3 class="text-2xl font-bold text-red-600 mt-1">{{ $data['mutasi']['meninggal'] }}</h3>
            </div>
            <div class="p-3 bg-red-100 rounded-lg">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-slate-500">Net Migration</p>
                <h3 class="text-2xl font-bold text-blue-600 mt-1">
                    {{ $data['mutasi']['datang'] - $data['mutasi']['pindah'] }}
                </h3>
            </div>
            <div class="p-3 bg-blue-100 rounded-lg">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                </svg>
            </div>
        </div>
    </div>

</div>

<!-- ================= MUTASI DETAIL ================= -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

    <!-- MUTASI PENDUDUK -->
    <div class="bg-white rounded-xl shadow p-6">
        <h4 class="font-semibold mb-4 flex items-center gap-2">
            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
            </svg>
            Mutasi Penduduk
        </h4>

        <div class="space-y-4">
            <div class="flex items-center justify-between p-4 bg-green-50 rounded-lg border border-green-200">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-medium text-green-800">Kelahiran</p>
                        <p class="text-sm text-green-600">Penambahan penduduk</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-2xl font-bold text-green-600">{{ $data['mutasi']['lahir'] }}</p>
                    <p class="text-sm text-green-500">orang</p>
                </div>
            </div>

            <div class="flex items-center justify-between p-4 bg-red-50 rounded-lg border border-red-200">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-red-100 flex items-center justify-center">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-medium text-red-800">Kematian</p>
                        <p class="text-sm text-red-600">Pengurangan penduduk</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-2xl font-bold text-red-600">{{ $data['mutasi']['meninggal'] }}</p>
                    <p class="text-sm text-red-500">orang</p>
                </div>
            </div>

            <div class="flex items-center justify-between p-4 bg-blue-50 rounded-lg border border-blue-200">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-medium text-blue-800">Pendatang</p>
                        <p class="text-sm text-blue-600">Masuk dari luar</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-2xl font-bold text-blue-600">{{ $data['mutasi']['datang'] }}</p>
                    <p class="text-sm text-blue-500">orang</p>
                </div>
            </div>

            <div class="flex items-center justify-between p-4 bg-orange-50 rounded-lg border border-orange-200">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-orange-100 flex items-center justify-center">
                        <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-medium text-orange-800">Pindah</p>
                        <p class="text-sm text-orange-600">Keluar ke luar</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-2xl font-bold text-orange-600">{{ $data['mutasi']['pindah'] }}</p>
                    <p class="text-sm text-orange-500">orang</p>
                </div>
            </div>
        </div>
    </div>

    <!-- LAPORAN DETAIL -->
    <div class="bg-white rounded-xl shadow p-6">
        <h4 class="font-semibold mb-4 flex items-center gap-2">
            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            Detail Laporan
        </h4>

        <div class="space-y-3">
            @foreach($data['laporan'] as $item)
            <div class="flex items-center justify-between p-3 bg-slate-50 rounded-lg border">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg {{ $item['persen'][0] === '+' ? 'bg-green-100' : 'bg-red-100' }} flex items-center justify-center">
                        <span class="text-xs font-bold {{ $item['persen'][0] === '+' ? 'text-green-600' : 'text-red-600' }}">
                            {{ $item['persen'][0] }}
                        </span>
                    </div>
                    <div>
                        <p class="font-medium">{{ $item['kategori'] }}</p>
                        <p class="text-sm text-slate-500">{{ $item['persen'] }}</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="font-bold">{{ $item['jumlah'] }}</p>
                    <p class="text-xs text-slate-500">orang</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>

<!-- ================= TRENDS & ANALISIS ================= -->
<div class="bg-white rounded-xl shadow p-6">
    <h4 class="font-semibold mb-4">Analisis Tren Bulanan</h4>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- PERTUMBUHAN PENDUDUK -->
        <div class="text-center p-4 bg-gradient-to-br from-green-50 to-green-100 rounded-lg border border-green-200">
            <h5 class="font-medium text-green-800 mb-2">Pertumbuhan Penduduk</h5>
            <div class="text-3xl font-bold text-green-600 mb-1">
                {{ $data['mutasi']['lahir'] - $data['mutasi']['meninggal'] + $data['mutasi']['datang'] - $data['mutasi']['pindah'] }}
            </div>
            <p class="text-xs text-green-600">orang (net growth)</p>
        </div>

        <!-- RASIO KELAHIRAN/KEMATIAN -->
        <div class="text-center p-4 bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg border border-blue-200">
            <h5 class="font-medium text-blue-800 mb-2">Rasio Natality/Mortality</h5>
            <div class="text-3xl font-bold text-blue-600 mb-1">
                @if($data['mutasi']['meninggal'] > 0)
                    {{ round($data['mutasi']['lahir'] / $data['mutasi']['meninggal'], 2) }}
                @else
                    ∞
                @endif
            </div>
            <p class="text-xs text-blue-600">kelahiran per kematian</p>
        </div>

        <!-- MOBILITY RATE -->
        <div class="text-center p-4 bg-gradient-to-br from-purple-50 to-purple-100 rounded-lg border border-purple-200">
            <h5 class="font-medium text-purple-800 mb-2">Mobility Rate</h5>
            <div class="text-3xl font-bold text-purple-600 mb-1">
                {{ round((($data['mutasi']['datang'] + $data['mutasi']['pindah']) / $data['total_penduduk']) * 100, 2) }}%
            </div>
            <p class="text-xs text-purple-600">dari total penduduk</p>
        </div>

    </div>

    <!-- REKOMENDASI -->
    <div class="mt-6 p-4 bg-slate-50 rounded-lg border">
        <h5 class="font-medium text-slate-700 mb-2">Rekomendasi</h5>
        <p class="text-sm text-slate-600">
            @if($data['mutasi']['lahir'] > $data['mutasi']['meninggal'])
                Pertumbuhan penduduk positif dengan kelahiran melebihi kematian.
            @else
                Perlu perhatian khusus pada kesehatan masyarakat karena angka kematian tinggi.
            @endif
            @if($data['mutasi']['datang'] > $data['mutasi']['pindah'])
                Migrasi masuk lebih tinggi dari keluar, menunjukkan daya tarik desa yang baik.
            @else
                Tingginya migrasi keluar perlu dianalisis lebih lanjut.
            @endif
        </p>
    </div>
</div>

@endsection

@extends('layouts.app')

@section('title', 'Data Desa')
@section('description', 'Statistik dan data transparansi desa')

@section('content')
<!-- Hero Section -->
<x-hero-section 
    title="Data Desa"
    subtitle="Informasi statistik dan transparansi data desa"
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('home')],
        ['label' => 'Data Desa', 'url' => '#']
    ]"
/>

<!-- Statistik Penduduk -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-2 bg-emerald-100 text-emerald-700 px-4 py-2 rounded-full text-sm font-medium mb-4">
                📊 Statistik Penduduk
            </div>
            <h2 class="text-3xl font-bold text-gray-900">Data Kependudukan</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($statistikPenduduk as $stat)
                <x-stat-card 
                    :label="$stat['label']"
                    :value="$stat['value']"
                    :color="$stat['color']"
                />
            @endforeach
        </div>
    </div>
</section>

<!-- Statistik Pendidikan -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-2 bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-medium mb-4">
                🎓 Pendidikan
            </div>
            <h2 class="text-3xl font-bold text-gray-900">Statistik Tingkat Pendidikan</h2>
        </div>

        <div class="max-w-4xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Distribusi Pendidikan</h3>
                    <div class="space-y-4">
                        @foreach($statistikPendidikan as $stat)
                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <label class="text-sm font-medium text-gray-700">{{ $stat['label'] }}</label>
                                    <span class="text-sm font-bold text-gray-900">{{ $stat['value'] }} jiwa</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-blue-600 h-2 rounded-full" style="width: {{ ($stat['value'] / 10234 * 100) }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-lg p-6 border border-blue-200">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Ringkasan</h3>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-3">
                            <span class="text-2xl">📚</span>
                            <div>
                                <p class="text-sm text-gray-600">Total Penduduk Terdidik</p>
                                <p class="font-bold text-gray-900">8.000+ jiwa</p>
                            </div>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="text-2xl">🎯</span>
                            <div>
                                <p class="text-sm text-gray-600">Tingkat Literasi</p>
                                <p class="font-bold text-gray-900">78%</p>
                            </div>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="text-2xl">👨‍🎓</span>
                            <div>
                                <p class="text-sm text-gray-600">Penduduk S1+</p>
                                <p class="font-bold text-gray-900">2.221 jiwa</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistik Pekerjaan -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-2 bg-amber-100 text-amber-700 px-4 py-2 rounded-full text-sm font-medium mb-4">
                💼 Pekerjaan
            </div>
            <h2 class="text-3xl font-bold text-gray-900">Statistik Jenis Pekerjaan</h2>
        </div>

        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-lg shadow-md p-8">
                <div class="space-y-6">
                    @foreach($statistikPekerjaan as $pekerjaan)
                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <label class="text-sm font-semibold text-gray-900">{{ $pekerjaan['label'] }}</label>
                                <span class="text-sm font-bold text-gray-900">
                                    {{ $pekerjaan['value'] }} 
                                    <span class="text-gray-600">({{ round($pekerjaan['value'] / 10234 * 100, 1) }}%)</span>
                                </span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div 
                                    class="h-3 rounded-full" 
                                    style="width: {{ ($pekerjaan['value'] / 3450 * 100) }}%; background: linear-gradient(to right, #059669, #0d9488);"
                                ></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Aset Desa -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-2 bg-rose-100 text-rose-700 px-4 py-2 rounded-full text-sm font-medium mb-4">
                🏛️ Aset Desa
            </div>
            <h2 class="text-3xl font-bold text-gray-900">Inventaris Aset Desa</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-emerald-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Nama Aset</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Deskripsi</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Kondisi</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Tahun</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Nilai</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($asetDesa as $aset)
                        <tr class="bg-white hover:bg-gray-50 transition">
                            <td class="px-6 py-4 font-semibold text-gray-900">{{ $aset['nama'] }}</td>
                            <td class="px-6 py-4 text-gray-600 text-sm">{{ $aset['deskripsi'] }}</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-green-100 text-green-800 text-sm font-medium rounded-full">
                                    {{ $aset['kondisi'] }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-600">{{ $aset['tahun'] }}</td>
                            <td class="px-6 py-4 font-semibold text-gray-900">{{ $aset['nilai'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Anggaran Desa -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-2 bg-purple-100 text-purple-700 px-4 py-2 rounded-full text-sm font-medium mb-4">
                💰 Keuangan
            </div>
            <h2 class="text-3xl font-bold text-gray-900">Anggaran Desa {{ $anggaranDesa['tahun'] }}</h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Total Anggaran -->
            <div class="bg-gradient-to-br from-purple-600 to-indigo-600 text-white rounded-lg p-8 flex flex-col justify-center">
                <p class="text-purple-100 text-lg font-medium mb-2">Total Anggaran</p>
                <h3 class="text-4xl font-bold mb-6">{{ $anggaranDesa['total_anggaran'] }}</h3>
                <p class="text-purple-100">Tahun Anggaran {{ $anggaranDesa['tahun'] }}</p>
            </div>

            <!-- Sumber Dana -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-6">Sumber Dana</h3>
                <div class="space-y-4">
                    @foreach($anggaranDesa['sumber_dana'] as $sumber)
                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <label class="text-sm font-semibold text-gray-900">{{ $sumber['sumber'] }}</label>
                                <span class="text-sm font-bold text-gray-900">{{ $sumber['persentase'] }}%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div 
                                    class="h-3 rounded-full bg-emerald-600" 
                                    style="width: {{ $sumber['persentase'] }}%"
                                ></div>
                            </div>
                            <p class="text-xs text-gray-600 mt-1">{{ $sumber['nilai'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Info Transparency -->
<section class="py-16 bg-emerald-50 border-l-4 border-emerald-600">
    <div class="container mx-auto px-4">
        <div class="flex items-start gap-4">
            <svg class="w-6 h-6 text-emerald-600 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zm-11-1a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd"/>
            </svg>
            <div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Transparansi Keuangan Desa</h3>
                <p class="text-gray-700">
                    Data keuangan desa ditampilkan untuk memastikan transparansi dan akuntabilitas dalam pengelolaan anggaran desa. 
                    Untuk laporan lengkap, silakan menghubungi kantor desa atau mengakses sistem informasi keuangan desa kami.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection

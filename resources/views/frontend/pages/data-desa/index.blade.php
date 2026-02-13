@extends('layouts.app')

@section('title', 'Data Desa')
@section('description', 'Statistik dan data transparansi desa')

@section('content')

<x-hero-section 
    title="Data & Statistik Desa"
    subtitle="Portal transparansi data kependudukan, pendidikan, sosial, dan anggaran desa yang akuntabel."
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('home')],
        ['label' => 'Data Desa', 'url' => '#']
    ]"
/>

<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <x-section-title 
            title="Data Kependudukan" 
            subtitle="Gambaran umum demografi penduduk desa saat ini."
            badge="📊 Statistik Utama"
        />

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($statistikPenduduk as $stat)
                <x-stat-card 
                    :label="$stat['label']"
                    :value="$stat['value']"
                    :color="$stat['color'] ?? 'emerald'"
                    icon='<svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>'
                />
            @endforeach
        </div>
    </div>
</section>

<section class="py-20 bg-gray-50 border-y border-gray-100">
    <div class="container mx-auto px-4">
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div>
                <div class="flex items-center gap-3 mb-8">
                    <span class="p-3 bg-blue-100 text-blue-600 rounded-xl">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 3L1 9l11 6 9-4.91V17h2V9M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82z"/></svg>
                    </span>
                    <h2 class="text-2xl font-bold text-gray-900">Tingkat Pendidikan</h2>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 space-y-6">
                    @foreach($statistikPendidikan as $stat)
                        <div class="group">
                            <div class="flex justify-between items-end mb-2">
                                <span class="text-sm font-medium text-gray-700 group-hover:text-blue-600 transition">{{ $stat['label'] }}</span>
                                <span class="text-xs font-bold text-gray-900 bg-gray-100 px-2 py-1 rounded">{{ $stat['value'] }} Jiwa</span>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-2.5 overflow-hidden">
                                <div class="bg-gradient-to-r from-blue-400 to-blue-600 h-2.5 rounded-full transition-all duration-1000 ease-out group-hover:w-full" 
                                     style="width: {{ ($stat['value'] / 5000 * 100) }}%"></div> </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div>
                <div class="flex items-center gap-3 mb-8">
                    <span class="p-3 bg-amber-100 text-amber-600 rounded-xl">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M20 6h-4V4c0-1.11-.89-2-2-2h-4c-1.11 0-2 .89-2 2v2H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-6 0h-4V4h4v2z"/></svg>
                    </span>
                    <h2 class="text-2xl font-bold text-gray-900">Mata Pencaharian</h2>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 space-y-6">
                    @foreach($statistikPekerjaan as $pekerjaan)
                        <div class="group">
                            <div class="flex justify-between items-end mb-2">
                                <span class="text-sm font-medium text-gray-700 group-hover:text-amber-600 transition">{{ $pekerjaan['label'] }}</span>
                                <span class="text-xs font-bold text-gray-900 bg-gray-100 px-2 py-1 rounded">{{ $pekerjaan['value'] }} Jiwa</span>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-2.5 overflow-hidden">
                                <div class="bg-gradient-to-r from-amber-400 to-amber-600 h-2.5 rounded-full transition-all duration-1000 ease-out" 
                                     style="width: {{ ($pekerjaan['value'] / 2000 * 100) }}%"></div> </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <x-section-title 
            title="Transparansi Anggaran {{ $anggaranDesa['tahun'] }}" 
            subtitle="Laporan sumber pendapatan dan rencana belanja desa."
            badge="💰 APBDes"
        />

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="bg-gradient-to-br from-emerald-600 to-teal-700 rounded-2xl p-8 text-white shadow-xl relative overflow-hidden flex flex-col justify-center">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-32 h-32 bg-white opacity-10 rounded-full blur-2xl"></div>
                
                <p class="text-emerald-100 text-sm font-bold uppercase tracking-wider mb-2">Total Pendapatan Desa</p>
                <h3 class="text-4xl lg:text-5xl font-extrabold mb-6 tracking-tight">{{ $anggaranDesa['total_anggaran'] }}</h3>
                
                <div class="mt-auto pt-6 border-t border-emerald-500/30">
                    <p class="text-sm text-emerald-100 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Data per Tahun Anggaran {{ $anggaranDesa['tahun'] }}
                    </p>
                </div>
            </div>

            <div class="lg:col-span-2 bg-white border border-gray-100 rounded-2xl p-8 shadow-sm">
                <h4 class="text-lg font-bold text-gray-900 mb-6">Rincian Sumber Pendapatan</h4>
                <div class="space-y-5">
                    @foreach($anggaranDesa['sumber_dana'] as $sumber)
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-600 font-bold text-sm shrink-0">
                                {{ $sumber['persentase'] }}%
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between mb-1">
                                    <span class="font-semibold text-gray-800">{{ $sumber['sumber'] }}</span>
                                    <span class="font-bold text-emerald-600">{{ $sumber['nilai'] }}</span>
                                </div>
                                <div class="w-full bg-gray-100 rounded-full h-2">
                                    <div class="bg-emerald-500 h-2 rounded-full" style="width: {{ $sumber['persentase'] }}%"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-gray-50 border-t border-gray-200">
    <div class="container mx-auto px-4">
        <x-section-title 
            title="Inventaris Aset Desa" 
            subtitle="Daftar kekayaan milik desa yang dikelola untuk kepentingan masyarakat."
            badge="🏛️ Aset Desa"
        />

        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200 text-xs uppercase tracking-wider text-gray-500 font-bold">
                            <th class="px-6 py-4">Nama Aset</th>
                            <th class="px-6 py-4">Deskripsi</th>
                            <th class="px-6 py-4 text-center">Kondisi</th>
                            <th class="px-6 py-4 text-center">Tahun</th>
                            <th class="px-6 py-4 text-right">Nilai Aset</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($asetDesa as $aset)
                            <tr class="hover:bg-gray-50 transition duration-150">
                                <td class="px-6 py-4 font-semibold text-gray-900">{{ $aset['nama'] }}</td>
                                <td class="px-6 py-4 text-gray-600 text-sm">{{ $aset['deskripsi'] }}</td>
                                <td class="px-6 py-4 text-center">
                                    @php
                                        $kondisiClass = match($aset['kondisi']) {
                                            'Baik' => 'bg-green-100 text-green-700 border-green-200',
                                            'Rusak Ringan' => 'bg-yellow-100 text-yellow-700 border-yellow-200',
                                            'Rusak Berat' => 'bg-red-100 text-red-700 border-red-200',
                                            default => 'bg-gray-100 text-gray-700 border-gray-200',
                                        };
                                    @endphp
                                    <span class="px-3 py-1 text-xs font-bold rounded-full border {{ $kondisiClass }}">
                                        {{ $aset['kondisi'] }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center text-gray-500 font-mono text-sm">{{ $aset['tahun'] }}</td>
                                <td class="px-6 py-4 text-right font-bold text-gray-900">{{ $aset['nilai'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<section class="bg-emerald-700 py-12">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center justify-between gap-6 text-white">
            <div class="flex items-start gap-4 max-w-2xl">
                <div class="p-3 bg-white/20 rounded-xl backdrop-blur-sm">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-1">Komitmen Transparansi</h3>
                    <p class="text-emerald-100 text-sm leading-relaxed">
                        Pemerintah desa berkomitmen menyajikan data secara terbuka dan akuntabel sesuai dengan UU Keterbukaan Informasi Publik No. 14 Tahun 2008.
                    </p>
                </div>
            </div>
            
            <a href="#" class="px-6 py-3 bg-white text-emerald-700 font-bold rounded-lg shadow-lg hover:bg-emerald-50 transition transform hover:-translate-y-1 text-sm whitespace-nowrap">
                Unduh Laporan Lengkap
            </a>
        </div>
    </div>
</section>

@endsection
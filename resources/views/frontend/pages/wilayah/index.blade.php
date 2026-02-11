@extends('layouts.app')

@section('title', 'Pembagian Wilayah')
@section('description', 'Pembagian wilayah administrasi desa')

@section('content')
<!-- Hero Section -->
<x-hero-section 
    title="Pembagian Wilayah"
    subtitle="Struktur administratif wilayah Desa Serayu Larangan"
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('home')],
        ['label' => 'Wilayah', 'url' => '#']
    ]"
/>

<!-- Statistik Wilayah -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($statistik as $stat)
                <x-stat-card 
                    :label="$stat['label']"
                    :value="$stat['value']"
                    :icon="$stat['icon']"
                />
            @endforeach
        </div>
    </div>
</section>

<!-- Daftar Wilayah -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-12">Daftar Dusun</h2>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            @foreach($wilayahList as $wilayah)
                <a href="{{ route('wilayah.show', $wilayah['id']) }}" class="group">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                        <div class="h-32 bg-gradient-to-br from-emerald-400 to-emerald-600 flex items-center justify-center">
                            <span class="text-5xl">{{ $wilayah['icon'] }}</span>
                        </div>
                        
                        <div class="p-6">
                            <div class="flex items-start justify-between mb-3">
                                <h3 class="text-2xl font-bold text-gray-900 group-hover:text-emerald-600 transition">
                                    {{ $wilayah['nama'] }}
                                </h3>
                                <svg class="w-5 h-5 text-emerald-600 opacity-0 group-hover:opacity-100 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </div>

                            <p class="text-gray-600 mb-4">{{ $wilayah['deskripsi'] }}</p>

                            <div class="grid grid-cols-3 gap-4 pt-4 border-t border-gray-200">
                                <div>
                                    <p class="text-xs font-semibold text-gray-500 uppercase">Kepala Dusun</p>
                                    <p class="text-sm font-medium text-gray-900">{{ $wilayah['kepala_dusun'] }}</p>
                                </div>
                                <div>
                                    <p class="text-xs font-semibold text-gray-500 uppercase">RW</p>
                                    <p class="text-sm font-bold text-emerald-600">{{ $wilayah['jumlah_rw'] }}</p>
                                </div>
                                <div>
                                    <p class="text-xs font-semibold text-gray-500 uppercase">RT</p>
                                    <p class="text-sm font-bold text-emerald-600">{{ $wilayah['jumlah_rt'] }}</p>
                                </div>
                            </div>

                            <div class="mt-4 pt-4 border-t border-gray-200">
                                <p class="text-sm text-gray-600">
                                    <span class="font-semibold">{{ $wilayah['jumlah_penduduk'] }}</span> penduduk
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Informasi Struktur -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-8">Struktur Administratif</h2>

        <div class="bg-white rounded-lg shadow-md p-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <span class="inline-block px-3 py-1 bg-emerald-100 text-emerald-700 font-bold rounded-full">
                            1
                        </span>
                        <h3 class="text-lg font-bold text-gray-900">Dusun</h3>
                    </div>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Dusun adalah pembagian wilayah tingkat pertama di desa, dipimpin oleh seorang kepala dusun yang bekerja sama dengan pemerintah desa.
                    </p>
                </div>

                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <span class="inline-block px-3 py-1 bg-blue-100 text-blue-700 font-bold rounded-full">
                            2
                        </span>
                        <h3 class="text-lg font-bold text-gray-900">RW</h3>
                    </div>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        RW (Rukun Warga) adalah sub-divisi dari dusun yang terdiri dari beberapa RT, dipimpin oleh ketua RW.
                    </p>
                </div>

                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <span class="inline-block px-3 py-1 bg-amber-100 text-amber-700 font-bold rounded-full">
                            3
                        </span>
                        <h3 class="text-lg font-bold text-gray-900">RT</h3>
                    </div>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        RT (Rukun Tetangga) adalah unit administratif terkecil yang terdiri dari beberapa kepala keluarga dalam satu lingkungan.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Peta Wilayah Placeholder -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-8">Peta Wilayah</h2>
        <div class="bg-gradient-to-br from-emerald-200 to-teal-200 rounded-lg h-96 flex items-center justify-center border-2 border-dashed border-emerald-400">
            <div class="text-center">
                <svg class="w-20 h-20 mx-auto mb-4 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 003 16.382V5.618a1 1 0 011.553-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-1.553-.894L15 9m0 13V9m0 0H9"/>
                </svg>
                <p class="text-emerald-900 font-semibold">Peta interaktif wilayah akan ditampilkan di sini</p>
                <p class="text-emerald-700 text-sm mt-2">Koordinat: -7.5898, 110.4068</p>
            </div>
        </div>
    </div>
</section>
@endsection

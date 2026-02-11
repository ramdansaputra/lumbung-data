@extends('layouts.app')

@section('title', 'Profil Desa')
@section('description', 'Profil lengkap Desa Serayu Larangan')

@section('content')
<!-- Hero Section -->
<x-hero-section 
    title="Profil Desa"
    subtitle="Mengenal lebih dalam tentang Desa Serayu Larangan"
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('home')],
        ['label' => 'Profil Desa', 'url' => '#']
    ]"
/>

<!-- Informasi Umum Desa -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-center mb-16">
            <div class="lg:col-span-2">
                <div class="mb-6">
                    <span class="inline-block px-3 py-1 bg-emerald-100 text-emerald-700 text-sm font-semibold rounded-full mb-4">
                        Identitas Resmi
                    </span>
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">{{ $profil['nama_desa'] }}</h2>
                </div>

                <p class="text-gray-700 text-lg leading-relaxed mb-8">
                    {{ $deskripsi }}
                </p>

                <!-- Info Detail -->
                <div class="space-y-4">
                    <div class="flex items-start gap-4">
                        <svg class="w-6 h-6 text-emerald-600 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/>
                        </svg>
                        <div>
                            <p class="font-semibold text-gray-900">Kode Desa</p>
                            <p class="text-gray-600">{{ $profil['kode_desa'] }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <svg class="w-6 h-6 text-emerald-600 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <div>
                            <p class="font-semibold text-gray-900">Lokasi</p>
                            <p class="text-gray-600">{{ $profil['kecamatan'] }}, {{ $profil['kabupaten'] }}, {{ $profil['provinsi'] }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <svg class="w-6 h-6 text-emerald-600 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                        </svg>
                        <div>
                            <p class="font-semibold text-gray-900">Email</p>
                            <a href="mailto:{{ $profil['email_desa'] }}" class="text-emerald-600 hover:underline">{{ $profil['email_desa'] }}</a>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <svg class="w-6 h-6 text-emerald-600 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <div>
                            <p class="font-semibold text-gray-900">Telepon</p>
                            <a href="tel:{{ $profil['telepon_desa'] }}" class="text-emerald-600 hover:underline">{{ $profil['telepon_desa'] }}</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gambar -->
            <div class="rounded-lg overflow-hidden shadow-lg">
                <img src="{{ $profil['gambar_kantor'] }}" alt="Kantor Desa" class="w-full h-96 object-cover">
            </div>
        </div>
    </div>
</section>

<!-- Statistik Desa -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Statistik Desa</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($infoDesa as $info)
                <x-stat-card 
                    :label="$info['label']"
                    :value="$info['value']"
                    :icon="$info['icon']"
                />
            @endforeach
        </div>
    </div>
</section>

<!-- Visi dan Misi -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Visi -->
            <div class="bg-gradient-to-br from-emerald-50 to-teal-50 rounded-lg p-8 border border-emerald-200">
                <div class="flex items-center gap-3 mb-4">
                    <span class="text-3xl">🎯</span>
                    <h3 class="text-2xl font-bold text-emerald-900">Visi</h3>
                </div>
                <p class="text-gray-800 text-lg leading-relaxed">
                    {{ $visiMisi['visi'] }}
                </p>
            </div>

            <!-- Misi -->
            <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-lg p-8 border border-blue-200">
                <div class="flex items-center gap-3 mb-6">
                    <span class="text-3xl">🚀</span>
                    <h3 class="text-2xl font-bold text-blue-900">Misi</h3>
                </div>
                <ul class="space-y-3">
                    @foreach($visiMisi['misi'] as $item)
                        <li class="flex items-start gap-3">
                            <span class="text-emerald-600 font-bold mt-1">✓</span>
                            <span class="text-gray-800">{{ $item }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Profil Kepala Desa -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-3">Profil Kepala Desa</h2>
            <p class="text-gray-600">Pimpinan desa yang melayani dengan integritas dan dedikasi</p>
        </div>

        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
            <a href="{{ route('profil-kepala-desa') }}" class="block hover:opacity-90 transition">
                <div class="bg-gradient-to-r from-emerald-500 to-teal-500 h-2"></div>
                <div class="p-8 text-center">
                    <svg class="w-32 h-32 mx-auto mb-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                    </svg>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Fajjar Prasetyo Utomo</h3>
                    <p class="text-emerald-600 font-semibold mb-4">Kepala Desa Serayu Larangan</p>
                    <p class="text-gray-600 mb-6">NIP: 196803041991021001</p>
                    <a href="{{ route('profil-kepala-desa') }}" class="inline-flex items-center gap-2 px-6 py-2 bg-emerald-600 text-white font-semibold rounded-lg hover:bg-emerald-700 transition">
                        Lihat Profil Lengkap
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- Kontak & Lokasi -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Kontak -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Hubungi Kami</h2>
                <div class="space-y-4">
                    <div class="flex items-start gap-4">
                        <svg class="w-6 h-6 text-emerald-600 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        </svg>
                        <div>
                            <p class="font-semibold text-gray-900">Alamat</p>
                            <p class="text-gray-600">{{ $profil['alamat_kantor'] }}</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <svg class="w-6 h-6 text-emerald-600 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                        </svg>
                        <div>
                            <p class="font-semibold text-gray-900">Email</p>
                            <a href="mailto:{{ $profil['email_desa'] }}" class="text-emerald-600 hover:underline">{{ $profil['email_desa'] }}</a>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <svg class="w-6 h-6 text-emerald-600 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <div>
                            <p class="font-semibold text-gray-900">Telepon</p>
                            <a href="tel:{{ $profil['telepon_desa'] }}" class="text-emerald-600 hover:underline">{{ $profil['telepon_desa'] }}</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Peta Lokasi (Placeholder) -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Lokasi Kantor Desa</h2>
                <div class="bg-gradient-to-br from-emerald-200 to-teal-200 rounded-lg h-80 flex items-center justify-center">
                    <div class="text-center text-gray-700">
                        <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <p class="font-semibold">Koordinat: {{ $profil['latitude'] }}, {{ $profil['longitude'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

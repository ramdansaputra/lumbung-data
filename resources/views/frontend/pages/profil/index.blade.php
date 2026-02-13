@extends('layouts.app')

@section('title', 'Profil Desa')
@section('description', 'Profil lengkap, Visi Misi, dan Struktur Pemerintahan Desa ' . ($profil['nama_desa'] ?? ''))

@section('content')

<x-hero-section 
    title="Profil Desa"
    subtitle="Mengenal lebih dalam tentang Desa Serayu Larangan"
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('home')],
        ['label' => 'Profil Desa', 'url' => '#']
    ]"
/>

<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-16 items-start">
            
            <div class="lg:w-3/5 order-2 lg:order-1">
                <x-section-title 
                    :title="$profil['nama_desa'] ?? 'Nama Desa'" 
                    :centered="false"
                    badge="✨ Identitas Resmi"
                />

                <div class="prose prose-emerald text-slate-600 leading-relaxed text-lg mb-10">
                    <p>{{ $deskripsi ?? 'Deskripsi desa belum tersedia.' }}</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <x-info-card 
                        type="horizontal"
                        title="Kode Desa"
                        :description="$profil['kode_desa'] ?? '-'"
                        icon='<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/></svg>'
                    />

                    <x-info-card 
                        type="horizontal"
                        title="Lokasi"
                        :description="($profil['kecamatan'] ?? '-') . ', ' . ($profil['kabupaten'] ?? '-')"
                        icon='<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>'
                    />

                    <x-info-card 
                        type="horizontal"
                        title="Email Resmi"
                        description="<a href='mailto:{{ $profil['email_desa'] ?? '#' }}' class='hover:text-emerald-600 transition'>{{ $profil['email_desa'] ?? '-' }}</a>"
                        icon='<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>'
                    />

                    <x-info-card 
                        type="horizontal"
                        title="Telepon"
                        description="<a href='tel:{{ $profil['telepon_desa'] ?? '#' }}' class='hover:text-emerald-600 transition'>{{ $profil['telepon_desa'] ?? '-' }}</a>"
                        icon='<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>'
                    />
                </div>
            </div>

            <div class="lg:w-2/5 order-1 lg:order-2">
                <div class="relative rounded-3xl overflow-hidden shadow-2xl group border-4 border-white">
                    <img src="{{ $profil['gambar_kantor'] ?? 'https://via.placeholder.com/500x600' }}" alt="Kantor Desa" class="w-full h-auto object-cover transform group-hover:scale-105 transition duration-700">
                    <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-black/70 to-transparent p-6">
                        <p class="text-white text-sm font-medium">📍 Kantor Kepala Desa</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-gray-50 border-y border-gray-100">
    <div class="container mx-auto px-4">
        <x-section-title 
            title="Demografi & Statistik" 
            subtitle="Data terkini kependudukan desa yang transparan dan akurat."
            badge="📊 Data Desa"
        />

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($infoDesa as $info)
                <x-stat-card 
                    :label="$info['label']"
                    :value="$info['value']"
                    :icon="$info['icon']"
                    color="emerald" 
                />
            @endforeach
        </div>
    </div>
</section>

<section class="py-20 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-emerald-50 rounded-full mix-blend-multiply filter blur-3xl opacity-50"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-50 rounded-full mix-blend-multiply filter blur-3xl opacity-50"></div>

    <div class="container mx-auto px-4 relative z-10">
        <x-section-title 
            title="Visi & Misi" 
            subtitle="Arah pembangunan dan cita-cita luhur untuk kesejahteraan masyarakat."
            badge="🚀 Arah Pembangunan"
        />

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
            <div class="bg-white rounded-2xl p-8 shadow-lg border-t-4 border-emerald-500 hover:shadow-xl transition duration-300 relative overflow-hidden group">
                <div class="absolute top-0 right-0 p-6 opacity-5 group-hover:opacity-10 transition">
                    <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zm0 9l2.5-1.25L12 8.5l-2.5 1.25L12 11zm0 2.5l-5-2.5-5 2.5L12 22l10-8.5-5-2.5-5 2.5z"/></svg>
                </div>
                
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-emerald-100 flex items-center justify-center text-emerald-600 text-2xl shadow-sm">
                        🎯
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Visi Desa</h3>
                </div>
                
                <p class="text-gray-700 text-lg font-medium leading-relaxed italic pl-4 border-l-4 border-emerald-200">
                    "{{ $visiMisi['visi'] ?? 'Visi belum diatur' }}"
                </p>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-lg border-t-4 border-blue-500 hover:shadow-xl transition duration-300 relative overflow-hidden group">
                <div class="absolute top-0 right-0 p-6 opacity-5 group-hover:opacity-10 transition">
                    <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                </div>

                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600 text-2xl shadow-sm">
                        📝
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Misi Desa</h3>
                </div>

                <ul class="space-y-4">
                    @forelse($visiMisi['misi'] ?? [] as $item)
                        <li class="flex items-start gap-4">
                            <span class="flex-shrink-0 flex items-center justify-center w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 text-xs font-bold mt-0.5">✓</span>
                            <span class="text-gray-700 leading-relaxed">{{ $item }}</span>
                        </li>
                    @empty
                        <li class="text-gray-500 italic">Data misi belum tersedia.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-gradient-to-b from-white to-gray-50">
    <div class="container mx-auto px-4">
        <x-section-title 
            title="Pimpinan Desa" 
            badge="👤 Kepala Desa"
        />

        <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 flex flex-col md:flex-row">
            <div class="md:w-2/5 bg-gradient-to-br from-emerald-600 to-teal-800 relative flex items-center justify-center p-8 md:p-0">
                <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
                <div class="relative w-48 h-48 md:w-full md:h-full md:aspect-square overflow-hidden rounded-full md:rounded-none shadow-2xl border-4 border-white/20">
                    <img src="{{ $kades['foto'] ?? 'https://via.placeholder.com/400x400' }}" alt="Kepala Desa" class="w-full h-full object-cover">
                </div>
            </div>

            <div class="md:w-3/5 p-8 md:p-12 flex flex-col justify-center">
                <div class="inline-block px-3 py-1 bg-emerald-50 text-emerald-700 text-xs font-bold rounded-full mb-4 w-fit">
                    PERIODE {{ $kades['masa_jabatan'] ?? '2020 - 2026' }}
                </div>
                <h3 class="text-3xl font-bold text-gray-900 mb-2">{{ $kades['nama'] ?? 'Nama Kepala Desa' }}</h3>
                <p class="text-emerald-600 font-medium text-lg mb-6">Kepala Desa {{ $profil['nama_desa'] ?? '' }}</p>
                
                <div class="space-y-3 mb-8 border-t border-b border-gray-100 py-6">
                    <div class="flex items-center gap-3 text-gray-600">
                        <span class="w-8 flex justify-center text-gray-400"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path></svg></span>
                        <span class="font-mono">NIP: {{ $kades['nip'] ?? '-' }}</span>
                    </div>
                </div>

                <div>
                    <a href="{{ route('profil-kepala-desa') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gray-900 text-white font-semibold rounded-xl hover:bg-emerald-600 transition duration-300 shadow-lg hover:shadow-emerald-500/30 w-full md:w-auto justify-center">
                        Lihat Sambutan Lengkap
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-white border-t border-gray-100">
    <div class="container mx-auto px-4">
        <x-section-title 
            title="Lokasi Kantor" 
            badge="📍 Peta Desa"
        />

        <div class="bg-white p-2 rounded-3xl shadow-xl border border-gray-200">
            <div class="bg-gray-100 rounded-2xl h-96 flex items-center justify-center w-full overflow-hidden relative group">
                <div class="text-center z-10">
                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mx-auto mb-4 shadow-md group-hover:scale-110 transition duration-300">
                        <svg class="w-10 h-10 text-red-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                    </div>
                    <p class="text-gray-800 font-bold text-lg">Peta Google Maps</p>
                    <p class="text-gray-500 text-sm mt-1">Koordinat: {{ $profil['latitude'] ?? '0.00' }}, {{ $profil['longitude'] ?? '0.00' }}</p>
                </div>
                
                <div class="absolute inset-0 bg-emerald-50/50 mix-blend-multiply"></div>
            </div>
        </div>
    </div>
</section>

@endsection
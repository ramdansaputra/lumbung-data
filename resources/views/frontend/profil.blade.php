@extends('layouts.frontend')

@section('content')

<!-- HERO SECTION -->
<section class="relative h-[70vh] flex items-center overflow-hidden">
    <img src="{{ asset('images/desa.jpeg') }}"
        class="absolute inset-0 w-full h-full object-cover"
        alt="Background Desa">
    
    <div class="absolute inset-0 bg-gradient-to-br from-emerald-900/90 via-emerald-800/80 to-teal-900/90"></div>

    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 left-10 w-72 h-72 bg-white/5 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-teal-400/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-6 text-white z-10">
        <span class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md px-5 py-2 rounded-full text-sm mb-6 border border-white/20 animate-fade-in-down">
            <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
            Profil Desa
        </span>

        <h1 class="text-5xl md:text-7xl font-extrabold leading-tight mb-6 animate-fade-in-up">
            <span class="bg-gradient-to-r from-white via-emerald-100 to-white bg-clip-text text-transparent">
                {{ $identitas_desa->nama_desa ?? 'Profil Desa' }}
            </span>
        </h1>

        <p class="mt-4 max-w-2xl text-xl md:text-2xl opacity-90 leading-relaxed animate-fade-in-up animation-delay-200">
            Kenali lebih dalam tentang {{ $identitas_desa->nama_desa ?? 'desa kami' }}, potensi, dan perkembangannya.
        </p>

        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </div>
</section>

<!-- STATISTIK PENDUDUK -->
<section class="max-w-7xl mx-auto px-6 lg:px-8 -mt-20 relative z-20 mb-24">
    <div class="grid md:grid-cols-4 gap-6">
        <div class="group bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl border border-emerald-100 transform hover:-translate-y-2 transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center transform group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <span class="text-emerald-500 font-bold text-sm">Total</span>
            </div>
            <h3 class="text-4xl font-bold bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent mb-2">{{ number_format($total_penduduk) }}</h3>
            <p class="text-sm text-slate-600 font-medium">Jumlah Penduduk</p>
            <p class="text-xs text-slate-400 mt-1">Jiwa</p>
        </div>

        <div class="group bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl border border-blue-100 transform hover:-translate-y-2 transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-2xl flex items-center justify-center transform group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
            </div>
            <h3 class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-cyan-600 bg-clip-text text-transparent mb-2">{{ number_format($laki_laki) }}</h3>
            <p class="text-sm text-slate-600 font-medium">Laki-laki</p>
            <p class="text-xs text-slate-400 mt-1">Jiwa</p>
        </div>

        <div class="group bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl border border-pink-100 transform hover:-translate-y-2 transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-pink-500 to-rose-600 rounded-2xl flex items-center justify-center transform group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
            </div>
            <h3 class="text-4xl font-bold bg-gradient-to-r from-pink-600 to-rose-600 bg-clip-text text-transparent mb-2">{{ number_format($perempuan) }}</h3>
            <p class="text-sm text-slate-600 font-medium">Perempuan</p>
            <p class="text-xs text-slate-400 mt-1">Jiwa</p>
        </div>

        <div class="group bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl border border-purple-100 transform hover:-translate-y-2 transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-violet-600 rounded-2xl flex items-center justify-center transform group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                </div>
            </div>
            <h3 class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-violet-600 bg-clip-text text-transparent mb-2">{{ number_format($total_keluarga) }}</h3>
            <p class="text-sm text-slate-600 font-medium">Jumlah KK</p>
            <p class="text-xs text-slate-400 mt-1">Keluarga</p>
        </div>
    </div>
</section>

<!-- IDENTITAS DESA -->
<section class="max-w-7xl mx-auto px-6 lg:px-8 mb-24">
    <div class="text-center mb-16">
        <span class="inline-block bg-emerald-100 text-emerald-700 px-4 py-2 rounded-full text-sm font-semibold mb-4">
            <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Identitas Desa
        </span>
        <h2 class="text-4xl md:text-5xl font-bold mb-4 text-slate-900">
            Informasi Dasar
        </h2>
        <p class="text-slate-600 max-w-2xl mx-auto text-lg">
            Data identitas resmi {{ $identitas_desa->nama_desa ?? 'desa' }} sesuai dengan administrasi pemerintah.
        </p>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @php
        $identitas_items = [
            ['label' => 'Nama Desa', 'value' => $identitas_desa->nama_desa ?? '-', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
            ['label' => 'Kode Desa', 'value' => $identitas_desa->kode_desa ?? '-', 'icon' => 'M7 20l4-16m2 16l4-16M6 9h14M4 15h14'],
            ['label' => 'Kode BPS Desa', 'value' => $identitas_desa->kode_bps_desa ?? '-', 'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'],
            ['label' => 'Kecamatan', 'value' => $identitas_desa->kecamatan ?? '-', 'icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z'],
            ['label' => 'Kabupaten', 'value' => $identitas_desa->kabupaten ?? '-', 'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
            ['label' => 'Provinsi', 'value' => $identitas_desa->provinsi ?? '-', 'icon' => 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
            ['label' => 'Kode Pos', 'value' => $identitas_desa->kode_pos ?? '-', 'icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
            ['label' => 'Kode Kecamatan', 'value' => $identitas_desa->kode_kecamatan ?? '-', 'icon' => 'M7 20l4-16m2 16l4-16M6 9h14M4 15h14'],
            ['label' => 'Kode Kabupaten', 'value' => $identitas_desa->kode_kabupaten ?? '-', 'icon' => 'M7 20l4-16m2 16l4-16M6 9h14M4 15h14'],
            ['label' => 'Kode Provinsi', 'value' => $identitas_desa->kode_provinsi ?? '-', 'icon' => 'M7 20l4-16m2 16l4-16M6 9h14M4 15h14'],
        ];
        @endphp

        @foreach($identitas_items as $item)
        <div class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl border border-slate-200 hover:border-emerald-200 transform hover:-translate-y-1 transition-all duration-300">
            <div class="flex items-start gap-3">
                <div class="w-10 h-10 bg-emerald-50 rounded-xl flex items-center justify-center flex-shrink-0 transform group-hover:scale-110 transition-all">
                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"></path>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">{{ $item['label'] }}</p>
                    <p class="text-base font-semibold text-slate-900 break-words">{{ $item['value'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- PEMERINTAHAN DESA -->
<section class="bg-gradient-to-br from-slate-50 via-blue-50/30 to-indigo-50/20 py-24 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-blue-100/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-indigo-100/20 rounded-full blur-3xl"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="text-center mb-16">
            <span class="inline-block bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                Pemerintahan
            </span>
            <h2 class="text-4xl md:text-5xl font-bold mb-4 text-slate-900">
                Struktur Pemerintahan
            </h2>
            <p class="text-slate-600 max-w-2xl mx-auto text-lg">
                Tokoh-tokoh penting dalam pemerintahan {{ $identitas_desa->nama_desa ?? 'desa' }}.
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            <!-- Kepala Desa -->
            <div class="bg-white/90 backdrop-blur-sm p-8 rounded-2xl shadow-lg border border-slate-200 hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                <div class="flex items-start gap-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-emerald-600 mb-1">Kepala Desa</p>
                        <h4 class="font-bold text-2xl text-slate-900 mb-2">{{ $identitas_desa->kepala_desa ?? '-' }}</h4>
                        @if($identitas_desa->nip_kepala_desa)
                        <p class="text-slate-500 text-sm">NIP: {{ $identitas_desa->nip_kepala_desa }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Sekretaris Desa -->
            <div class="bg-white/90 backdrop-blur-sm p-8 rounded-2xl shadow-lg border border-slate-200 hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                <div class="flex items-start gap-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-blue-600 mb-1">Sekretaris Desa</p>
                        <h4 class="font-bold text-2xl text-slate-900 mb-2">{{ $identitas_desa->nama_penanggungjawab_desa ?? '-' }}</h4>
                        @if($identitas_desa->no_ppwa)
                        <p class="text-slate-500 text-sm">No. PPWA: {{ $identitas_desa->no_ppwa }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Camat -->
            <div class="bg-white/90 backdrop-blur-sm p-8 rounded-2xl shadow-lg border border-slate-200 hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                <div class="flex items-start gap-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-purple-600 mb-1">Camat</p>
                        <h4 class="font-bold text-2xl text-slate-900 mb-2">{{ $identitas_desa->nama_camat ?? '-' }}</h4>
                        @if($identitas_desa->nip_camat)
                        <p class="text-slate-500 text-sm">NIP: {{ $identitas_desa->nip_camat }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Kantor Desa -->
            <div class="bg-white/90 backdrop-blur-sm p-8 rounded-2xl shadow-lg border border-slate-200 hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                <div class="flex items-start gap-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-orange-600 mb-1">Kantor Desa</p>
                        <h4 class="font-bold text-lg text-slate-900">{{ $identitas_desa->kantor_desa ?? '-' }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- WILAYAH ADMINISTRATIF -->
<section class="max-w-7xl mx-auto px-6 py-24">
    <div class="text-center mb-16">
        <span class="inline-block bg-purple-100 text-purple-700 px-4 py-2 rounded-full text-sm font-semibold mb-4">
            <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
            </svg>
            Wilayah Administratif
        </span>
        <h2 class="text-4xl md:text-5xl font-bold mb-4 text-slate-900">
            Pembagian Wilayah
        </h2>
        <p class="text-slate-600 max-w-2xl mx-auto text-lg">
            Struktur administratif wilayah {{ $identitas_desa->nama_desa ?? 'desa' }}.
        </p>
    </div>

    <div class="grid md:grid-cols-3 gap-8">
        <!-- Dusun -->
        <div class="relative group bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl border border-slate-200 transform hover:-translate-y-2 transition-all duration-300 overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-50 rounded-full -mr-16 -mt-16 opacity-50"></div>
            <div class="relative">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <span class="text-emerald-600 font-semibold text-sm">Dusun</span>
                </div>
                <h3 class="text-5xl font-bold bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent mb-2">{{ $total_dusun }}</h3>
                <p class="text-slate-700 font-medium">Jumlah Dusun</p>
                <p class="text-slate-500 text-sm mt-1">Wilayah utama</p>
            </div>
        </div>

        <!-- RT/RW -->
        <div class="relative group bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl border border-slate-200 transform hover:-translate-y-2 transition-all duration-300 overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50 rounded-full -mr-16 -mt-16 opacity-50"></div>
            <div class="relative">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                        </svg>
                    </div>
                    <span class="text-blue-600 font-semibold text-sm">RT/RW</span>
                </div>
                <h3 class="text-5xl font-bold bg-gradient-to-r from-blue-600 to-cyan-600 bg-clip-text text-transparent mb-2">{{ $total_rt_rw }}</h3>
                <p class="text-slate-700 font-medium">Jumlah RT/RW</p>
                <p class="text-slate-500 text-sm mt-1">Unit lingkungan</p>
            </div>
        </div>

        <!-- Link Wilayah -->
        <div class="relative group bg-gradient-to-br from-purple-500 to-pink-600 p-8 rounded-2xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 overflow-hidden text-white">
            <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -mr-16 -mt-16"></div>
            <div class="relative">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                        </svg>
                    </div>
                </div>
                <h3 class="text-lg font-bold mb-2">Detail Wilayah</h3>
                <p class="text-white/90 text-sm mb-4">Lihat pembagian wilayah secara lengkap</p>
                <a href="{{ route('wilayah') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-white/20 backdrop-blur-sm rounded-lg hover:bg-white/30 transition-colors text-sm font-semibold">
                    Lihat Detail
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- KONTAK & INFORMASI -->
<section class="bg-gradient-to-br from-slate-50 to-gray-100 py-24">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <span class="inline-block bg-slate-200 text-slate-700 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                Kontak & Informasi
            </span>
            <h2 class="text-4xl md:text-5xl font-bold mb-4 text-slate-900">
                Hubungi Kami
            </h2>
            <p class="text-slate-600 max-w-2xl mx-auto text-lg">
                Informasi kontak untuk berkomunikasi dengan pemerintah {{ $identitas_desa->nama_desa ?? 'desa' }}.
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <!-- Alamat & Lokasi -->
            <div class="bg-white p-8 rounded-2xl shadow-lg border border-slate-200">
                <h3 class="text-xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                    <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Alamat & Lokasi
                </h3>
                
                <div class="space-y-4">
                    @if($identitas_desa->alamat_kantor)
                    <div class="flex items-start gap-3 p-4 bg-slate-50 rounded-lg">
                        <svg class="w-5 h-5 text-slate-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        </svg>
                        <div>
                            <p class="text-sm font-semibold text-slate-600 mb-1">Alamat Kantor</p>
                            <p class="text-slate-900">{{ $identitas_desa->alamat_kantor }}</p>
                        </div>
                    </div>
                    @endif

                    @if($identitas_desa->latitude && $identitas_desa->longitude)
                    <div class="flex items-start gap-3 p-4 bg-slate-50 rounded-lg">
                        <svg class="w-5 h-5 text-slate-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                        </svg>
                        <div>
                            <p class="text-sm font-semibold text-slate-600 mb-1">Koordinat</p>
                            <p class="text-slate-900 text-sm">Lat: {{ $identitas_desa->latitude }}</p>
                            <p class="text-slate-900 text-sm">Long: {{ $identitas_desa->longitude }}</p>
                        </div>
                    </div>
                    @endif

                    @if($identitas_desa->link_peta)
                    <a href="{{ $identitas_desa->link_peta }}" target="_blank" class="flex items-center gap-2 px-4 py-3 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors text-sm font-semibold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                        </svg>
                        Lihat di Peta
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                        </svg>
                    </a>
                    @endif
                </div>
            </div>

            <!-- Kontak -->
            <div class="bg-white p-8 rounded-2xl shadow-lg border border-slate-200">
                <h3 class="text-xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    Informasi Kontak
                </h3>

                <div class="space-y-4">
                    @if($identitas_desa->telepon_desa)
                    <div class="flex items-start gap-3 p-4 bg-slate-50 rounded-lg">
                        <svg class="w-5 h-5 text-slate-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <div>
                            <p class="text-sm font-semibold text-slate-600 mb-1">Telepon</p>
                            <p class="text-slate-900">{{ $identitas_desa->telepon_desa }}</p>
                        </div>
                    </div>
                    @endif

                    @if($identitas_desa->ponsel_desa)
                    <div class="flex items-start gap-3 p-4 bg-slate-50 rounded-lg">
                        <svg class="w-5 h-5 text-slate-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                        <div>
                            <p class="text-sm font-semibold text-slate-600 mb-1">Ponsel</p>
                            <p class="text-slate-900">{{ $identitas_desa->ponsel_desa }}</p>
                        </div>
                    </div>
                    @endif

                    @if($identitas_desa->email_desa)
                    <div class="flex items-start gap-3 p-4 bg-slate-50 rounded-lg">
                        <svg class="w-5 h-5 text-slate-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <div>
                            <p class="text-sm font-semibold text-slate-600 mb-1">Email</p>
                            <p class="text-slate-900 break-all">{{ $identitas_desa->email_desa }}</p>
                        </div>
                    </div>
                    @endif

                    @if($identitas_desa->website_desa)
                    <div class="flex items-start gap-3 p-4 bg-slate-50 rounded-lg">
                        <svg class="w-5 h-5 text-slate-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                        </svg>
                        <div>
                            <p class="text-sm font-semibold text-slate-600 mb-1">Website</p>
                            <a href="{{ $identitas_desa->website_desa }}" target="_blank" class="text-blue-600 hover:text-blue-700 break-all">{{ $identitas_desa->website_desa }}</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Custom Animations -->
<style>
    @keyframes fade-in-down {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in-down {
        animation: fade-in-down 0.8s ease-out forwards;
    }

    .animate-fade-in-up {
        animation: fade-in-up 0.8s ease-out forwards;
    }

    .animation-delay-200 {
        animation-delay: 0.2s;
        opacity: 0;
    }

    .delay-1000 {
        animation-delay: 1s;
    }
</style>

@endsection
@extends('layouts.frontend')

@section('content')

<!-- HERO SECTION -->
<section class="relative h-[60vh] flex items-center overflow-hidden">
    <!-- Background Image with Parallax Effect -->
    <img src="{{ asset('images/desa.jpeg') }}"
        class="absolute inset-0 w-full h-full object-cover transform scale-110 transition-transform duration-1000">

    <!-- Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-br from-emerald-900/90 via-emerald-800/80 to-teal-900/90"></div>

    <!-- Animated Shapes Background -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 left-10 w-72 h-72 bg-white/5 rounded-full blur-3xl animate-pulse"></div>
        <div
            class="absolute bottom-20 right-10 w-96 h-96 bg-teal-400/10 rounded-full blur-3xl animate-pulse delay-1000">
        </div>
    </div>

    <div class="relative max-w-7xl mx-auto px-6 text-white z-10">
        <!-- Badge -->
        <span
            class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md px-5 py-2 rounded-full text-sm mb-6 border border-white/20 animate-fade-in-down">
            <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
            Profil Desa
        </span>

        <!-- Main Title -->
        <h1 class="text-5xl md:text-7xl font-extrabold leading-tight mb-6 animate-fade-in-up">
            <span class="bg-gradient-to-r from-white via-emerald-100 to-white bg-clip-text text-transparent">
                {{ $identitas_desa->nama_desa ?? 'Profil Desa' }}
            </span>
        </h1>

        <!-- Subtitle -->
        <p class="mt-4 max-w-2xl text-xl md:text-2xl opacity-90 leading-relaxed animate-fade-in-up animation-delay-200">
            Kenali lebih dalam tentang {{ $identitas_desa->nama_desa ?? 'desa kami' }}, potensi, dan perkembangannya.
        </p>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3">
                </path>
            </svg>
        </div>
    </div>
</section>

<!-- IDENTITAS DESA -->
<section class="max-w-7xl mx-auto px-6 py-24">
    <div class="text-center mb-16">
        <span
            class="inline-flex items-center gap-2 bg-emerald-50 text-emerald-700 px-4 py-2 rounded-full text-sm font-semibold mb-4 border border-emerald-100">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                </path>
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

    <div class="grid md:grid-cols-3 gap-6">
        <!-- Nama Desa -->
        <div
            class="group bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl border border-slate-200 hover:border-emerald-200 transform hover:-translate-y-1 transition-all duration-300">
            <div
                class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center mb-4 transform group-hover:scale-110 transition-all">
                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
            </div>
            <h3 class="font-semibold text-sm mb-2 text-slate-500 uppercase tracking-wide">Nama Desa</h3>
            <p class="text-slate-900 text-lg font-medium">{{ $identitas_desa->nama_desa ?? '-' }}</p>
        </div>

        <!-- Kode Desa -->
        <div
            class="group bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl border border-slate-200 hover:border-blue-200 transform hover:-translate-y-1 transition-all duration-300">
            <div
                class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center mb-4 transform group-hover:scale-110 transition-all">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
            </div>
            <h3 class="font-semibold text-sm mb-2 text-slate-500 uppercase tracking-wide">Kode Desa</h3>
            <p class="text-slate-900 text-lg font-medium">{{ $identitas_desa->kode_desa ?? '-' }}</p>
        </div>

        <!-- Kecamatan -->
        <div
            class="group bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl border border-slate-200 hover:border-purple-200 transform hover:-translate-y-1 transition-all duration-300">
            <div
                class="w-12 h-12 bg-purple-50 rounded-xl flex items-center justify-center mb-4 transform group-hover:scale-110 transition-all">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
            </div>
            <h3 class="font-semibold text-sm mb-2 text-slate-500 uppercase tracking-wide">Kecamatan</h3>
            <p class="text-slate-900 text-lg font-medium">{{ $identitas_desa->kecamatan ?? '-' }}</p>
        </div>

        <!-- Kabupaten -->
        <div
            class="group bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl border border-slate-200 hover:border-orange-200 transform hover:-translate-y-1 transition-all duration-300">
            <div
                class="w-12 h-12 bg-orange-50 rounded-xl flex items-center justify-center mb-4 transform group-hover:scale-110 transition-all">
                <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                    </path>
                </svg>
            </div>
            <h3 class="font-semibold text-sm mb-2 text-slate-500 uppercase tracking-wide">Kabupaten</h3>
            <p class="text-slate-900 text-lg font-medium">{{ $identitas_desa->kabupaten ?? '-' }}</p>
        </div>

        <!-- Provinsi -->
        <div
            class="group bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl border border-slate-200 hover:border-green-200 transform hover:-translate-y-1 transition-all duration-300">
            <div
                class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center mb-4 transform group-hover:scale-110 transition-all">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg>
            </div>
            <h3 class="font-semibold text-sm mb-2 text-slate-500 uppercase tracking-wide">Provinsi</h3>
            <p class="text-slate-900 text-lg font-medium">{{ $identitas_desa->provinsi ?? '-' }}</p>
        </div>

        <!-- Kode Pos -->
        <div
            class="group bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl border border-slate-200 hover:border-yellow-200 transform hover:-translate-y-1 transition-all duration-300">
            <div
                class="w-12 h-12 bg-yellow-50 rounded-xl flex items-center justify-center mb-4 transform group-hover:scale-110 transition-all">
                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                    </path>
                </svg>
            </div>
            <h3 class="font-semibold text-sm mb-2 text-slate-500 uppercase tracking-wide">Kode Pos</h3>
            <p class="text-slate-900 text-lg font-medium">{{ $identitas_desa->kode_pos ?? '-' }}</p>
        </div>

        <!-- Kode BPS Desa -->
        <div
            class="group bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl border border-slate-200 hover:border-indigo-200 transform hover:-translate-y-1 transition-all duration-300">
            <div
                class="w-12 h-12 bg-indigo-50 rounded-xl flex items-center justify-center mb-4 transform group-hover:scale-110 transition-all">
                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                    </path>
                </svg>
            </div>
            <h3 class="font-semibold text-sm mb-2 text-slate-500 uppercase tracking-wide">Kode BPS Desa</h3>
            <p class="text-slate-900 text-lg font-medium">{{ $identitas_desa->kode_bps_desa ?? '-' }}</p>
        </div>

        <!-- Kode Kecamatan -->
        <div
            class="group bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl border border-slate-200 hover:border-cyan-200 transform hover:-translate-y-1 transition-all duration-300">
            <div
                class="w-12 h-12 bg-cyan-50 rounded-xl flex items-center justify-center mb-4 transform group-hover:scale-110 transition-all">
                <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                </svg>
            </div>
            <h3 class="font-semibold text-sm mb-2 text-slate-500 uppercase tracking-wide">Kode Kecamatan</h3>
            <p class="text-slate-900 text-lg font-medium">{{ $identitas_desa->kode_kecamatan ?? '-' }}</p>
        </div>

        <!-- Kode Kabupaten -->
        <div
            class="group bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl border border-slate-200 hover:border-teal-200 transform hover:-translate-y-1 transition-all duration-300">
            <div
                class="w-12 h-12 bg-teal-50 rounded-xl flex items-center justify-center mb-4 transform group-hover:scale-110 transition-all">
                <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                </svg>
            </div>
            <h3 class="font-semibold text-sm mb-2 text-slate-500 uppercase tracking-wide">Kode Kabupaten</h3>
            <p class="text-slate-900 text-lg font-medium">{{ $identitas_desa->kode_kabupaten ?? '-' }}</p>
        </div>

        <!-- Kode Provinsi -->
        <div
            class="group bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl border border-slate-200 hover:border-rose-200 transform hover:-translate-y-1 transition-all duration-300">
            <div
                class="w-12 h-12 bg-rose-50 rounded-xl flex items-center justify-center mb-4 transform group-hover:scale-110 transition-all">
                <svg class="w-6 h-6 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                </svg>
            </div>
            <h3 class="font-semibold text-sm mb-2 text-slate-500 uppercase tracking-wide">Kode Provinsi</h3>
            <p class="text-slate-900 text-lg font-medium">{{ $identitas_desa->kode_provinsi ?? '-' }}</p>
        </div>
    </div>
</section>

<!-- PEMERINTAHAN DESA -->
<section class="bg-gradient-to-br from-slate-50 via-blue-50/30 to-indigo-50/20 py-24 relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-blue-100/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-indigo-100/20 rounded-full blur-3xl"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="text-center mb-16">
            <span
                class="inline-flex items-center gap-2 bg-blue-50 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold mb-4 border border-blue-100">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
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

        <div class="grid md:grid-cols-2 gap-8">
            <!-- Kepala Desa -->
            <div
                class="bg-white/90 backdrop-blur-sm p-8 rounded-2xl shadow-lg border border-slate-200 hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                <div class="flex items-start gap-6">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-bold text-2xl text-slate-900 mb-2">{{ $identitas_desa->kepala_desa ?? 'Kepala
                            Desa' }}</h4>
                        <p class="text-emerald-600 font-semibold text-base mb-2">Kepala Desa</p>
                        @if($identitas_desa->nip_kepala_desa)
                        <p class="text-slate-500 text-sm">NIP: {{ $identitas_desa->nip_kepala_desa }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Sekretaris Desa -->
            <div
                class="bg-white/90 backdrop-blur-sm p-8 rounded-2xl shadow-lg border border-slate-200 hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                <div class="flex items-start gap-6">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-bold text-2xl text-slate-900 mb-2">{{ $identitas_desa->nama_penanggungjawab_desa
                            ?? 'Sekretaris Desa' }}</h4>
                        <p class="text-blue-600 font-semibold text-base mb-2">Sekretaris Desa</p>
                        @if($identitas_desa->no_ppwa)
                        <p class="text-slate-500 text-sm">No. PPWA: {{ $identitas_desa->no_ppwa }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- INFORMASI TAMBAHAN DESA -->
<section class="max-w-7xl mx-auto px-6 py-24">
    <div class="text-center mb-16">
        <span
            class="inline-flex items-center gap-2 bg-purple-50 text-purple-700 px-4 py-2 rounded-full text-sm font-semibold mb-4 border border-purple-100">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Informasi Tambahan
        </span>
        <h2 class="text-4xl md:text-5xl font-bold mb-4 text-slate-900">
            Detail Desa
        </h2>
        <p class="text-slate-600 max-w-2xl mx-auto text-lg">
            Informasi lengkap lainnya tentang {{ $identitas_desa->nama_desa ?? 'desa' }}.
        </p>
    </div>

    <div class="grid md:grid-cols-3 gap-6">
        <!-- Alamat Kantor -->
        <div
            class="group bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl border border-slate-200 hover:border-red-200 transform hover:-translate-y-1 transition-all duration-300">
            <div
                class="w-12 h-12 bg-red-50 rounded-xl flex items-center justify-center mb-4 transform group-hover:scale-110 transition-all">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                    </path>
                </svg>
            </div>
            <h3 class="font-semibold text-sm mb-2 text-slate-500 uppercase tracking-wide">Alamat Kantor</h3>
            <p class="text-slate-900 text-base leading-relaxed">{{ $identitas_desa->alamat_kantor ?? '-' }}</p>
        </div>

        <!-- Kantor Desa -->
        <div
            class="group bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl border border-slate-200 hover:border-amber-200 transform hover:-translate-y-1 transition-all duration-300">
            <div
                class="w-12 h-12 bg-amber-50 rounded-xl flex items-center justify-center mb-4 transform group-hover:scale-110 transition-all">
                <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                </svg>
            </div>
            <h3 class="font-semibold text-sm mb-2 text-slate-500 uppercase tracking-wide">Kantor Desa</h3>
            <p class="text-slate-900 text-base">{{ $identitas_desa->kantor_desa ?? '-' }}</p>
        </div>

        <!-- Email Desa -->
        <div
            class="group bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl border border-slate-200 hover:border-blue-200 transform hover:-translate-y-1 transition-all duration-300">
            <div
                class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center mb-4 transform group-hover:scale-110 transition-all">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207">
                    </path>
                </svg>
            </div>
            <h3 class="font-semibold text-sm mb-2 text-slate-500 uppercase tracking-wide">Email Desa</h3>
            <p class="text-slate-900 text-base break-all">{{ $identitas_desa->email_desa ?? '-' }}</p>
        </div>

        <!-- Telepon Desa -->
        <div
            class="group bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl border border-slate-200 hover:border-green-200 transform hover:-translate-y-1 transition-all duration-300">
            <div
                class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center mb-4 transform group-hover:scale-110 transition-all">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                    </path>
                </svg>
            </div>
            <h3 class="font-semibold text-sm mb-2 text-slate-500 uppercase tracking-wide">Telepon Desa</h3>
            <p class="text-slate-900 text-base">{{ $identitas_desa->telepon_desa ?? '-' }}</p>
        </div>

        <!-- Ponsel Desa -->
        <div
            class="group bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl border border-slate-200 hover:border-purple-200 transform hover:-translate-y-1 transition-all duration-300">
            <div
                class="w-12 h-12 bg-purple-50 rounded-xl flex items-center justify-center mb-4 transform group-hover:scale-110 transition-all">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                </svg>
            </div>
            <h3 class="font-semibold text-sm mb-2 text-slate-500 uppercase tracking-wide">Ponsel Desa</h3>
            <p class="text-slate-900 text-base">{{ $identitas_desa->ponsel_desa ?? '-' }}</p>
        </div>

        <!-- Website Desa -->
        <div
            class="group bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl border border-slate-200 hover:border-cyan-200 transform hover:-translate-y-1 transition-all duration-300">
            <div
                class="w-12 h-12 bg-cyan-50 rounded-xl flex items-center justify-center mb-4 transform group-hover:scale-110 transition-all">
                <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9">
                    </path>
                </svg>
            </div>
            <h3 class="font-semibold text-sm mb-2 text-slate-500 uppercase tracking-wide">Website Desa</h3>
            @if($identitas_desa->website_desa)
            <a href="{{ $identitas_desa->website_desa }}" target="_blank"
                class="text-cyan-600 text-base hover:text-cyan-700 transition-colors inline-flex items-center gap-1 group/link">
                <span class="break-all">{{ $identitas_desa->website_desa }}</span>
                <svg class="w-4 h-4 opacity-0 group-hover/link:opacity-100 transition-opacity" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                </svg>
            </a>
            @else
            <p class="text-slate-900 text-base">-</p>
            @endif
        </div>

        <!-- Koordinat -->
        <div
            class="group bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl border border-slate-200 hover:border-emerald-200 transform hover:-translate-y-1 transition-all duration-300">
            <div
                class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center mb-4 transform group-hover:scale-110 transition-all">
                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
            </div>
            <h3 class="font-semibold text-sm mb-2 text-slate-500 uppercase tracking-wide">Koordinat</h3>
            <p class="text-slate-900 text-sm">
                <span class="block">Lat: {{ $identitas_desa->latitude ?? '-' }}</span>
                <span class="block mt-1">Long: {{ $identitas_desa->longitude ?? '-' }}</span>
            </p>
        </div>

        <!-- Link Peta -->
        <div
            class="group bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl border border-slate-200 hover:border-orange-200 transform hover:-translate-y-1 transition-all duration-300">
            <div
                class="w-12 h-12 bg-orange-50 rounded-xl flex items-center justify-center mb-4 transform group-hover:scale-110 transition-all">
                <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7">
                    </path>
                </svg>
            </div>
            <h3 class="font-semibold text-sm mb-2 text-slate-500 uppercase tracking-wide">Link Peta</h3>
            @if($identitas_desa->link_peta)
            <a href="{{ $identitas_desa->link_peta }}" target="_blank"
                class="text-orange-600 text-base hover:text-orange-700 transition-colors inline-flex items-center gap-2">
                Lihat di Peta
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                </svg>
            </a>
            @else
            <p class="text-slate-900 text-base">-</p>
            @endif
        </div>

        <!-- Camat -->
        <div
            class="group bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl border border-slate-200 hover:border-indigo-200 transform hover:-translate-y-1 transition-all duration-300">
            <div
                class="w-12 h-12 bg-indigo-50 rounded-xl flex items-center justify-center mb-4 transform group-hover:scale-110 transition-all">
                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                    </path>
                </svg>
            </div>
            <h3 class="font-semibold text-sm mb-2 text-slate-500 uppercase tracking-wide">Camat</h3>
            <p class="text-slate-900 text-base font-medium">{{ $identitas_desa->nama_camat ?? '-' }}</p>
            @if($identitas_desa->nip_camat)
            <p class="text-slate-500 text-sm mt-1">NIP: {{ $identitas_desa->nip_camat }}</p>
            @endif
        </div>
    </div>
</section>

<!-- DATA PENDUDUK -->
<section class="max-w-7xl mx-auto px-6 py-24">
    <div class="text-center mb-16">
        <span
            class="inline-flex items-center gap-2 bg-emerald-50 text-emerald-700 px-4 py-2 rounded-full text-sm font-semibold mb-4 border border-emerald-100">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                </path>
            </svg>
            Data Penduduk
        </span>
        <h2 class="text-4xl md:text-5xl font-bold mb-4 text-slate-900">
            Statistik Kependudukan
        </h2>
        <p class="text-slate-600 max-w-2xl mx-auto text-lg">
            Data jumlah penduduk dan keluarga di {{ $identitas_desa->nama_desa ?? 'desa' }}.
        </p>
    </div>

    <div class="grid md:grid-cols-4 gap-6">
        <!-- Total Penduduk -->
        <div
            class="relative group bg-gradient-to-br from-emerald-500 to-teal-600 p-8 rounded-2xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -mr-16 -mt-16"></div>
            <div class="relative">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </div>
                    <span class="text-white/80 font-medium text-sm">Total</span>
                </div>
                <h3 class="text-5xl font-bold text-white mb-2">{{ number_format($total_penduduk) }}</h3>
                <p class="text-white/90 font-medium">Jumlah Penduduk</p>
                <p class="text-white/70 text-sm mt-1">Jiwa</p>
            </div>
        </div>

        <!-- Laki-laki -->
        <div
            class="relative group bg-gradient-to-br from-blue-500 to-cyan-600 p-8 rounded-2xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -mr-16 -mt-16"></div>
            <div class="relative">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <span class="text-white/80 font-medium text-sm">Laki-laki</span>
                </div>
                <h3 class="text-5xl font-bold text-white mb-2">{{ number_format($laki_laki) }}</h3>
                <p class="text-white/90 font-medium">Jumlah Laki-laki</p>
                <p class="text-white/70 text-sm mt-1">Jiwa</p>
            </div>
        </div>

        <!-- Perempuan -->
        <div
            class="relative group bg-gradient-to-br from-pink-500 to-rose-600 p-8 rounded-2xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -mr-16 -mt-16"></div>
            <div class="relative">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <span class="text-white/80 font-medium text-sm">Perempuan</span>
                </div>
                <h3 class="text-5xl font-bold text-white mb-2">{{ number_format($perempuan) }}</h3>
                <p class="text-white/90 font-medium">Jumlah Perempuan</p>
                <p class="text-white/70 text-sm mt-1">Jiwa</p>
            </div>
        </div>

        <!-- Keluarga -->
        <div
            class="relative group bg-gradient-to-br from-purple-500 to-violet-600 p-8 rounded-2xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -mr-16 -mt-16"></div>
            <div class="relative">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </div>
                    <span class="text-white/80 font-medium text-sm">Keluarga</span>
                </div>
                <h3 class="text-5xl font-bold text-white mb-2">{{ number_format($total_keluarga) }}</h3>
                <p class="text-white/90 font-medium">Jumlah Keluarga</p>
                <p class="text-white/70 text-sm mt-1">KK</p>
            </div>
        </div>
    </div>
</section>

<!-- WILAYAH -->
<section class="bg-gradient-to-br from-slate-50 via-gray-50 to-slate-100 py-24 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-slate-200/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-slate-200/20 rounded-full blur-3xl"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="text-center mb-16">
            <span
                class="inline-flex items-center gap-2 bg-slate-100 text-slate-700 px-4 py-2 rounded-full text-sm font-semibold mb-4 border border-slate-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7">
                    </path>
                </svg>
                Wilayah
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
            <div
                class="relative group bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl border border-slate-200 transform hover:-translate-y-2 transition-all duration-300 overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-50 rounded-full -mr-16 -mt-16 opacity-50"></div>
                <div class="relative">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                        </div>
                        <span class="text-emerald-600 font-semibold text-sm">Dusun</span>
                    </div>
                    <h3
                        class="text-5xl font-bold bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent mb-2">
                        {{ $total_dusun }}</h3>
                    <p class="text-slate-700 font-medium">Jumlah Dusun</p>
                    <p class="text-slate-500 text-sm mt-1">Wilayah utama</p>
                </div>
            </div>

            <!-- RT -->
            <div
                class="relative group bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl border border-slate-200 transform hover:-translate-y-2 transition-all duration-300 overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50 rounded-full -mr-16 -mt-16 opacity-50"></div>
                <div class="relative">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7">
                                </path>
                            </svg>
                        </div>
                        <span class="text-blue-600 font-semibold text-sm">RT/RW</span>
                    </div>
                    <h3
                        class="text-5xl font-bold bg-gradient-to-r from-blue-600 to-cyan-600 bg-clip-text text-transparent mb-2">
                        {{ $total_rt_rw }}</h3>
                    <p class="text-slate-700 font-medium">Jumlah RT/RW</p>
                    <p class="text-slate-500 text-sm mt-1">Unit lingkungan</p>
                </div>
            </div>

            <!-- Kontak -->
            <div
                class="relative group bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl border border-slate-200 transform hover:-translate-y-2 transition-all duration-300 overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-purple-50 rounded-full -mr-16 -mt-16 opacity-50"></div>
                <div class="relative">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <span class="text-purple-600 font-semibold text-sm">Kontak</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">{{ $identitas_desa->telepon_desa ?? '-' }}</h3>
                    <p class="text-slate-700 font-medium">Telepon Kantor</p>
                    <p class="text-slate-500 text-sm mt-1 break-all">{{ $identitas_desa->email_desa ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
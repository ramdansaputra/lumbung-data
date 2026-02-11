@extends('layouts.frontend')

@section('content')

<!-- HERO SECTION -->
<section class="relative h-[90vh] flex items-center overflow-hidden">
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
            Website Resmi Pemerintah Desa
        </span>

        <!-- Main Title -->
        <h1 class="text-5xl md:text-7xl font-extrabold leading-tight mb-6 animate-fade-in-up">
            <span class="bg-gradient-to-r from-white via-emerald-100 to-white bg-clip-text text-transparent">
                {{ $identitas_desa->nama_desa }}
            </span>
        </h1>

        <!-- Subtitle -->
        <p class="mt-4 max-w-2xl text-xl md:text-2xl opacity-90 leading-relaxed animate-fade-in-up animation-delay-200">
            Media informasi, transparansi, dan pelayanan publik berbasis digital untuk masyarakat {{
            $identitas_desa->nama_desa ?? 'desa' }} yang lebih maju.
        </p>

        <!-- CTA Buttons -->
        <div class="mt-10 flex flex-wrap gap-4 animate-fade-in-up animation-delay-400">
            <a href="#profil"
                class="group px-8 py-4 rounded-full bg-white text-emerald-700 font-semibold shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Profil Desa
                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
            <a href="#layanan"
                class="group px-8 py-4 rounded-full border-2 border-white/40 backdrop-blur-md hover:bg-white/10 font-semibold transition-all duration-300 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                    </path>
                </svg>
                Layanan Publik
            </a>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3">
                </path>
            </svg>
        </div>
    </div>
</section>

<!-- STATISTIK DESA -->
<section class="bg-gradient-to-b from-gray-50 to-white py-20 -mt-20 relative z-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-4 gap-6">

            <div
                class="group bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl border border-emerald-100 transform hover:-translate-y-2 transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div
                        class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center transform group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </div>
                    <span class="text-emerald-500 font-bold text-sm">+12%</span>
                </div>
                <h3
                    class="text-4xl font-bold bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent mb-2">
                    {{ number_format($total_penduduk) }}</h3>
                <p class="text-sm text-slate-600 font-medium">Jumlah Penduduk</p>
                <p class="text-xs text-slate-400 mt-1">Data Real-time</p>
            </div>

            <div
                class="group bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl border border-emerald-100 transform hover:-translate-y-2 transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div
                        class="w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-2xl flex items-center justify-center transform group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </div>
                </div>
                <h3
                    class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-cyan-600 bg-clip-text text-transparent mb-2">
                    {{ $total_dusun }}</h3>
                <p class="text-sm text-slate-600 font-medium">Dusun</p>
                <p class="text-xs text-slate-400 mt-1">Wilayah administratif</p>
            </div>

            <div
                class="group bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl border border-emerald-100 transform hover:-translate-y-2 transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div
                        class="w-14 h-14 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center transform group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7">
                            </path>
                        </svg>
                    </div>
                </div>
                <h3
                    class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent mb-2">
                    {{ $total_rt_rw }}</h3>
                <p class="text-sm text-slate-600 font-medium">RT / RW</p>
                <p class="text-xs text-slate-400 mt-1">Unit lingkungan</p>
            </div>

            <div
                class="group bg-gradient-to-br from-emerald-500 to-teal-600 p-8 rounded-3xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 text-white">
                <div class="flex items-center justify-between mb-4">
                    <div
                        class="w-14 h-14 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center transform group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <span class="text-white/80 font-bold text-sm">✓ Aktif</span>
                </div>
                <h3 class="text-4xl font-bold mb-2">2026</h3>
                <p class="text-sm font-medium opacity-90">Tahun Aktif</p>
                <p class="text-xs opacity-70 mt-1">Pelayanan online 24/7</p>
            </div>

        </div>
    </div>
</section>

<!-- LAYANAN -->
<section id="layanan" class="max-w-7xl mx-auto px-6 py-24">
    <div class="text-center mb-16">
        <span class="inline-block bg-emerald-100 text-emerald-700 px-4 py-2 rounded-full text-sm font-semibold mb-4">
            🎯 Layanan Unggulan
        </span>
        <h2 class="text-4xl md:text-5xl font-bold mb-4">
            Layanan & Informasi Desa
        </h2>
        <p class="text-slate-600 max-w-2xl mx-auto">
            Berbagai layanan digital untuk memudahkan akses informasi dan administrasi desa
        </p>
    </div>

    <div class="grid md:grid-cols-4 gap-6">

        <div
            class="group bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl border border-gray-100 transform hover:-translate-y-2 transition-all duration-300 cursor-pointer">
            <div
                class="w-16 h-16 bg-gradient-to-br from-emerald-100 to-teal-100 rounded-2xl flex items-center justify-center mb-6 transform group-hover:scale-110 group-hover:rotate-6 transition-all">
                <span class="text-4xl">📊</span>
            </div>
            <h3 class="font-bold text-xl mb-3 text-slate-800">Data Desa</h3>
            <p class="text-sm text-slate-600 mb-4">Informasi lengkap statistik dan demografi desa</p>
            <div class="flex items-center text-emerald-600 font-semibold text-sm group-hover:gap-2 transition-all">
                Lihat Detail
                <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </div>
        </div>

        <div
            class="group bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl border border-gray-100 transform hover:-translate-y-2 transition-all duration-300 cursor-pointer">
            <div
                class="w-16 h-16 bg-gradient-to-br from-blue-100 to-cyan-100 rounded-2xl flex items-center justify-center mb-6 transform group-hover:scale-110 group-hover:rotate-6 transition-all">
                <span class="text-4xl">🏛️</span>
            </div>
            <h3 class="font-bold text-xl mb-3 text-slate-800">Pemerintahan</h3>
            <p class="text-sm text-slate-600 mb-4">Struktur organisasi dan perangkat desa</p>
            <div class="flex items-center text-emerald-600 font-semibold text-sm group-hover:gap-2 transition-all">
                Lihat Detail
                <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </div>
        </div>

        <div
            class="group bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl border border-gray-100 transform hover:-translate-y-2 transition-all duration-300 cursor-pointer">
            <div
                class="w-16 h-16 bg-gradient-to-br from-purple-100 to-pink-100 rounded-2xl flex items-center justify-center mb-6 transform group-hover:scale-110 group-hover:rotate-6 transition-all">
                <span class="text-4xl">📜</span>
            </div>
            <h3 class="font-bold text-xl mb-3 text-slate-800">Regulasi</h3>
            <p class="text-sm text-slate-600 mb-4">Peraturan dan kebijakan desa terbaru</p>
            <div class="flex items-center text-emerald-600 font-semibold text-sm group-hover:gap-2 transition-all">
                Lihat Detail
                <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </div>
        </div>

        <div
            class="group bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl border border-gray-100 transform hover:-translate-y-2 transition-all duration-300 cursor-pointer">
            <div
                class="w-16 h-16 bg-gradient-to-br from-orange-100 to-red-100 rounded-2xl flex items-center justify-center mb-6 transform group-hover:scale-110 group-hover:rotate-6 transition-all">
                <span class="text-4xl">🗺️</span>
            </div>
            <h3 class="font-bold text-xl mb-3 text-slate-800">Peta Desa</h3>
            <p class="text-sm text-slate-600 mb-4">Pemetaan wilayah dan fasilitas desa</p>
            <div class="flex items-center text-emerald-600 font-semibold text-sm group-hover:gap-2 transition-all">
                Lihat Detail
                <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </div>
        </div>

    </div>
</section>

<!-- PROFIL DESA -->
<section id="profil" class="bg-gradient-to-br from-emerald-50 via-teal-50 to-cyan-50 py-24 relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-emerald-200/30 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-teal-200/30 rounded-full blur-3xl"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="grid md:grid-cols-2 gap-12 items-center">

            <div class="space-y-6">
                <span class="inline-block bg-emerald-600 text-white px-4 py-2 rounded-full text-sm font-semibold">
                    🏘️ Tentang Kami
                </span>

                <h2 class="text-4xl md:text-5xl font-bold leading-tight">
                    <span class="bg-gradient-to-r from-emerald-700 to-teal-600 bg-clip-text text-transparent">
                        Profil {{ $identitas_desa->nama_desa ?? 'Desa Kembang Merta' }}
                    </span>
                </h2>

                <p class="text-lg leading-relaxed text-slate-700">
                    {{ $identitas_desa->nama_desa ?? 'Desa Kembang Merta' }} merupakan desa yang menjunjung tinggi
                    nilai-nilai
                    <span class="font-semibold text-emerald-700">transparansi</span>,
                    <span class="font-semibold text-emerald-700">pelayanan</span>, dan
                    <span class="font-semibold text-emerald-700">partisipasi masyarakat</span>
                    dalam setiap aspek pembangunan.
                </p>

                <p class="text-slate-600">
                    Kami berkomitmen untuk mewujudkan desa yang mandiri, sejahtera, dan berkelanjutan
                    melalui pemberdayaan masyarakat dan pemanfaatan teknologi digital.
                </p>

                <div class="flex gap-4 pt-4">
                    <a href="#"
                        class="px-6 py-3 bg-emerald-600 text-white rounded-full font-semibold hover:bg-emerald-700 transition-colors shadow-lg hover:shadow-xl">
                        Selengkapnya
                    </a>
                    <a href="#"
                        class="px-6 py-3 border-2 border-emerald-600 text-emerald-700 rounded-full font-semibold hover:bg-emerald-50 transition-colors">
                        Hubungi Kami
                    </a>
                </div>
            </div>

            <div class="space-y-4">
                <div
                    class="bg-white/80 backdrop-blur-md p-8 rounded-3xl shadow-xl border border-white/50 transform hover:scale-105 transition-all duration-300">
                    <div class="flex items-start gap-4">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-bold text-lg text-slate-800 mb-2">Lokasi</h4>
                            <p class="text-slate-600">{{ $identitas_desa->kecamatan }}</p>
                            <p class="text-slate-600">{{ $identitas_desa->kabupaten }}</p>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white/80 backdrop-blur-md p-8 rounded-3xl shadow-xl border border-white/50 transform hover:scale-105 transition-all duration-300">
                    <div class="flex items-start gap-4">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-2xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-bold text-lg text-slate-800 mb-2">Demografi</h4>
                            <p class="text-slate-600">Penduduk: {{ number_format($total_penduduk) }} Jiwa</p>
                            <p class="text-slate-600">Kepala Keluarga: {{ number_format($total_keluarga) }} KK</p>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white/80 backdrop-blur-md p-8 rounded-3xl shadow-xl border border-white/50 transform hover:scale-105 transition-all duration-300">
                    <div class="flex items-start gap-4">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-bold text-lg text-slate-800 mb-2">Wilayah</h4>
                            <p class="text-slate-600">{{ $total_dusun }} Dusun, {{ $total_rt_rw }} RT/RW</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ARTIKEL DESA -->
<section class="max-w-7xl mx-auto px-6 py-24">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-12">
        <div>
            <span
                class="inline-block bg-emerald-100 text-emerald-700 px-4 py-2 rounded-full text-sm font-semibold mb-3">
                📰 Berita Terkini
            </span>
            <h2 class="text-4xl md:text-5xl font-bold">Artikel & Berita Desa</h2>
            <p class="text-slate-600 mt-2">Informasi terbaru seputar kegiatan dan program desa</p>
        </div>
        <a href="{{ route('berita') }}"
            class="group flex items-center gap-2 px-6 py-3 bg-emerald-600 text-white rounded-full font-semibold hover:bg-emerald-700 transition-all shadow-lg hover:shadow-xl">
            Lihat Semua
            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                </path>
            </svg>
        </a>
    </div>

    <div class="grid md:grid-cols-3 gap-8">
        @forelse($artikel as $item)
        <div
            class="group bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 border border-gray-100">
            <div class="relative overflow-hidden h-56">
                <img src="{{ $item->gambar ? asset('storage/artikel/' . $item->gambar) : asset('images/desa.jpeg') }}"
<<<<<<< HEAD
                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
=======
                    class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
>>>>>>> 824e2e4 (Update fitur kesehatan, sekretariat, kehadiran, migration dan seeder)
                <div class="absolute top-4 left-4">
                    <span class="bg-emerald-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                        Artikel
                    </span>
                </div>
            </div>

            <div class="p-6">
                <div class="flex items-center gap-3 text-xs text-slate-500 mb-3">
                    <span class="flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        {{ $item->publish_at ? $item->publish_at->format('d M Y') : 'N/A' }}
                    </span>
                    <span>•</span>
                    <span>3 min read</span>
                </div>

                <h3 class="font-bold text-xl mb-3 text-slate-800 group-hover:text-emerald-700 transition-colors">
                    {{ $item->nama }}
                </h3>

                <p class="text-sm text-slate-600 leading-relaxed mb-4">
                    {{ Str::limit($item->deskripsi, 100) }}
                </p>

                <a href="{{ route('artikel.show', $item->id) }}"
                    class="inline-flex items-center gap-2 text-emerald-600 font-semibold group-hover:gap-3 transition-all">
                    Baca Selengkapnya
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
        @empty
        <div class="col-span-3 text-center py-12">
            <p class="text-slate-500">Belum ada artikel yang tersedia.</p>
        </div>
        @endforelse
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

    .animation-delay-400 {
        animation-delay: 0.4s;
        opacity: 0;
    }

    .delay-1000 {
        animation-delay: 1s;
    }
</style>

@endsection
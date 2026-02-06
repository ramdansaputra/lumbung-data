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
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-teal-400/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-6 text-white z-10">
        <!-- Badge -->
        <span class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md px-5 py-2 rounded-full text-sm mb-6 border border-white/20 animate-fade-in-down">
            <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
            Wilayah Administratif
        </span>

        <!-- Main Title -->
        <h1 class="text-5xl md:text-7xl font-extrabold leading-tight mb-6 animate-fade-in-up">
            <span class="bg-gradient-to-r from-white via-emerald-100 to-white bg-clip-text text-transparent">
                Pembagian Wilayah
            </span>
        </h1>

        <!-- Subtitle -->
        <p class="mt-4 max-w-2xl text-xl md:text-2xl opacity-90 leading-relaxed animate-fade-in-up animation-delay-200">
            Struktur administratif wilayah {{ $identitas_desa->nama_desa ?? 'desa' }} yang terorganisir dan terstruktur.
        </p>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </div>
</section>

<!-- STATISTIK WILAYAH -->
<section class="max-w-7xl mx-auto px-6 py-24">
    <div class="text-center mb-16">
        <span class="inline-block bg-emerald-100 text-emerald-700 px-4 py-2 rounded-full text-sm font-semibold mb-4">
            📊 Statistik Wilayah
        </span>
        <h2 class="text-4xl md:text-5xl font-bold mb-4">
            Ringkasan Wilayah
        </h2>
        <p class="text-slate-600 max-w-2xl mx-auto">
            Data statistik pembagian wilayah administratif {{ $identitas_desa->nama_desa ?? 'desa' }}.
        </p>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Dusun -->
        <div class="group bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl border border-emerald-100 transform hover:-translate-y-2 transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center transform group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <span class="text-emerald-500 font-bold text-sm">Total</span>
            </div>
            <h3 class="text-4xl font-bold bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent mb-2">{{ $data['total_dusun'] }}</h3>
            <p class="text-sm text-slate-600 font-medium">Jumlah Dusun</p>
            <p class="text-xs text-slate-400 mt-1">Wilayah utama</p>
        </div>

        <!-- Total RW -->
        <div class="group bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl border border-blue-100 transform hover:-translate-y-2 transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-2xl flex items-center justify-center transform group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                    </svg>
                </div>
                <span class="text-blue-500 font-bold text-sm">Total</span>
            </div>
            <h3 class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-cyan-600 bg-clip-text text-transparent mb-2">{{ $data['total_rw'] }}</h3>
            <p class="text-sm text-slate-600 font-medium">Jumlah RW</p>
            <p class="text-xs text-slate-400 mt-1">Rukun Warga</p>
        </div>

        <!-- Total RT -->
        <div class="group bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl border border-purple-100 transform hover:-translate-y-2 transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center transform group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <span class="text-purple-500 font-bold text-sm">Total</span>
            </div>
            <h3 class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent mb-2">{{ $data['total_rt'] }}</h3>
            <p class="text-sm text-slate-600 font-medium">Jumlah RT</p>
            <p class="text-xs text-slate-400 mt-1">Rukun Tetangga</p>
        </div>

        <!-- Total Penduduk -->
        <div class="group bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl border border-orange-100 transform hover:-translate-y-2 transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl flex items-center justify-center transform group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                </div>
                <span class="text-orange-500 font-bold text-sm">Total</span>
            </div>
            <h3 class="text-4xl font-bold bg-gradient-to-r from-orange-600 to-red-600 bg-clip-text text-transparent mb-2">{{ number_format($data['total_penduduk']) }}</h3>
            <p class="text-sm text-slate-600 font-medium">Jumlah Penduduk</p>
            <p class="text-xs text-slate-400 mt-1">Jiwa</p>
        </div>
    </div>
</section>

<!-- DAFTAR DUSUN -->
<section class="bg-gradient-to-br from-slate-50 to-gray-100 py-24 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="text-center mb-16">
            <span class="inline-block bg-emerald-100 text-emerald-700 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                🏘️ Daftar Dusun
            </span>
            <h2 class="text-4xl md:text-5xl font-bold mb-4">
                Detail Wilayah
            </h2>
            <p class="text-slate-600 max-w-2xl mx-auto">
                Informasi lengkap tentang setiap dusun, RW, RT, dan kepala wilayah di {{ $identitas_desa->nama_desa ?? 'desa' }}.
            </p>
        </div>

        <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-emerald-600 to-teal-600 text-white">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Nama Dusun</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Kepala Wilayah</th>
                            <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider">RW</th>
                            <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider">RT</th>
                            <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider">KK</th>
                            <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider">Laki-laki</th>
                            <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider">Perempuan</th>
                            <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider">Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200">
                        @foreach($data['wilayah'] as $wilayah)
                        <tr class="hover:bg-slate-50 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <div class="h-10 w-10 rounded-lg bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center">
                                            <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-slate-900">{{ $wilayah['nama'] }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-slate-900">{{ $wilayah['kepala_wilayah'] }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ $wilayah['rw'] }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    {{ $wilayah['rt'] }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-slate-900">
                                {{ number_format($wilayah['kk']) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-slate-900">
                                {{ number_format($wilayah['laki_laki']) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-slate-900">
                                {{ number_format($wilayah['perempuan']) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-800">
                                    {{ number_format($wilayah['laki_laki'] + $wilayah['perempuan']) }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if(count($data['wilayah']) == 0)
            <div class="p-12 text-center">
                <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-slate-900">Belum ada data wilayah</h3>
                <p class="mt-1 text-sm text-slate-500">Data wilayah akan ditampilkan setelah diisi di panel admin.</p>
            </div>
            @endif
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

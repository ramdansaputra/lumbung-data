@extends('layouts.app')

@section('title', 'Struktur Pemerintahan')
@section('description', 'Struktur organisasi dan perangkat desa yang melayani dengan dedikasi')

@section('content')

<x-hero-section 
    title="Struktur Pemerintahan"
    subtitle="Organisasi dan Perangkat yang melayani dengan dedikasi"
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('home')],
        ['label' => 'Pemerintahan', 'url' => '#']
    ]"
/>

<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        @foreach($pemerintahan['struktur'] as $kategori)
            <div class="mb-20 last:mb-0">
                <div class="flex items-center justify-center mb-12">
                    <div class="relative">
                        <h2 class="text-3xl font-bold text-gray-900 z-10 relative px-4">{{ $kategori['kategori'] }}</h2>
                        <div class="absolute inset-x-0 bottom-2 h-3 bg-emerald-100 -z-0"></div>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 justify-center">
                    @foreach($kategori['anggota'] as $perangkat)
                        <div class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 border border-gray-100 flex flex-col h-full">
                            <div class="relative h-72 overflow-hidden bg-gray-100">
                                @if(isset($perangkat['foto']) && $perangkat['foto'])
                                    <img src="{{ $perangkat['foto'] }}" alt="{{ $perangkat['nama'] }}" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-emerald-50 to-teal-100 flex items-center justify-center text-emerald-300">
                                        <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                    </div>
                                @endif
                                
                                <div class="absolute top-4 right-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-white/90 text-emerald-600 shadow-sm backdrop-blur">
                                        {{ $perangkat['status'] ?? 'Aktif' }}
                                    </span>
                                </div>
                            </div>

                            <div class="p-6 text-center flex-1 flex flex-col justify-between relative bg-white">
                                <div class="absolute -top-6 left-1/2 -translate-x-1/2 w-12 h-1 bg-emerald-500 rounded-full"></div>
                                
                                <div>
                                    <p class="text-xs font-bold text-emerald-600 uppercase tracking-widest mb-2">{{ $perangkat['posisi'] }}</p>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-emerald-700 transition">{{ $perangkat['nama'] }}</h3>
                                    
                                    @if(isset($perangkat['nip']) && $perangkat['nip'] != '-')
                                        <div class="inline-flex items-center gap-2 text-gray-500 text-sm bg-gray-50 px-3 py-1 rounded-lg mt-2">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path></svg>
                                            <span class="font-mono">NIP: {{ $perangkat['nip'] }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</section>

<section class="py-20 bg-gray-50 border-y border-gray-100">
    <div class="container mx-auto px-4">
        <x-section-title 
            title="Badan Permusyawaratan Desa (BPD)" 
            subtitle="Lembaga legislatif desa yang menjalankan fungsi pemerintahan bersama Kepala Desa."
            badge="⚖️ Lembaga Desa"
        />

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($badan_permusyawaratan as $anggota)
                <div class="bg-white rounded-xl shadow-sm hover:shadow-lg p-6 border border-gray-100 transition-all duration-300 group">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-14 h-14 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition duration-300">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-blue-600 uppercase tracking-wide">{{ $anggota['posisi'] }}</p>
                            <h3 class="text-lg font-bold text-gray-900">{{ $anggota['nama'] }}</h3>
                        </div>
                    </div>
                    <div class="pt-4 border-t border-gray-100 flex items-center justify-between text-sm text-gray-600">
                        <span>Perwakilan Wilayah:</span>
                        <span class="font-semibold text-gray-800">{{ $anggota['wilayah'] }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            
            <div class="bg-white rounded-2xl p-8 shadow-xl border-t-4 border-emerald-500 relative overflow-hidden">
                <div class="absolute top-0 right-0 p-6 opacity-5">
                    <svg class="w-40 h-40" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/></svg>
                </div>
                
                <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                    <span class="w-10 h-10 rounded-lg bg-emerald-100 flex items-center justify-center text-emerald-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    </span>
                    Tugas & Fungsi Pokok
                </h3>
                
                <ul class="space-y-4 relative z-10">
                    <li class="flex items-start gap-4">
                        <div class="mt-1 w-6 h-6 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-600 text-xs font-bold">1</div>
                        <span class="text-gray-700">Menyelenggarakan pemerintahan desa yang tertib dan transparan.</span>
                    </li>
                    <li class="flex items-start gap-4">
                        <div class="mt-1 w-6 h-6 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-600 text-xs font-bold">2</div>
                        <span class="text-gray-700">Melaksanakan pembangunan desa secara partisipatif dan berkelanjutan.</span>
                    </li>
                    <li class="flex items-start gap-4">
                        <div class="mt-1 w-6 h-6 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-600 text-xs font-bold">3</div>
                        <span class="text-gray-700">Melakukan pembinaan kemasyarakatan untuk kerukunan warga.</span>
                    </li>
                    <li class="flex items-start gap-4">
                        <div class="mt-1 w-6 h-6 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-600 text-xs font-bold">4</div>
                        <span class="text-gray-700">Memberdayakan masyarakat dalam pengelolaan potensi desa.</span>
                    </li>
                    <li class="flex items-start gap-4">
                        <div class="mt-1 w-6 h-6 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-600 text-xs font-bold">5</div>
                        <span class="text-gray-700">Menjaga ketenteraman dan ketertiban umum di lingkungan desa.</span>
                    </li>
                </ul>
            </div>

            <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-2xl p-8 shadow-xl text-white relative overflow-hidden">
                <div class="absolute -right-10 -bottom-10 opacity-10">
                    <svg class="w-64 h-64" fill="currentColor" viewBox="0 0 24 24"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg>
                </div>

                <h3 class="text-2xl font-bold mb-8 flex items-center gap-3">
                    <span class="w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </span>
                    Waktu Pelayanan
                </h3>

                <div class="space-y-6 relative z-10">
                    <div class="flex justify-between items-center border-b border-white/10 pb-4">
                        <div>
                            <p class="text-slate-400 text-sm font-medium uppercase tracking-wider">Senin - Kamis</p>
                            <p class="text-xl font-bold mt-1">08:00 - 16:00 WIB</p>
                        </div>
                        <div class="text-emerald-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                    </div>

                    <div class="flex justify-between items-center border-b border-white/10 pb-4">
                        <div>
                            <p class="text-slate-400 text-sm font-medium uppercase tracking-wider">Jumat</p>
                            <p class="text-xl font-bold mt-1">08:00 - 15:30 WIB</p>
                        </div>
                        <div class="text-emerald-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                    </div>

                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-slate-400 text-sm font-medium uppercase tracking-wider">Istirahat</p>
                            <p class="text-xl font-bold mt-1">12:00 - 13:00 WIB</p>
                        </div>
                        <div class="text-amber-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-24 relative overflow-hidden">
    <div class="absolute inset-0 bg-emerald-700"></div>
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
    
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h2 class="text-3xl md:text-5xl font-bold text-white mb-6">Perlu Layanan Administrasi?</h2>
        <p class="text-emerald-100 text-lg mb-10 max-w-2xl mx-auto leading-relaxed">
            Silakan datang ke kantor desa pada jam kerja atau hubungi kami melalui layanan online.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center gap-4">
            <a href="{{ route('kontak') }}" class="inline-flex items-center justify-center gap-2 px-8 py-3 bg-white text-emerald-600 font-bold rounded-xl hover:bg-emerald-50 transition shadow-lg">
                Hubungi Kami
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
            </a>
        </div>
    </div>
</section>

@endsection
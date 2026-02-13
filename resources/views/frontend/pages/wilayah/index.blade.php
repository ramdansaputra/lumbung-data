@extends('layouts.app')

@section('title', 'Pembagian Wilayah')
@section('description', 'Pembagian wilayah administrasi desa')

@section('content')

<x-hero-section 
    title="Wilayah Administrasi"
    subtitle="Peta dan data pembagian wilayah administratif Dusun, RW, dan RT di Desa Serayu Larangan."
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('home')],
        ['label' => 'Wilayah', 'url' => '#']
    ]"
/>

<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <x-section-title 
            title="Ringkasan Wilayah" 
            subtitle="Data kuantitatif pembagian wilayah administratif desa."
            badge="📊 Data Statistik"
        />

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($statistik as $stat)
                <x-stat-card 
                    :label="$stat['label']"
                    :value="$stat['value']"
                    :color="$stat['color'] ?? 'emerald'"
                    icon='<svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>'
                />
            @endforeach
        </div>
    </div>
</section>

<section class="py-20 bg-gray-50 border-y border-gray-100">
    <div class="container mx-auto px-4">
        <x-section-title 
            title="Daftar Dusun" 
            subtitle="Wilayah administratif tingkat pertama di bawah desa."
            badge="🏘️ Dusun"
        />

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($wilayahList as $wilayah)
                <a href="{{ route('wilayah.show', $wilayah['id']) }}" class="group h-full">
                    <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden h-full flex flex-col">
                        <div class="h-32 bg-gradient-to-br from-emerald-500 to-teal-600 relative overflow-hidden flex items-center justify-center">
                            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
                            
                            <div class="w-16 h-16 bg-white/20 backdrop-blur rounded-full flex items-center justify-center text-white text-3xl font-bold shadow-inner group-hover:scale-110 transition-transform duration-500">
                                {{ substr($wilayah['nama'], 0, 1) }}
                            </div>
                        </div>
                        
                        <div class="p-6 flex-1 flex flex-col">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-emerald-600 transition mb-1">
                                        {{ $wilayah['nama'] }}
                                    </h3>
                                    <p class="text-sm text-gray-500">Kepala Dusun: <span class="font-medium text-gray-800">{{ $wilayah['kepala_dusun'] }}</span></p>
                                </div>
                            </div>

                            <p class="text-gray-600 text-sm mb-6 line-clamp-2 leading-relaxed">
                                {{ $wilayah['deskripsi'] }}
                            </p>

                            <div class="mt-auto grid grid-cols-3 gap-2 border-t border-gray-100 pt-4 text-center">
                                <div class="bg-gray-50 rounded-lg p-2">
                                    <span class="block text-xs text-gray-400 font-bold uppercase">RW</span>
                                    <span class="text-lg font-bold text-emerald-600">{{ $wilayah['jumlah_rw'] }}</span>
                                </div>
                                <div class="bg-gray-50 rounded-lg p-2">
                                    <span class="block text-xs text-gray-400 font-bold uppercase">RT</span>
                                    <span class="text-lg font-bold text-emerald-600">{{ $wilayah['jumlah_rt'] }}</span>
                                </div>
                                <div class="bg-gray-50 rounded-lg p-2">
                                    <span class="block text-xs text-gray-400 font-bold uppercase">Warga</span>
                                    <span class="text-lg font-bold text-emerald-600">{{ $wilayah['jumlah_penduduk'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold text-gray-900 mb-10 text-center">Hierarki Administratif</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="relative p-8 bg-white rounded-2xl shadow-lg border-t-4 border-emerald-500 hover:-translate-y-1 transition duration-300">
                <div class="absolute top-6 right-6 text-emerald-100">
                    <span class="text-6xl font-bold opacity-20">1</span>
                </div>
                <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center text-emerald-600 mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Dusun</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Wilayah kerja kepala dusun sebagai unsur kewilayahan yang bertugas membantu Kepala Desa dalam pelaksanaan tugas di wilayahnya.
                </p>
            </div>

            <div class="relative p-8 bg-white rounded-2xl shadow-lg border-t-4 border-blue-500 hover:-translate-y-1 transition duration-300">
                <div class="absolute top-6 right-6 text-blue-100">
                    <span class="text-6xl font-bold opacity-20">2</span>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Rukun Warga (RW)</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Lembaga masyarakat yang dibentuk melalui musyawarah pengurus RT di wilayah kerjanya untuk pelayanan pemerintahan dan kemasyarakatan.
                </p>
            </div>

            <div class="relative p-8 bg-white rounded-2xl shadow-lg border-t-4 border-amber-500 hover:-translate-y-1 transition duration-300">
                <div class="absolute top-6 right-6 text-amber-100">
                    <span class="text-6xl font-bold opacity-20">3</span>
                </div>
                <div class="w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center text-amber-600 mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Rukun Tetangga (RT)</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Lembaga yang dibentuk melalui musyawarah masyarakat setempat dalam rangka pelayanan pemerintahan dan kemasyarakatan.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-gray-50 border-t border-gray-100">
    <div class="container mx-auto px-4">
        <x-section-title 
            title="Peta Wilayah" 
            badge="📍 Geografis"
        />

        <div class="bg-white p-2 rounded-3xl shadow-xl border border-gray-200">
            <div class="bg-emerald-50 rounded-2xl h-[500px] flex items-center justify-center w-full overflow-hidden relative group">
                <div class="text-center z-10 transform group-hover:scale-105 transition duration-500">
                    <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg animate-pulse">
                        <svg class="w-12 h-12 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 003 16.382V5.618a1 1 0 011.553-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-1.553-.894L15 9m0 13V9m0 0H9"/></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-emerald-900 mb-2">Peta Interaktif Wilayah</h3>
                    <p class="text-emerald-700">Akan menampilkan batas wilayah Dusun, RW, dan RT.</p>
                    <p class="text-emerald-600/60 text-sm mt-2 font-mono">Lat: -7.5898, Long: 110.4068</p>
                </div>
                
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/diagmonds-light.png')] opacity-20"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-emerald-100/50 to-transparent pointer-events-none"></div>
            </div>
        </div>
    </div>
</section>

@endsection
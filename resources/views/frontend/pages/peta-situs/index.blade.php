@extends('layouts.app')

@section('title', 'Peta Situs')
@section('description', 'Struktur navigasi dan peta situs website Desa Serayu Larangan')

@section('content')

<x-hero-section 
    title="Peta Situs"
    subtitle="Navigasi lengkap seluruh halaman dan layanan yang tersedia di website resmi Pemerintah Desa."
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('home')],
        ['label' => 'Peta Situs', 'url' => '#']
    ]"
/>

<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 hover:shadow-md transition duration-300">
                    <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
                        <div class="w-10 h-10 rounded-lg bg-emerald-100 flex items-center justify-center text-emerald-600 text-xl">
                            🏠
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Menu Utama</h3>
                    </div>
                    <ul class="space-y-3">
                        <li>
                            <a href="{{ route('home') }}" class="flex items-center gap-2 text-gray-600 hover:text-emerald-600 hover:translate-x-1 transition duration-200">
                                <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                Beranda
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('profil') }}" class="flex items-center gap-2 text-gray-600 hover:text-emerald-600 hover:translate-x-1 transition duration-200">
                                <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                Profil Desa
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pemerintahan') }}" class="flex items-center gap-2 text-gray-600 hover:text-emerald-600 hover:translate-x-1 transition duration-200">
                                <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                Pemerintahan Desa
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('wilayah') }}" class="flex items-center gap-2 text-gray-600 hover:text-emerald-600 hover:translate-x-1 transition duration-200">
                                <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                Wilayah Administratif
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 hover:shadow-md transition duration-300">
                    <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
                        <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center text-blue-600 text-xl">
                            📊
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Data & Informasi</h3>
                    </div>
                    <ul class="space-y-3">
                        <li>
                            <a href="{{ route('data-desa') }}" class="flex items-center gap-2 text-gray-600 hover:text-blue-600 hover:translate-x-1 transition duration-200">
                                <svg class="w-4 h-4 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                Data Statistik
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('berita') }}" class="flex items-center gap-2 text-gray-600 hover:text-blue-600 hover:translate-x-1 transition duration-200">
                                <svg class="w-4 h-4 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                Berita & Artikel
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center gap-2 text-gray-600 hover:text-blue-600 hover:translate-x-1 transition duration-200">
                                <svg class="w-4 h-4 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                Pengumuman
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center gap-2 text-gray-600 hover:text-blue-600 hover:translate-x-1 transition duration-200">
                                <svg class="w-4 h-4 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                Galeri Foto
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 hover:shadow-md transition duration-300">
                    <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
                        <div class="w-10 h-10 rounded-lg bg-amber-100 flex items-center justify-center text-amber-600 text-xl">
                            🤝
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Layanan Publik</h3>
                    </div>
                    <ul class="space-y-3">
                        <li>
                            <a href="{{ route('kontak') }}" class="flex items-center gap-2 text-gray-600 hover:text-amber-600 hover:translate-x-1 transition duration-200">
                                <svg class="w-4 h-4 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                Hubungi Kami
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center gap-2 text-gray-600 hover:text-amber-600 hover:translate-x-1 transition duration-200">
                                <svg class="w-4 h-4 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                Layanan Surat Online
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center gap-2 text-gray-600 hover:text-amber-600 hover:translate-x-1 transition duration-200">
                                <svg class="w-4 h-4 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                Pengaduan Masyarakat
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 hover:shadow-md transition duration-300">
                    <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
                        <div class="w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center text-slate-600 text-xl">
                            📜
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Legal & Lainnya</h3>
                    </div>
                    <ul class="space-y-3">
                        <li>
                            <a href="{{ route('kebijakan-privasi') }}" class="flex items-center gap-2 text-gray-600 hover:text-emerald-600 hover:translate-x-1 transition duration-200">
                                <svg class="w-4 h-4 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                Kebijakan Privasi
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('syarat-ketentuan') }}" class="flex items-center gap-2 text-gray-600 hover:text-emerald-600 hover:translate-x-1 transition duration-200">
                                <svg class="w-4 h-4 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                Syarat & Ketentuan
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('peta-situs') }}" class="flex items-center gap-2 text-emerald-600 font-semibold">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Peta Situs (Halaman Ini)
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="bg-gradient-to-br from-emerald-600 to-teal-700 rounded-2xl p-8 shadow-lg text-white">
                    <div class="flex items-center gap-3 mb-6 pb-4 border-b border-emerald-500/30">
                        <div class="w-10 h-10 rounded-lg bg-white/20 flex items-center justify-center text-white text-xl">
                            🔒
                        </div>
                        <h3 class="text-xl font-bold">Akses Khusus</h3>
                    </div>
                    <ul class="space-y-4">
                        <li>
                            <a href="{{ route('setup') }}" class="block p-3 rounded-xl bg-white/10 hover:bg-white/20 transition border border-emerald-500/30">
                                <span class="font-bold block text-sm">Login Admin / Perangkat</span>
                                <span class="text-xs text-emerald-100 opacity-80">Masuk ke Dashboard Sistem</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block p-3 rounded-xl bg-white/10 hover:bg-white/20 transition border border-emerald-500/30">
                                <span class="font-bold block text-sm">Layanan Mandiri Warga</span>
                                <span class="text-xs text-emerald-100 opacity-80">Login untuk warga terdaftar</span>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-white border-t border-gray-100">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Tidak menemukan apa yang Anda cari?</h2>
        <p class="text-gray-500 mb-8">Coba gunakan fitur pencarian atau hubungi kami langsung.</p>
        
        <div class="max-w-md mx-auto relative">
            <input type="text" placeholder="Ketik kata kunci pencarian..." class="w-full pl-5 pr-14 py-4 rounded-full border border-gray-300 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 outline-none transition shadow-sm">
            <button class="absolute right-2 top-2 p-2 bg-emerald-600 rounded-full text-white hover:bg-emerald-700 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </button>
        </div>
    </div>
</section>

@endsection
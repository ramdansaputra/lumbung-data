@extends('layouts.app')

@section('title', 'Beranda')
@section('description', 'Portal informasi resmi Desa ' . ($desaInfo['nama_desa'] ?? ''))

@section('content')
<div class="relative bg-emerald-800 pt-28 pb-24 lg:pt-36 lg:pb-32 overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10 mix-blend-overlay"></div>
    
    <div class="absolute top-0 right-0 -mt-20 -mr-20 w-96 h-96 bg-emerald-500 rounded-full blur-3xl opacity-20 animate-pulse"></div>
    <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-80 h-80 bg-emerald-200 rounded-full blur-3xl opacity-20"></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
            <div class="lg:w-1/2 text-center lg:text-left">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-900/50 border border-emerald-700 text-white text-xs font-medium mb-6 animate-fade-in">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                    </span>
                    Website Resmi Pemerintah Desa
                </div>

                <h1 class="text-4xl lg:text-6xl font-bold text-white leading-tight mb-6">
                    Membangun Desa <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-300">
                        {{ $desaInfo['nama_desa'] ?? 'Maju & Mandiri' }}
                    </span>
                </h1>
                
                <p class="text-lg text-white mb-8 leading-relaxed max-w-2xl mx-auto lg:mx-0">
                    Selamat datang di portal pelayanan publik digital. Akses data kependudukan, berita terkini, dan layanan surat menyurat dengan transparansi penuh.
                </p>

                <div class="flex flex-col sm:flex-row items-center gap-4 justify-center lg:justify-start">
                    <a href="{{ route('profil') }}" class="group relative px-8 py-3.5 bg-emerald-500 text-white font-bold rounded-xl shadow-lg shadow-emerald-500/30 hover:bg-emerald-400 transition-all duration-300 hover:-translate-y-1">
                        <span class="flex items-center gap-2">
                            Jelajahi Profil
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </span>
                    </a>
                    <a href="{{ route('kontak') }}" class="px-8 py-3.5 bg-white/5 border border-white/10 text-white font-semibold rounded-xl hover:bg-white/10 transition-all duration-300 hover:-translate-y-1 backdrop-blur-sm flex items-center gap-2">
                        Hubungi Kami
                        <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </a>
                </div>
            </div>

            <div class="lg:w-1/2 relative hidden md:block">
                <div class="relative w-full aspect-square max-w-lg mx-auto">
                    <div class="absolute inset-4 rounded-[2.5rem] overflow-hidden shadow-2xl shadow-emerald-900/50 border-4 border-emerald-500/20 z-10 rotate-3 hover:rotate-0 transition duration-700 ease-out group">
                        <img src="{{ $desaInfo['gambar_kantor'] ?? 'https://via.placeholder.com/600x600?text=Desa' }}" alt="Desa Digital" class="w-full h-full object-cover scale-110 group-hover:scale-100 transition duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-emerald-950/80 to-transparent"></div>
                    </div>

                    <div class="absolute -top-4 -left-4 z-20 bg-white p-4 rounded-2xl shadow-xl shadow-emerald-900/20 border border-emerald-50 animate-float-slow max-w-[200px]">
                        <div class="flex items-center gap-3">
                            <div class="p-2.5 bg-blue-100 rounded-lg text-blue-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            </div>
                            <div>
                                <p class="text-[10px] text-gray-500 font-bold uppercase tracking-wider">Data Desa</p>
                                <p class="text-sm font-bold text-gray-900">Transparan</p>
                            </div>
                        </div>
                    </div>

                    <div class="absolute bottom-0 -right-4 z-20 bg-white p-4 rounded-2xl shadow-xl shadow-emerald-900/20 border border-emerald-50 animate-float-delayed max-w-[220px]">
                        <div class="flex items-center gap-3">
                            <div class="p-2.5 bg-emerald-100 rounded-lg text-emerald-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </div>
                            <div>
                                <p class="text-[10px] text-gray-500 font-bold uppercase tracking-wider">Pelayanan</p>
                                <p class="text-sm font-bold text-gray-900">Cepat & Digital</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="relative -mt-16 z-30 container mx-auto px-4">
    <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($statistik as $stat)
                <x-stat-card 
                    :label="$stat['label']"
                    :value="$stat['value']"
                    :icon="$stat['icon']"
                    :color="$stat['color'] ?? 'emerald'"
                />
            @empty
                <p class="col-span-4 text-center text-gray-500">Data statistik sedang diperbarui...</p>
            @endforelse
        </div>
    </div>
</div>

<section class="py-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center gap-16">
            <div class="lg:w-1/2 relative">
                <div class="absolute -top-4 -left-4 w-24 h-24 bg-emerald-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
                <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-teal-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
                
                <img src="{{ $desaInfo['gambar_kantor'] ?? 'https://via.placeholder.com/600x400' }}" alt="Kantor Desa" class="relative rounded-3xl shadow-2xl w-full object-cover h-[400px] hover:scale-[1.02] transition duration-500">
                
                <div class="absolute -bottom-6 left-8 right-8 bg-white p-5 rounded-xl shadow-lg border-l-4 border-emerald-500 hidden md:flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-400 font-bold uppercase tracking-wider">Lokasi Kantor</p>
                        <p class="text-gray-800 font-semibold text-sm line-clamp-1">{{ $desaInfo['alamat_kantor'] ?? 'Alamat belum diatur' }}</p>
                    </div>
                    <a href="{{ route('kontak') }}" class="p-2 bg-emerald-100 rounded-lg text-emerald-600 hover:bg-emerald-600 hover:text-white transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </a>
                </div>
            </div>

            <div class="lg:w-1/2">
                <x-section-title 
                    title="Mengenal Desa Kami" 
                    subtitle="Komitmen kami untuk melayani masyarakat dengan integritas, transparansi, dan inovasi tiada henti."
                    :centered="false"
                    icon="✨"
                />

                <p class="text-gray-600 leading-loose mb-8 text-lg">
                    {{ $desaInfo['deskripsi_singkat'] ?? 'Desa ini adalah desa yang menjunjung tinggi nilai gotong royong dan terus berinovasi dalam memberikan pelayanan terbaik bagi seluruh warga masyarakat.' }}
                </p>

                <div class="space-y-4">
                    <div class="flex items-center p-4 bg-white rounded-xl shadow-sm border border-gray-100 hover:border-emerald-300 transition group cursor-pointer">
                        <div class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 mr-4 group-hover:bg-blue-600 group-hover:text-white transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 uppercase font-bold tracking-wide">Email Resmi</p>
                            <p class="text-gray-900 font-medium">{{ $desaInfo['email_desa'] ?? '-' }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center p-4 bg-white rounded-xl shadow-sm border border-gray-100 hover:border-emerald-300 transition group cursor-pointer">
                        <div class="w-12 h-12 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-600 mr-4 group-hover:bg-emerald-600 group-hover:text-white transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 uppercase font-bold tracking-wide">Layanan Telepon</p>
                            <p class="text-gray-900 font-medium">{{ $desaInfo['telepon_desa'] ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-emerald-50/30 relative overflow-hidden">
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-emerald-200 to-transparent"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <x-section-title title="Aparatur Desa" subtitle="Mengenal jajaran perangkat desa yang siap melayani kebutuhan masyarakat." icon="👥" />

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($perangkatUtama as $perangkat)
                <div class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="relative h-72 overflow-hidden bg-gray-100">
                        @if(isset($perangkat['foto']) && $perangkat['foto'])
                            <img src="{{ $perangkat['foto'] }}" alt="{{ $perangkat['nama'] }}" class="w-full h-full object-cover object-top group-hover:scale-110 transition-transform duration-700">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-emerald-50 text-emerald-200">
                                <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                            </div>
                        @endif
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-emerald-900 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                            <p class="text-white font-bold text-lg transform translate-y-4 group-hover:translate-y-0 transition duration-300">{{ $perangkat['nama'] ?? 'Nama' }}</p>
                            <p class="text-emerald-200 text-sm transform translate-y-4 group-hover:translate-y-0 transition duration-300 delay-75">{{ $perangkat['posisi'] ?? 'Jabatan' }}</p>
                        </div>
                    </div>
                    <div class="p-5 text-center group-hover:bg-emerald-50 transition bg-white relative z-10">
                        <h3 class="text-lg font-bold text-gray-900 mb-1 group-hover:text-emerald-700 truncate">{{ $perangkat['nama'] ?? 'Nama Pegawai' }}</h3>
                        <p class="text-sm text-emerald-600 font-medium">{{ $perangkat['posisi'] ?? 'Jabatan' }}</p>
                    </div>
                </div>
            @empty
                <p class="col-span-4 text-center text-gray-500">Data perangkat belum tersedia.</p>
            @endforelse
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('pemerintahan') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-full border border-emerald-200 text-emerald-700 font-semibold hover:bg-emerald-600 hover:text-white hover:border-emerald-600 transition-all duration-300">
                Lihat Struktur Lengkap
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4">
            <div>
                <x-section-title title="Kabar Desa Terkini" subtitle="Informasi terbaru seputar kegiatan dan pengumuman desa." :centered="false" icon="📰" />
            </div>
            <a href="{{ route('berita') }}" class="inline-flex items-center gap-2 text-emerald-600 font-semibold hover:text-emerald-700 transition group mb-12">
                Lihat Semua Berita
                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($artikelTerbaru as $artikel)
                <x-article-card 
                    :title="$artikel['title']"
                    :excerpt="$artikel['excerpt']"
                    :date="$artikel['date']"
                    :category="$artikel['category']"
                    :image="$artikel['image']"
                    :link="route('artikel.show', $artikel['id'])"
                    :author="$artikel['author'] ?? 'Admin'"
                />
            @empty
                <div class="col-span-3 py-12 text-center bg-gray-50 rounded-xl border border-dashed border-gray-300">
                    <p class="text-gray-500">Belum ada berita terbaru.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<section class="py-24 relative overflow-hidden">
    <div class="absolute inset-0 bg-emerald-700"></div>
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
    
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h2 class="text-3xl md:text-5xl font-bold text-white mb-6">Butuh Layanan Surat atau Pengaduan?</h2>
        <p class="text-emerald-100 text-lg mb-10 max-w-2xl mx-auto leading-relaxed">
            Gunakan fitur layanan mandiri kami untuk mengurus administrasi secara online atau sampaikan aspirasi Anda demi kemajuan desa bersama.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#" class="px-8 py-4 bg-white text-emerald-900 font-bold rounded-xl shadow-lg hover:bg-emerald-50 transition transform hover:-translate-y-1">
                Buat Surat Online
            </a>
            <a href="{{ route('kontak') }}" class="px-8 py-4 bg-emerald-800 border border-emerald-700 text-white font-bold rounded-xl hover:bg-emerald-700 transition transform hover:-translate-y-1 flex items-center gap-2 justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                Layanan Pengaduan
            </a>
        </div>
    </div>
</section>

<style>
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-15px); }
    }
    @keyframes blob {
        0% { transform: translate(0px, 0px) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
        100% { transform: translate(0px, 0px) scale(1); }
    }
    .animate-float-slow { animation: float 6s ease-in-out infinite; }
    .animate-float-delayed { animation: float 6s ease-in-out infinite 3s; }
    .animate-blob { animation: blob 7s infinite; }
    .animation-delay-2000 { animation-delay: 2s; }
</style>
@endsection
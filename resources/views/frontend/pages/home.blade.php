@extends('layouts.app')

@section('title', 'Beranda')
@section('description', 'Portal informasi resmi Desa')

@section('content')
<!-- Hero Section dengan Overlay -->
<div class="relative bg-emerald-700 text-white py-20 md:py-32 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-emerald-600 via-emerald-700 to-emerald-900"></div>
    <div class="absolute inset-0 opacity-20" style="background-image: url('data:image/svg+xml,%3Csvg width=%2260%27 height=%2760%27 viewBox=%270 0 60 60%27 xmlns=%27http://www.w3.org/2000/svg%27%3E%3Cg fill=%27none%27 fill-rule=%27evenodd%27%3E%3Cg fill=%27%23ffffff%27 fill-opacity=%270.05%27%3E%3Cpath d=%27M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z%27/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')"></div>
    
    <div class="relative z-10 container mx-auto px-4">
        <div class="max-w-3xl">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 text-balance leading-tight">
                Selamat Datang di {{ $desaInfo['nama_desa'] ?? 'Desa Anda' }}
            </h1>
            <p class="text-lg md:text-xl text-emerald-100 mb-8 text-balance">
                Portal informasi resmi pemerintah desa yang menyediakan layanan transparansi data, informasi publik, dan komunikasi dengan masyarakat.
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ route('profil') }}" class="inline-flex items-center justify-center px-6 py-3 bg-white text-emerald-700 font-semibold rounded-lg hover:bg-emerald-50 transition">
                    Pelajari Lebih Lanjut
                </a>
                <a href="{{ route('kontak') }}" class="inline-flex items-center justify-center px-6 py-3 bg-emerald-600 text-white font-semibold rounded-lg hover:bg-emerald-700 transition border border-white">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Statistik Desa -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($statistik as $stat)
                <x-stat-card 
                    :label="$stat['label']"
                    :value="$stat['value']"
                    :icon="$stat['icon']"
                    :color="$stat['color'] ?? 'emerald'"
                />
            @empty
                <p class="col-span-4 text-center text-gray-500">Data statistik tidak tersedia</p>
            @endforelse
        </div>
    </div>
</section>

<!-- Informasi Desa -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-12">
            <div>
                <div class="inline-flex items-center gap-2 bg-emerald-100 text-emerald-700 px-4 py-2 rounded-full text-sm font-medium mb-4">
                    📍 Identitas Desa
                </div>
                <h2 class="text-4xl font-bold text-gray-900 mb-6">{{ $desaInfo['nama_desa'] ?? 'Desa Anda' }}</h2>
                <p class="text-gray-600 leading-relaxed mb-6">
                    {{ $desaInfo['kecamatan'] ?? 'Kecamatan' }}, {{ $desaInfo['kabupaten'] ?? 'Kabupaten' }}, {{ $desaInfo['provinsi'] ?? 'Provinsi' }}
                </p>
                
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-emerald-600 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                        </svg>
                        <div>
                            <p class="font-semibold text-gray-900">Email</p>
                            <a href="mailto:{{ $desaInfo['email_desa'] ?? '#' }}" class="text-emerald-600 hover:underline">{{ $desaInfo['email_desa'] ?? 'email@desa.go.id' }}</a>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-emerald-600 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773c.268.574.534 1.178.786 1.82.25.647.497 1.313.726 1.98l1.578.789a1 1 0 01.54 1.06l-.74 4.435a1 1 0 01-.986.836H3a1 1 0 01-1-1V3z"/>
                        </svg>
                        <div>
                            <p class="font-semibold text-gray-900">Telepon</p>
                            <a href="tel:{{ $desaInfo['telepon_desa'] ?? '#' }}" class="text-emerald-600 hover:underline">{{ $desaInfo['telepon_desa'] ?? '(+62)' }}</a>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-emerald-600 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <p class="font-semibold text-gray-900">Alamat</p>
                            <p class="text-gray-600">{{ $desaInfo['alamat_kantor'] ?? 'Jalan Utama, Desa' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rounded-lg overflow-hidden shadow-lg">
                <img src="{{ $desaInfo['gambar_kantor'] ?? 'https://via.placeholder.com/500x400' }}" alt="Kantor Desa" class="w-full h-80 object-cover">
            </div>
        </div>
    </div>
</section>

<!-- Perangkat Utama -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-2 bg-emerald-100 text-emerald-700 px-4 py-2 rounded-full text-sm font-medium mb-4">
                👥 Pemerintahan
            </div>
            <h2 class="text-4xl font-bold text-gray-900 mb-3">Perangkat Desa</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Struktur pemerintahan desa yang melayani masyarakat dengan integritas dan dedikasi</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($perangkatUtama as $perangkat)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                    <div class="w-full h-64 bg-gradient-to-br from-emerald-400 to-emerald-600 overflow-hidden flex items-center justify-center">
                        @if(isset($perangkat['foto']) && $perangkat['foto'])
                            <img src="{{ $perangkat['foto'] }}" alt="{{ $perangkat['nama'] }}" class="w-full h-full object-cover">
                        @else
                            <span class="text-5xl">👤</span>
                        @endif
                    </div>
                    <div class="p-6">
                        <p class="text-sm font-semibold text-emerald-600 mb-1">{{ $perangkat['posisi'] ?? 'Posisi' }}</p>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $perangkat['nama'] ?? 'Nama' }}</h3>
                        <p class="text-sm text-gray-600">NIP: {{ $perangkat['nip'] ?? '-' }}</p>
                    </div>
                </div>
            @empty
                <p class="col-span-3 text-center text-gray-500">Data perangkat desa tidak tersedia</p>
            @endforelse
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('pemerintahan') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-emerald-600 text-white font-semibold rounded-lg hover:bg-emerald-700 transition">
                Lihat Semua Perangkat
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Artikel Terbaru -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-2 bg-emerald-100 text-emerald-700 px-4 py-2 rounded-full text-sm font-medium mb-4">
                📰 Berita & Artikel
            </div>
            <h2 class="text-4xl font-bold text-gray-900 mb-3">Berita Terbaru</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Informasi dan kabar terkini dari pemerintah desa</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
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
                <p class="col-span-3 text-center text-gray-500">Belum ada artikel terbaru</p>
            @endforelse
        </div>

        <div class="text-center">
            <a href="{{ route('berita') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-emerald-600 text-white font-semibold rounded-lg hover:bg-emerald-700 transition">
                Baca Semua Berita
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ada Pertanyaan atau Saran?</h2>
        <p class="text-lg text-emerald-100 mb-8 max-w-2xl mx-auto">
            Hubungi kami melalui formulir kontak atau kunjungi kantor desa langsung untuk berbicara dengan pimpinan dan perangkat desa.
        </p>
        <a href="{{ route('kontak') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-white text-emerald-700 font-bold rounded-lg hover:bg-emerald-50 transition">
            Hubungi Kami Sekarang
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
    </div>
</section>
@endsection

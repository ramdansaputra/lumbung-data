@extends('layouts.app')

@section('title', 'Struktur Pemerintahan')
@section('description', 'Struktur organisasi dan perangkat desa')

@section('content')
<!-- Hero Section -->
<x-hero-section 
    title="Struktur Pemerintahan"
    subtitle="Organisasi dan perangkat desa yang melayani dengan dedikasi"
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('home')],
        ['label' => 'Pemerintahan', 'url' => '#']
    ]"
/>

<!-- Struktur Organisasi -->
<section class="py-16">
    <div class="container mx-auto px-4">
        @foreach($pemerintahan['struktur'] as $kategori)
            <div class="mb-16">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-1 h-8 bg-emerald-600 rounded"></div>
                    <h2 class="text-2xl font-bold text-gray-900">{{ $kategori['kategori'] }}</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($kategori['anggota'] as $perangkat)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                            <div class="h-48 bg-gradient-to-br from-emerald-400 to-emerald-600 flex items-center justify-center">
                                <svg class="w-24 h-24 text-emerald-100" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="p-6">
                                <p class="text-sm font-semibold text-emerald-600 uppercase tracking-wide mb-2">{{ $perangkat['posisi'] }}</p>
                                <h3 class="text-lg font-bold text-gray-900 mb-3">{{ $perangkat['nama'] }}</h3>
                                <div class="pt-4 border-t border-gray-200">
                                    <p class="text-xs text-gray-600 mb-1">NIP</p>
                                    <p class="text-sm font-mono text-gray-900">{{ $perangkat['nip'] }}</p>
                                </div>
                                <div class="mt-3">
                                    <span class="inline-block px-3 py-1 bg-emerald-100 text-emerald-700 text-xs font-semibold rounded-full">
                                        {{ $perangkat['status'] }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- Badan Permusyawaratan Desa -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="mb-12">
            <div class="flex items-center gap-3 mb-4">
                <svg class="w-6 h-6 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 1 1 0 000-2H6a6 6 0 100 12H4a2 2 0 01-2-2v-4a2 2 0 012-2zm15 11a1 1 0 100-2h-4.764a2 2 0 01-1.789-.894l-1.326-1.991a2 2 0 01-.11-.494H12a1 1 0 100-2h-.236a2 2 0 01-1.789-.894l-1.33-1.992a2 2 0 01-.11-.494H4a1 1 0 100-2h11a1 1 0 100 2H9.764a2 2 0 011.789.894l1.326 1.991a2 2 0 00.11.494H20a1 1 0 100 2h.236a2 2 0 011.789.894l1.33 1.992a2 2 0 01.11.494H20a1 1 0 100 2H9a1 1 0 000 2h11z" clip-rule="evenodd"/>
                </svg>
                <h2 class="text-3xl font-bold text-gray-900">Badan Permusyawaratan Desa (BPD)</h2>
            </div>
            <p class="text-gray-600 max-w-2xl">Lembaga legislatif desa yang memiliki fungsi legislatif, budgeting, dan pengawasan dalam penyelenggaraan pemerintahan desa</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($badan_permusyawaratan as $anggota)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="h-32 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg mb-4 flex items-center justify-center">
                        <svg class="w-16 h-16 text-blue-100" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <p class="text-sm font-semibold text-blue-600 uppercase tracking-wide mb-2">{{ $anggota['posisi'] }}</p>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $anggota['nama'] }}</h3>
                    <p class="text-sm text-gray-600">Wilayah: <span class="font-semibold">{{ $anggota['wilayah'] }}</span></p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Info Pemerintahan -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div class="bg-gradient-to-br from-emerald-50 to-teal-50 rounded-lg p-8 border border-emerald-200">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Tugas dan Fungsi</h3>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3">
                        <span class="text-emerald-600 font-bold flex-shrink-0">✓</span>
                        <span class="text-gray-700">Menyelenggarakan pemerintahan desa</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-emerald-600 font-bold flex-shrink-0">✓</span>
                        <span class="text-gray-700">Melaksanakan pembangunan desa</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-emerald-600 font-bold flex-shrink-0">✓</span>
                        <span class="text-gray-700">Melayani masyarakat desa</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-emerald-600 font-bold flex-shrink-0">✓</span>
                        <span class="text-gray-700">Membina ketenteraman dan ketertiban</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-emerald-600 font-bold flex-shrink-0">✓</span>
                        <span class="text-gray-700">Mengelola keuangan desa</span>
                    </li>
                </ul>
            </div>

            <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-lg p-8 border border-blue-200">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Waktu Kerja</h3>
                <div class="space-y-4">
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Hari Kerja</p>
                        <p class="text-gray-700">Senin - Jumat</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Jam Kerja</p>
                        <p class="text-gray-700">08:00 - 16:00 WIB (Senin - Kamis)</p>
                        <p class="text-gray-700">08:00 - 15:30 WIB (Jumat)</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 mb-2">Istirahat</p>
                        <p class="text-gray-700">12:00 - 13:00 WIB</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-emerald-600 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Perlu Berbicara Langsung?</h2>
        <p class="text-lg text-emerald-100 mb-8 max-w-2xl mx-auto">
            Kunjungi kantor desa kami atau hubungi melalui kontak yang tersedia
        </p>
        <a href="{{ route('kontak') }}" class="inline-flex items-center gap-2 px-8 py-3 bg-white text-emerald-600 font-bold rounded-lg hover:bg-emerald-50 transition">
            Hubungi Kami
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
    </div>
</section>
@endsection

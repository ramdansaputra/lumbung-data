@extends('layouts.app')

@section('title', 'Berita & Artikel')
@section('description', 'Berita terbaru dan artikel dari desa')

@section('content')
<!-- Hero Section -->
<x-hero-section 
    title="Berita & Artikel"
    subtitle="Informasi terbaru dan kabar penting dari Desa Serayu Larangan"
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('home')],
        ['label' => 'Berita', 'url' => '#']
    ]"
/>

<!-- Filter Kategori -->
<section class="py-8 bg-gray-50 border-b border-gray-200">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap gap-3">
            @foreach($kategoriBlog as $key => $nama)
                <a href="#kategori-{{ $key }}" class="px-4 py-2 rounded-full text-sm font-medium transition @if($key === 'semua') bg-emerald-600 text-white @else bg-white text-gray-700 hover:bg-gray-100 @endif">
                    {{ $nama }}
                </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Daftar Artikel -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            @foreach($artikelList as $artikel)
                <x-article-card 
                    :title="$artikel['title']"
                    :excerpt="$artikel['excerpt']"
                    :date="$artikel['date']"
                    :category="$artikel['category']"
                    :image="$artikel['image']"
                    :link="route('artikel.show', ['id' => $artikel['id']])"
                    :author="$artikel['author']"
                />
            @endforeach
        </div>

        <!-- Pagination Placeholder -->
        <div class="flex items-center justify-center gap-2">
            <button class="px-3 py-2 rounded-lg bg-white text-gray-900 border border-gray-300 hover:bg-gray-50 disabled:opacity-50">
                ← Sebelumnya
            </button>
            <div class="flex gap-1">
                <button class="px-3 py-2 rounded-lg bg-emerald-600 text-white font-medium">1</button>
                <button class="px-3 py-2 rounded-lg bg-white text-gray-900 border border-gray-300 hover:bg-gray-50">2</button>
                <button class="px-3 py-2 rounded-lg bg-white text-gray-900 border border-gray-300 hover:bg-gray-50">3</button>
            </div>
            <button class="px-3 py-2 rounded-lg bg-white text-gray-900 border border-gray-300 hover:bg-gray-50">
                Berikutnya →
            </button>
        </div>
    </div>
</section>

<!-- Artikel Populer Sidebar -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold text-gray-900 mb-8">Artikel Populer</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($artikels->take(3) as $artikel)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                    <div class="h-40 bg-gradient-to-br from-emerald-400 to-emerald-600 overflow-hidden">
                        <img src="{{ $artikel['image'] }}" alt="" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <p class="text-xs text-emerald-600 font-semibold mb-2 flex items-center gap-1">
                            <span class="text-lg">👁️</span>
                            {{ $artikel['views'] }} views
                        </p>
                        <h3 class="text-sm font-bold text-gray-900 line-clamp-2 mb-2">
                            <a href="{{ route('artikel.show', ['id' => $artikel['id']]) }}" class="hover:text-emerald-600">
                                {{ $artikel['title'] }}
                            </a>
                        </h3>
                        <p class="text-xs text-gray-600">
                            {{ \Carbon\Carbon::parse($artikel['date'])
                                ->locale('id')
                                ->isoFormat('D MMMM YYYY') }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Newsletter -->
<section class="py-16 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white">
    <div class="container mx-auto px-4 max-w-2xl text-center">
        <h2 class="text-3xl font-bold mb-4">Berlangganan Newsletter</h2>
        <p class="text-lg text-emerald-100 mb-8">
            Dapatkan berita terbaru dari desa langsung ke inbox Anda
        </p>
        <form class="flex flex-col sm:flex-row gap-3">
            <input 
                type="email" 
                placeholder="Masukkan email Anda" 
                class="flex-1 px-4 py-3 rounded-lg text-gray-900 placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-emerald-400"
                required
            >
            <button 
                type="submit"
                class="px-6 py-3 bg-white text-emerald-600 font-bold rounded-lg hover:bg-emerald-50 transition"
            >
                Berlangganan
            </button>
        </form>
        <p class="text-sm text-emerald-200 mt-4">
            Kami tidak akan pernah membagikan email Anda. Baca Kebijakan Privasi kami.
        </p>
    </div>
</section>
@endsection

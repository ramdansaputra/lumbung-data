@extends('layouts.frontend')

@section('content')
<section class="max-w-7xl mx-auto px-6 py-24">
    <div class="text-center mb-16">
        <span class="inline-block bg-emerald-100 text-emerald-700 px-4 py-2 rounded-full text-sm font-semibold mb-4">
            📰 Berita & Artikel
        </span>
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Artikel & Berita Desa</h1>
        <p class="text-slate-600 max-w-2xl mx-auto">
            Informasi terbaru seputar kegiatan, program, dan pembangunan desa
        </p>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($artikels as $artikel)
        <div class="group bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 border border-gray-100">
            <div class="relative overflow-hidden h-56">
                <img src="{{ $artikel->gambar ? asset('storage/artikel/' . $artikel->gambar) : asset('images/desa.jpeg') }}"
                     class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        {{ $artikel->publish_at ? $artikel->publish_at->format('d M Y') : 'N/A' }}
                    </span>
                    <span>•</span>
                    <span>3 min read</span>
                </div>

                <h3 class="font-bold text-xl mb-3 text-slate-800 group-hover:text-emerald-700 transition-colors">
                    {{ $artikel->nama }}
                </h3>

                <p class="text-sm text-slate-600 leading-relaxed mb-4">
                    {{ Str::limit($artikel->deskripsi, 120) }}
                </p>

                <a href="{{ route('artikel.show', $artikel->id) }}"
                   class="inline-flex items-center gap-2 text-emerald-600 font-semibold group-hover:gap-3 transition-all">
                    Baca Selengkapnya
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-12">
            <p class="text-slate-500">Belum ada artikel yang tersedia.</p>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-12">
        {{ $artikels->links() }}
    </div>
</section>
@endsection

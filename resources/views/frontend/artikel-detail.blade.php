@extends('layouts.frontend')

@section('content')
<section class="max-w-4xl mx-auto px-6 py-24">
    <!-- Article Header -->
    <div class="mb-8">
        <div class="flex items-center gap-3 text-sm text-slate-500 mb-4">
            <span class="flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                {{ $artikel->publish_at ? $artikel->publish_at->format('d M Y') : 'N/A' }}
            </span>
            <span>•</span>
            <span>Artikel Desa</span>
        </div>

        <h1 class="text-4xl md:text-5xl font-bold mb-6 text-slate-800">
            {{ $artikel->nama }}
        </h1>

        <div class="flex items-center gap-4 mb-8">
            <span class="inline-block bg-emerald-100 text-emerald-700 px-4 py-2 rounded-full text-sm font-semibold">
                📰 Artikel
            </span>
        </div>
    </div>

    <!-- Article Image -->
    @if($artikel->gambar)
    <div class="mb-8">
        <img src="{{ asset('storage/artikel/' . $artikel->gambar) }}"
             class="w-full h-96 object-cover rounded-3xl shadow-lg">
    </div>
    @endif

    <!-- Article Content -->
    <div class="prose prose-lg max-w-none mb-12">
        <div class="text-slate-700 leading-relaxed">
            {!! nl2br(e($artikel->deskripsi)) !!}
        </div>
    </div>

    <!-- Back Button -->
    <div class="flex justify-center pt-8 border-t border-gray-200">
        <a href="{{ route('berita') }}"
           class="inline-flex items-center gap-2 px-6 py-3 bg-emerald-600 text-white rounded-full font-semibold hover:bg-emerald-700 transition-all shadow-lg hover:shadow-xl">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Kembali ke Berita
        </a>
    </div>
</section>
@endsection

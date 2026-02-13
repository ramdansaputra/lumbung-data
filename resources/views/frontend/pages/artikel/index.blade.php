@extends('layouts.app')

@section('title', 'Berita & Artikel')
@section('description', 'Berita terbaru dan artikel dari desa')

@section('content')

<x-hero-section 
    title="Kabar Desa"
    subtitle="Pusat informasi terkini, pengumuman, dan artikel inspiratif dari Desa Serayu Larangan."
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('home')],
        ['label' => 'Berita', 'url' => '#']
    ]"
/>

<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-12">
            
            <div class="lg:w-2/3">
                
                <div class="flex flex-wrap gap-2 mb-10 pb-4 border-b border-gray-200">
                    @foreach($kategoriBlog as $key => $nama)
                        <a href="#kategori-{{ $key }}" class="px-5 py-2.5 rounded-full text-sm font-semibold transition-all duration-300 {{ $key === 'semua' ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-200 hover:bg-emerald-700' : 'bg-white text-gray-600 hover:bg-emerald-50 hover:text-emerald-600 border border-gray-200' }}">
                            {{ $nama }}
                        </a>
                    @endforeach
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach($artikelList as $artikel)
                        <div class="h-full">
                            <x-article-card 
                                :title="$artikel['title']"
                                :excerpt="$artikel['excerpt']"
                                :date="$artikel['date']"
                                :category="$artikel['category']"
                                :image="$artikel['image']"
                                :link="route('artikel.show', ['id' => $artikel['id']])"
                                :author="$artikel['author']"
                            />
                        </div>
                    @endforeach
                </div>

                <div class="mt-16 flex justify-center">
                    <nav class="inline-flex rounded-md shadow-sm isolate -space-x-px" aria-label="Pagination">
                        <a href="#" class="relative inline-flex items-center rounded-l-md px-4 py-3 text-gray-400 ring-1 ring-inset ring-gray-200 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                            <span class="sr-only">Previous</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" /></svg>
                        </a>
                        <a href="#" aria-current="page" class="relative z-10 inline-flex items-center bg-emerald-600 px-5 py-3 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600">1</a>
                        <a href="#" class="relative inline-flex items-center px-5 py-3 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-200 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">2</a>
                        <a href="#" class="relative hidden items-center px-5 py-3 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-200 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">3</a>
                        <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 ring-1 ring-inset ring-gray-200 focus:outline-offset-0">...</span>
                        <a href="#" class="relative inline-flex items-center rounded-r-md px-4 py-3 text-gray-400 ring-1 ring-inset ring-gray-200 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                            <span class="sr-only">Next</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" /></svg>
                        </a>
                    </nav>
                </div>
            </div>

            <div class="lg:w-1/3 space-y-10">
                
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Cari Berita</h3>
                    <div class="relative">
                        <input type="text" placeholder="Kata kunci..." class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition outline-none text-sm">
                        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-bold text-gray-900">Artikel Populer</h3>
                        <span class="text-xs font-semibold text-emerald-600 bg-emerald-50 px-2 py-1 rounded-md">Minggu Ini</span>
                    </div>
                    
                    <div class="space-y-6">
                        @foreach($artikels->take(4) as $artikel)
                            <a href="{{ route('artikel.show', ['id' => $artikel['id']]) }}" class="flex gap-4 group">
                                <div class="w-20 h-20 flex-shrink-0 rounded-lg overflow-hidden relative">
                                    <img src="{{ $artikel['image'] }}" alt="" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-gray-900 group-hover:text-emerald-600 transition line-clamp-2 leading-snug mb-1">
                                        {{ $artikel['title'] }}
                                    </h4>
                                    <p class="text-xs text-gray-500 flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        {{ $artikel['views'] }} views
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="bg-gradient-to-br from-emerald-600 to-teal-700 rounded-2xl p-8 text-white text-center relative overflow-hidden">
                    <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-white opacity-10 rounded-full blur-xl"></div>
                    <div class="relative z-10">
                        <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4 backdrop-blur-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Newsletter</h3>
                        <p class="text-emerald-100 text-sm mb-6">Dapatkan info terbaru langsung ke email Anda.</p>
                        
                        <form class="space-y-3">
                            <input type="email" placeholder="Email Anda" class="w-full px-4 py-2.5 rounded-lg text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-white/50">
                            <button type="submit" class="w-full px-4 py-2.5 bg-white text-emerald-700 font-bold rounded-lg text-sm hover:bg-emerald-50 transition shadow-lg">
                                Berlangganan
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
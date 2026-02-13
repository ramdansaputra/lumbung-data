@extends('layouts.app')

@section('title', 'Hubungi Kami')
@section('description', 'Informasi kontak Desa Serayu Larangan')

@section('content')

<x-hero-section 
    title="Layanan Pengaduan & Kontak"
    subtitle="Sampaikan aspirasi, pertanyaan, atau permohonan informasi Anda. Kami siap melayani dengan sepenuh hati."
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('home')],
        ['label' => 'Kontak', 'url' => '#']
    ]"
/>

<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-16">
            
            <div class="lg:w-3/5 order-2 lg:order-1">
                <div class="bg-gray-50 rounded-3xl p-8 lg:p-10 border border-gray-100 shadow-sm">
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Kirim Pesan / Pengaduan</h2>
                    <p class="text-gray-600 mb-8">Silakan isi formulir di bawah ini. Tim kami akan segera merespons pesan Anda melalui email.</p>

                    @if(session('success'))
                        <div class="mb-8 p-4 bg-emerald-100 border border-emerald-200 rounded-xl text-emerald-800 flex items-center gap-3">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('kontak.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="nama" class="text-sm font-bold text-gray-700">Nama Lengkap <span class="text-red-500">*</span></label>
                                <input type="text" id="nama" name="nama" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 outline-none transition bg-white" placeholder="Masukkan nama Anda" value="{{ old('nama') }}" required>
                                @error('nama') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="email" class="text-sm font-bold text-gray-700">Alamat Email <span class="text-red-500">*</span></label>
                                <input type="email" id="email" name="email" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 outline-none transition bg-white" placeholder="email@contoh.com" value="{{ old('email') }}" required>
                                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="nomor_telepon" class="text-sm font-bold text-gray-700">No. WhatsApp <span class="text-gray-400 font-normal">(Opsional)</span></label>
                                <input type="tel" id="nomor_telepon" name="nomor_telepon" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 outline-none transition bg-white" placeholder="08123456789" value="{{ old('nomor_telepon') }}">
                            </div>

                            <div class="space-y-2">
                                <label for="subjek" class="text-sm font-bold text-gray-700">Subjek Pesan <span class="text-red-500">*</span></label>
                                <input type="text" id="subjek" name="subjek" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 outline-none transition bg-white" placeholder="Perihal pesan..." value="{{ old('subjek') }}" required>
                                @error('subjek') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="pesan" class="text-sm font-bold text-gray-700">Isi Pesan <span class="text-red-500">*</span></label>
                            <textarea id="pesan" name="pesan" rows="5" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 outline-none transition bg-white resize-none" placeholder="Tuliskan detail pesan atau pengaduan Anda disini..." required>{{ old('pesan') }}</textarea>
                            @error('pesan') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <button type="submit" class="w-full px-8 py-4 bg-emerald-600 text-white font-bold rounded-xl hover:bg-emerald-700 transition shadow-lg shadow-emerald-200 flex justify-center items-center gap-2 group">
                            <span>Kirim Pesan Sekarang</span>
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>
                    </form>
                </div>
            </div>

            <div class="lg:w-2/5 order-1 lg:order-2 space-y-8">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-xs font-bold uppercase tracking-wider mb-4">
                        📞 Layanan Masyarakat
                    </div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Informasi Kontak</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Anda dapat mengunjungi kantor kami pada jam kerja atau menghubungi melalui saluran komunikasi berikut.
                    </p>
                </div>

                <div class="space-y-4">
                    <div class="flex items-start gap-4 p-5 rounded-2xl bg-white border border-gray-100 shadow-sm hover:shadow-md transition">
                        <div class="w-12 h-12 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-600 shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-gray-900 uppercase tracking-wide mb-1">Alamat Kantor</h4>
                            <p class="text-gray-600 text-sm leading-snug">{{ $infoKontak['alamat'] }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-5 rounded-2xl bg-white border border-gray-100 shadow-sm hover:shadow-md transition">
                        <div class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-gray-900 uppercase tracking-wide mb-1">Telepon / WhatsApp</h4>
                            <a href="tel:{{ $infoKontak['telepon'] }}" class="text-emerald-600 font-semibold hover:underline block">{{ $infoKontak['telepon'] }}</a>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-5 rounded-2xl bg-white border border-gray-100 shadow-sm hover:shadow-md transition">
                        <div class="w-12 h-12 rounded-full bg-rose-50 flex items-center justify-center text-rose-600 shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-gray-900 uppercase tracking-wide mb-1">Email Resmi</h4>
                            <a href="mailto:{{ $infoKontak['email'] }}" class="text-emerald-600 font-semibold hover:underline block break-all">{{ $infoKontak['email'] }}</a>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-2xl p-6 text-white shadow-lg mt-6">
                        <div class="flex items-center gap-3 mb-4">
                            <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <h4 class="font-bold text-lg">Jam Operasional</h4>
                        </div>
                        <p class="text-slate-300 text-sm leading-relaxed mb-4">
                            {{ $infoKontak['jam_operasional'] }}
                        </p>
                        <div class="inline-flex items-center gap-2 px-3 py-1 bg-white/10 rounded-full text-xs font-medium text-amber-400">
                            <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                            Tutup: Sabtu, Minggu & Hari Libur
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-gray-50 border-t border-gray-200">
    <div class="container mx-auto px-4">
        <x-section-title 
            title="Hubungi Departemen" 
            subtitle="Kontak langsung unit pelayanan spesifik desa."
            badge="🏢 Unit Kerja"
        />

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($departemen as $dept)
                <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100 group">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-2xl group-hover:bg-emerald-600 group-hover:text-white transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                    </div>
                    
                    <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $dept['nama'] }}</h3>
                    <p class="text-sm text-gray-500 mb-6">PIC: <span class="font-semibold text-gray-700">{{ $dept['penanggung_jawab'] }}</span></p>
                    
                    <div class="space-y-3 pt-4 border-t border-gray-100">
                        <a href="tel:{{ $dept['telepon'] }}" class="flex items-center gap-3 text-sm text-gray-600 hover:text-emerald-600 transition group/link">
                            <div class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center group-hover/link:bg-emerald-50">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            {{ $dept['telepon'] }}
                        </a>
                        <a href="mailto:{{ $dept['email'] }}" class="flex items-center gap-3 text-sm text-gray-600 hover:text-emerald-600 transition group/link">
                            <div class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center group-hover/link:bg-emerald-50">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <span class="truncate">{{ $dept['email'] }}</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
@extends('layouts.app')

@section('title', 'Hubungi Kami')
@section('description', 'Informasi kontak Desa Serayu Larangan')

@section('content')
<!-- Hero Section -->
<x-hero-section 
    title="Hubungi Kami"
    subtitle="Kami siap melayani dan mendengarkan masukan Anda"
    :breadcrumb="[
        ['label' => 'Beranda', 'url' => route('home')],
        ['label' => 'Kontak', 'url' => '#']
    ]"
/>

<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Informasi Kontak -->
            <div class="lg:col-span-1 space-y-8">
                <!-- Alamat -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center text-emerald-600 text-xl">
                            📍
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">Alamat</h3>
                    </div>
                    <p class="text-gray-700">{{ $infoKontak['alamat'] }}</p>
                </div>

                <!-- Telepon -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 text-xl">
                            📱
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">Telepon</h3>
                    </div>
                    <a href="tel:{{ $infoKontak['telepon'] }}" class="text-emerald-600 hover:underline font-semibold block">
                        {{ $infoKontak['telepon'] }}
                    </a>
                </div>

                <!-- Email -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-rose-100 rounded-lg flex items-center justify-center text-rose-600 text-xl">
                            ✉️
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">Email</h3>
                    </div>
                    <a href="mailto:{{ $infoKontak['email'] }}" class="text-emerald-600 hover:underline font-semibold block text-sm break-all">
                        {{ $infoKontak['email'] }}
                    </a>
                </div>

                <!-- Jam Operasional -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-amber-100 rounded-lg flex items-center justify-center text-amber-600 text-xl">
                            🕐
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">Jam Operasional</h3>
                    </div>
                    <p class="text-gray-700 text-sm">{{ $infoKontak['jam_operasional'] }}</p>
                    <p class="text-gray-500 text-xs mt-2">Tutup pada hari Sabtu, Minggu, dan hari libur nasional</p>
                </div>
            </div>

            <!-- Formulir Kontak -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-md p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Kirim Pesan</h2>
                    <p class="text-gray-600 mb-8">Silakan isi formulir di bawah ini. Kami akan merespons pesan Anda secepatnya.</p>

                    @if(session('success'))
                        <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg text-green-800">
                            ✓ {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('kontak.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Nama -->
                        <div>
                            <label for="nama" class="block text-sm font-semibold text-gray-900 mb-2">
                                Nama <span class="text-red-600">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="nama"
                                name="nama"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('nama') border-red-500 @enderror"
                                placeholder="Nama lengkap Anda"
                                value="{{ old('nama') }}"
                                required
                            >
                            @error('nama')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-900 mb-2">
                                Email <span class="text-red-600">*</span>
                            </label>
                            <input 
                                type="email" 
                                id="email"
                                name="email"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('email') border-red-500 @enderror"
                                placeholder="email@contoh.com"
                                value="{{ old('email') }}"
                                required
                            >
                            @error('email')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nomor Telepon -->
                        <div>
                            <label for="nomor_telepon" class="block text-sm font-semibold text-gray-900 mb-2">
                                Nomor Telepon <span class="text-gray-500 text-xs">(opsional)</span>
                            </label>
                            <input 
                                type="tel" 
                                id="nomor_telepon"
                                name="nomor_telepon"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500"
                                placeholder="+62 812 3456 7890"
                                value="{{ old('nomor_telepon') }}"
                            >
                        </div>

                        <!-- Subjek -->
                        <div>
                            <label for="subjek" class="block text-sm font-semibold text-gray-900 mb-2">
                                Subjek <span class="text-red-600">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="subjek"
                                name="subjek"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('subjek') border-red-500 @enderror"
                                placeholder="Subjek pesan Anda"
                                value="{{ old('subjek') }}"
                                required
                            >
                            @error('subjek')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Pesan -->
                        <div>
                            <label for="pesan" class="block text-sm font-semibold text-gray-900 mb-2">
                                Pesan <span class="text-red-600">*</span>
                            </label>
                            <textarea 
                                id="pesan"
                                name="pesan"
                                rows="6"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('pesan') border-red-500 @enderror resize-none"
                                placeholder="Tulis pesan Anda di sini..."
                                value="{{ old('pesan') }}"
                                required
                            >{{ old('pesan') }}</textarea>
                            @error('pesan')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-4">
                            <button 
                                type="submit"
                                class="w-full px-6 py-3 bg-emerald-600 text-white font-bold rounded-lg hover:bg-emerald-700 transition duration-300"
                            >
                                Kirim Pesan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Departemen -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">Hubungi Departemen</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($departemen as $dept)
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition">
                    <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-lg flex items-center justify-center text-2xl mb-4">
                        👤
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $dept['nama'] }}</h3>
                    <p class="text-emerald-600 font-semibold mb-4">{{ $dept['penanggung_jawab'] }}</p>
                    
                    <div class="space-y-3 text-sm">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773c.268.574.534 1.178.786 1.82.25.647.497 1.313.726 1.98l1.578.789a1 1 0 01.54 1.06l-.74 4.435a1 1 0 01-.986.836H3a1 1 0 01-1-1V3z"/>
                            </svg>
                            <a href="tel:{{ $dept['telepon'] }}" class="text-emerald-600 hover:underline">{{ $dept['telepon'] }}</a>
                        </div>
                        <div class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-gray-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                            </svg>
                            <a href="mailto:{{ $dept['email'] }}" class="text-emerald-600 hover:underline break-all">{{ $dept['email'] }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Peta -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Lokasi Kantor Desa</h2>
        <div class="bg-gradient-to-br from-emerald-200 to-teal-200 rounded-lg h-96 flex items-center justify-center border-2 border-dashed border-emerald-400">
            <div class="text-center">
                <svg class="w-20 h-20 mx-auto mb-4 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <p class="text-emerald-900 font-semibold text-lg">Peta Interaktif</p>
                <p class="text-emerald-700 text-sm mt-2">{{ $infoKontak['latitude'] }}, {{ $infoKontak['longitude'] }}</p>
                <p class="text-emerald-600 text-xs mt-4 max-w-md">
                    Integrasi peta Google Maps atau OpenStreetMap dapat ditambahkan di sini
                </p>
            </div>
        </div>
    </div>
</section>
@endsection

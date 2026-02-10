@php
    $identitas_desa = App\Models\IdentitasDesa::first();
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $identitas_desa->nama_desa ?? 'Website Desa' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#10b981',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-slate-50 text-slate-800">

<!-- NAVBAR -->
<nav class="sticky top-0 w-full z-50 bg-white/95 backdrop-blur-md shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-4">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                </div>
                <div>
                    <div class="font-bold text-xl bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent">
                        {{ $identitas_desa->nama_desa ?? 'Desa Suka Maju' }}
                    </div>
                    <div class="text-xs text-slate-500">Kec. {{ $identitas_desa->kecamatan ?? 'Maju' }}, Kab. {{ $identitas_desa->kabupaten ?? 'Majubersama' }}</div>
                </div>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex gap-1 font-medium">
                <a href="{{ url('/') }}" 
                    class="px-4 py-2 rounded-lg hover:bg-emerald-50 hover:text-emerald-700 transition-all duration-300 flex items-center gap-2 group">
                    <!-- <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg> -->
                    Home
                </a>
                <a href="{{ url('/profil') }}" 
                    class="px-4 py-2 rounded-lg hover:bg-emerald-50 hover:text-emerald-700 transition-all duration-300 flex items-center gap-2 group">
                    <!-- <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg> -->
                    Profil Desa
                </a>
                <a href="{{ url('/pemerintahan') }}" 
                    class="px-4 py-2 rounded-lg hover:bg-emerald-50 hover:text-emerald-700 transition-all duration-300 flex items-center gap-2 group">
                    <!-- <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg> -->
                    Pemerintahan
                </a>
                <a href="{{ url('/data-desa') }}" 
                    class="px-4 py-2 rounded-lg hover:bg-emerald-50 hover:text-emerald-700 transition-all duration-300 flex items-center gap-2 group">
                    <!-- <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg> -->
                    Data Desa
                </a>
                <a href="{{ url('/regulasi') }}" 
                    class="px-4 py-2 rounded-lg hover:bg-emerald-50 hover:text-emerald-700 transition-all duration-300 flex items-center gap-2 group">
                    <!-- <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg> -->
                    Regulasi
                </a>
                <a href="{{ url('/peta') }}"
                    class="px-4 py-2 rounded-lg hover:bg-emerald-50 hover:text-emerald-700 transition-all duration-300 flex items-center gap-2 group">
                    <!-- <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                    </svg> -->
                    Peta
                </a>
                <a href="{{ url('/wilayah') }}"
                    class="px-4 py-2 rounded-lg hover:bg-emerald-50 hover:text-emerald-700 transition-all duration-300 flex items-center gap-2 group">
                    <!-- <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg> -->
                    Wilayah
                </a>
            </div>

            <!-- Login Button -->
            <div class="flex items-center gap-3">
                <a href="{{ route('login') }}"
                    class="group px-6 py-2.5 rounded-full bg-gradient-to-r from-emerald-600 to-teal-600 text-white text-sm font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                    </svg>
                    Login Admin
                </a>

                <!-- Mobile Menu Button -->
                <button onclick="toggleMobileMenu()" class="lg:hidden p-2 rounded-lg hover:bg-gray-100">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden lg:hidden mt-4 pb-4 border-t pt-4">
            <div class="flex flex-col gap-2">
                <a href="{{ url('/') }}" class="px-4 py-3 rounded-lg hover:bg-emerald-50 hover:text-emerald-700 transition-colors flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Home
                </a>
                <a href="{{ url('/profil') }}" class="px-4 py-3 rounded-lg hover:bg-emerald-50 hover:text-emerald-700 transition-colors flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Profil Desa
                </a>
                <a href="{{ url('/pemerintahan') }}" class="px-4 py-3 rounded-lg hover:bg-emerald-50 hover:text-emerald-700 transition-colors flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    Pemerintahan
                </a>
                <a href="{{ url('/data-desa') }}" class="px-4 py-3 rounded-lg hover:bg-emerald-50 hover:text-emerald-700 transition-colors flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    Data Desa
                </a>
                <a href="{{ url('/regulasi') }}" class="px-4 py-3 rounded-lg hover:bg-emerald-50 hover:text-emerald-700 transition-colors flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Regulasi
                </a>
                <a href="{{ url('/peta') }}" class="px-4 py-3 rounded-lg hover:bg-emerald-50 hover:text-emerald-700 transition-colors flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                    </svg>
                    Peta
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- ISI HALAMAN -->
<main class="min-h-screen">
    @yield('content')
</main>

<!-- FOOTER -->
<footer class="bg-gradient-to-br from-emerald-800 via-emerald-700 to-teal-700 text-white relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-teal-300 rounded-full blur-3xl"></div>
    </div>

    <div class="relative z-10">
        <!-- Main Footer -->
        <div class="max-w-7xl mx-auto px-6 py-16">
            <div class="grid md:grid-cols-4 gap-10">
                
                <!-- About Section -->
                <div class="md:col-span-2">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-14 h-14 bg-white/20 backdrop-blur-md rounded-xl flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-2xl">{{ $identitas_desa->nama_desa ?? 'Desa Maju Bersama' }}</h3>
                            <p class="text-emerald-200 text-sm">Website Resmi Pemerintah Desa</p>
                        </div>
                    </div>
                    <p class="text-emerald-100 leading-relaxed mb-6">
                        Website resmi pemerintah desa sebagai sarana informasi, transparansi, dan pelayanan publik 
                        untuk mewujudkan desa yang maju dan sejahtera.
                    </p>
                    <div class="flex gap-3">
                        <a href="#" class="w-10 h-10 bg-white/20 backdrop-blur-md rounded-lg flex items-center justify-center hover:bg-white/30 transition-all">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/20 backdrop-blur-md rounded-lg flex items-center justify-center hover:bg-white/30 transition-all">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/20 backdrop-blur-md rounded-lg flex items-center justify-center hover:bg-white/30 transition-all">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/20 backdrop-blur-md rounded-lg flex items-center justify-center hover:bg-white/30 transition-all">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="font-bold text-lg mb-6 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        Menu Cepat
                    </h3>
                    <ul class="space-y-3 text-emerald-100">
                        <li>
                            <a href="{{ url('/profil') }}" class="hover:text-white hover:translate-x-1 inline-block transition-all">→ Profil Desa</a>
                        </li>
                        <li>
                            <a href="{{ url('/pemerintahan') }}" class="hover:text-white hover:translate-x-1 inline-block transition-all">→ Pemerintahan</a>
                        </li>
                        <li>
                            <a href="{{ url('/data-desa') }}" class="hover:text-white hover:translate-x-1 inline-block transition-all">→ Data Desa</a>
                        </li>
                        <li>
                            <a href="{{ url('/regulasi') }}" class="hover:text-white hover:translate-x-1 inline-block transition-all">→ Regulasi</a>
                        </li>
                        <li>
                            <a href="{{ url('/peta') }}" class="hover:text-white hover:translate-x-1 inline-block transition-all">→ Peta Desa</a>
                        </li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="font-bold text-lg mb-6 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Hubungi Kami
                    </h3>
                    <ul class="space-y-4 text-emerald-100">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <div>
                                <p class="font-semibold text-white">Alamat</p>
                                <p>{{ $identitas_desa->alamat_kantor ?? 'Banggai, Sulawesi Tengah' }}</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <div>
                                <p class="font-semibold text-white">Email</p>
                                <p>desaku@email.com</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <div>
                                <p class="font-semibold text-white">Telepon</p>
                                <p>{{ $identitas_desa->telepon_desa ?? '(0821) 1234-5678' }}</p>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <!-- Bottom Footer -->
        <div class="border-t border-emerald-600/30">
            <div class="max-w-7xl mx-auto px-6 py-6">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-emerald-100">
                    <p>© {{ date('Y') }} Pemerintah {{ $identitas_desa->nama_desa ?? 'Desa Suka Maju' }}. All rights reserved.</p>
                    <div class="flex gap-6">
                        <a href="#" class="hover:text-white transition-colors">Kebijakan Privasi</a>
                        <a href="#" class="hover:text-white transition-colors">Syarat & Ketentuan</a>
                        <a href="#" class="hover:text-white transition-colors">Bantuan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Back to Top Button -->
<button onclick="scrollToTop()" id="backToTop" 
        class="fixed bottom-8 right-8 w-12 h-12 bg-gradient-to-br from-emerald-600 to-teal-600 text-white rounded-full shadow-lg hover:shadow-xl transform hover:scale-110 transition-all duration-300 opacity-0 pointer-events-none z-40">
    <svg class="w-6 h-6 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
    </svg>
</button>

<!-- JavaScript -->
<script>
    // Mobile Menu Toggle
    function toggleMobileMenu() {
        const menu = document.getElementById('mobileMenu');
        menu.classList.toggle('hidden');
    }

    // Back to Top Button
    window.addEventListener('scroll', function() {
        const backToTop = document.getElementById('backToTop');
        if (window.pageYOffset > 300) {
            backToTop.classList.remove('opacity-0', 'pointer-events-none');
        } else {
            backToTop.classList.add('opacity-0', 'pointer-events-none');
        }
    });

    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    // Active Menu Highlight
    const currentLocation = window.location.pathname;
    const menuItems = document.querySelectorAll('nav a[href]');
    menuItems.forEach(item => {
        if (item.getAttribute('href') === currentLocation) {
            item.classList.add('bg-emerald-50', 'text-emerald-700');
        }
    });
</script>

</body>
</html>
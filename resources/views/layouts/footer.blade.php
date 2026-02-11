<!-- Footer -->
<footer class="bg-emerald-900 text-emerald-50 mt-16">
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            <!-- About -->
            <div>
                <h3 class="text-lg font-bold mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.5 1.5H3a1.5 1.5 0 0 0-1.5 1.5v12a1.5 1.5 0 0 0 1.5 1.5h13a1.5 1.5 0 0 0 1.5-1.5V8.5m-7-7v7m0 0h7m-7 0L17 1.5"/>
                    </svg>
                    {{ config('app.village_name', 'Pemerintah Desa') }}
                </h3>
                <p class="text-sm text-emerald-200">Portal informasi resmi desa yang menyediakan layanan transparansi data, informasi publik, dan komunikasi dengan masyarakat.</p>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="font-semibold mb-4">Menu Cepat</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition">→ Beranda</a></li>
                    <li><a href="{{ route('profil') }}" class="hover:text-white transition">→ Profil Desa</a></li>
                    <li><a href="{{ route('pemerintahan') }}" class="hover:text-white transition">→ Pemerintahan</a></li>
                    <li><a href="{{ route('artikel') }}" class="hover:text-white transition">→ Berita Terkini</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h4 class="font-semibold mb-4">Hubungi Kami</h4>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773c.268.574.534 1.178.786 1.82.25.647.497 1.313.726 1.98l1.578.789a1 1 0 01.54 1.06l-.74 4.435a1 1 0 01-.986.836H3a1 1 0 01-1-1V3z"/>
                        </svg>
                        <span>{{ config('app.phone', '-') }}</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                        </svg>
                        <span>{{ config('app.email', '-') }}</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                        <span>{{ config('app.address', '-') }}</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Divider -->
        <div class="border-t border-emerald-700 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center text-xs text-emerald-300">
                <p>&copy; {{ date('Y') }} {{ config('app.village_name') }}. Hak Cipta Dilindungi.</p>
                <div class="flex gap-4 mt-4 md:mt-0">
                    <a href="#" class="hover:text-white transition">Kebijakan Privasi</a>
                    <span>|</span>
                    <a href="#" class="hover:text-white transition">Syarat & Ketentuan</a>
                    <span>|</span>
                    <a href="#" class="hover:text-white transition">Bantuan</a>
                </div>
            </div>
        </div>
    </div>
</footer>

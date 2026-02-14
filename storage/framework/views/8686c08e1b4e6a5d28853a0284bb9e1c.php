

<?php $__env->startSection('title', 'Kebijakan Privasi'); ?>
<?php $__env->startSection('description', 'Kebijakan privasi dan perlindungan data pengguna website Desa Serayu Larangan'); ?>

<?php $__env->startSection('content'); ?>

<?php if (isset($component)) { $__componentOriginala038281ce129721dd88a49670137597b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala038281ce129721dd88a49670137597b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.hero-section','data' => ['title' => 'Kebijakan Privasi','subtitle' => 'Komitmen kami dalam melindungi data pribadi dan privasi pengguna layanan digital desa.','breadcrumb' => [
        ['label' => 'Beranda', 'url' => route('home')],
        ['label' => 'Kebijakan Privasi', 'url' => '#']
    ]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('hero-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Kebijakan Privasi','subtitle' => 'Komitmen kami dalam melindungi data pribadi dan privasi pengguna layanan digital desa.','breadcrumb' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
        ['label' => 'Beranda', 'url' => route('home')],
        ['label' => 'Kebijakan Privasi', 'url' => '#']
    ])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala038281ce129721dd88a49670137597b)): ?>
<?php $attributes = $__attributesOriginala038281ce129721dd88a49670137597b; ?>
<?php unset($__attributesOriginala038281ce129721dd88a49670137597b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala038281ce129721dd88a49670137597b)): ?>
<?php $component = $__componentOriginala038281ce129721dd88a49670137597b; ?>
<?php unset($__componentOriginala038281ce129721dd88a49670137597b); ?>
<?php endif; ?>

<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-12">
            
            <div class="lg:w-1/4">
                <div class="sticky top-24 bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Daftar Isi</h3>
                    <nav class="space-y-1">
                        <a href="#pendahuluan" class="block px-3 py-2 text-sm font-medium text-emerald-600 bg-emerald-50 rounded-lg transition">Pendahuluan</a>
                        <a href="#informasi-dikumpulkan" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-emerald-600 hover:bg-gray-50 rounded-lg transition">Informasi yang Dikumpulkan</a>
                        <a href="#penggunaan-informasi" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-emerald-600 hover:bg-gray-50 rounded-lg transition">Penggunaan Informasi</a>
                        <a href="#keamanan" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-emerald-600 hover:bg-gray-50 rounded-lg transition">Keamanan Data</a>
                        <a href="#cookies" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-emerald-600 hover:bg-gray-50 rounded-lg transition">Cookies</a>
                        <a href="#kontak" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-emerald-600 hover:bg-gray-50 rounded-lg transition">Hubungi Kami</a>
                    </nav>
                    
                    <div class="mt-8 pt-6 border-t border-gray-100">
                        <p class="text-xs text-gray-400 mb-2">Terakhir Diperbarui:</p>
                        <p class="text-sm font-semibold text-gray-700"><?php echo e($lastUpdated ?? date('d M Y')); ?></p>
                    </div>
                </div>
            </div>

            <div class="lg:w-3/4">
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 lg:p-12">
                    
                    <div id="pendahuluan" class="mb-12 scroll-mt-28">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                            <span class="w-8 h-8 rounded-lg bg-emerald-100 flex items-center justify-center text-emerald-600 text-lg">👋</span>
                            Pendahuluan
                        </h2>
                        <div class="prose prose-emerald text-gray-600 leading-relaxed text-justify">
                            <p>
                                Selamat datang di Website Resmi Pemerintah Desa <strong><?php echo e(config('app.village_name', 'Serayu Larangan')); ?></strong>. Kami menghargai privasi Anda dan berkomitmen untuk melindungi data pribadi Anda. Kebijakan Privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi informasi Anda saat Anda menggunakan layanan website kami.
                            </p>
                            <p class="mt-4">
                                Dengan mengakses dan menggunakan website ini, Anda dianggap telah membaca, memahami, dan menyetujui praktik pengumpulan dan penggunaan data yang dijelaskan dalam kebijakan ini.
                            </p>
                        </div>
                    </div>

                    <hr class="border-gray-100 my-10">

                    <div id="informasi-dikumpulkan" class="mb-12 scroll-mt-28">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                            <span class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center text-blue-600 text-lg">📂</span>
                            Informasi yang Kami Kumpulkan
                        </h2>
                        <p class="text-gray-600 mb-4">Kami dapat mengumpulkan jenis informasi berikut:</p>
                        <ul class="space-y-4">
                            <li class="flex items-start gap-4 p-4 bg-gray-50 rounded-xl border border-gray-100">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900 text-sm">Informasi Pribadi</h4>
                                    <p class="text-sm text-gray-600 mt-1">Nama, alamat email, nomor telepon, dan alamat rumah yang Anda berikan secara sukarela saat mengisi formulir kontak atau layanan surat online.</p>
                                </div>
                            </li>
                            <li class="flex items-start gap-4 p-4 bg-gray-50 rounded-xl border border-gray-100">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900 text-sm">Informasi Teknis</h4>
                                    <p class="text-sm text-gray-600 mt-1">Alamat IP, jenis browser, perangkat yang digunakan, dan data log sistem untuk keperluan analisis statistik pengunjung.</p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <hr class="border-gray-100 my-10">

                    <div id="penggunaan-informasi" class="mb-12 scroll-mt-28">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                            <span class="w-8 h-8 rounded-lg bg-amber-100 flex items-center justify-center text-amber-600 text-lg">⚙️</span>
                            Penggunaan Informasi
                        </h2>
                        <div class="prose prose-emerald text-gray-600">
                            <p>Informasi yang kami kumpulkan digunakan untuk tujuan sebagai berikut:</p>
                            <ul class="list-disc pl-5 space-y-2 mt-4 marker:text-emerald-500">
                                <li>Menyediakan layanan administrasi desa secara digital (seperti pembuatan surat).</li>
                                <li>Merespons pertanyaan, aspirasi, atau pengaduan yang Anda kirimkan.</li>
                                <li>Meningkatkan kualitas layanan dan konten website kami.</li>
                                <li>Mengirimkan informasi penting atau pengumuman desa (jika Anda berlangganan newsletter).</li>
                                <li>Mematuhi kewajiban hukum dan peraturan yang berlaku di Indonesia.</li>
                            </ul>
                        </div>
                    </div>

                    <hr class="border-gray-100 my-10">

                    <div id="keamanan" class="mb-12 scroll-mt-28">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                            <span class="w-8 h-8 rounded-lg bg-rose-100 flex items-center justify-center text-rose-600 text-lg">🔒</span>
                            Keamanan Data
                        </h2>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Kami menerapkan langkah-langkah keamanan teknis dan organisasional yang sesuai untuk melindungi data pribadi Anda dari akses yang tidak sah, penyalahgunaan, kehilangan, atau perubahan.
                        </p>
                        <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-r-lg">
                            <p class="text-sm text-emerald-800 font-medium">
                                <strong>Catatan Penting:</strong> Meskipun kami berusaha sebaik mungkin melindungi data Anda, tidak ada metode transmisi melalui internet yang 100% aman.
                            </p>
                        </div>
                    </div>

                    <hr class="border-gray-100 my-10">

                    <div id="cookies" class="mb-12 scroll-mt-28">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                            <span class="w-8 h-8 rounded-lg bg-purple-100 flex items-center justify-center text-purple-600 text-lg">🍪</span>
                            Kebijakan Cookies
                        </h2>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Website ini menggunakan "cookies" untuk meningkatkan pengalaman pengguna. Cookies adalah file teks kecil yang disimpan di perangkat Anda.
                        </p>
                        <ul class="list-disc pl-5 space-y-2 text-gray-600 marker:text-emerald-500">
                            <li><strong>Cookies Wajib:</strong> Diperlukan agar website berfungsi dengan baik.</li>
                            <li><strong>Cookies Analitik:</strong> Membantu kami memahami bagaimana pengunjung menggunakan website ini (misalnya Google Analytics).</li>
                        </ul>
                        <p class="text-gray-600 mt-4 text-sm">
                            Anda dapat mengatur browser Anda untuk menolak semua cookies atau memberi tahu Anda ketika cookies dikirim. Namun, beberapa fitur website mungkin tidak berfungsi jika cookies dimatikan.
                        </p>
                    </div>

                    <hr class="border-gray-100 my-10">

                    <div id="kontak" class="scroll-mt-28">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                            <span class="w-8 h-8 rounded-lg bg-teal-100 flex items-center justify-center text-teal-600 text-lg">📞</span>
                            Hubungi Kami
                        </h2>
                        <p class="text-gray-600 mb-6">
                            Jika Anda memiliki pertanyaan tentang Kebijakan Privasi ini atau pengelolaan data Anda, silakan hubungi kami melalui:
                        </p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <a href="<?php echo e(route('kontak')); ?>" class="flex items-center gap-4 p-4 rounded-xl border border-gray-200 hover:border-emerald-500 hover:bg-emerald-50 transition group">
                                <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 font-bold uppercase">Email</p>
                                    <p class="text-gray-900 font-semibold"><?php echo e(config('app.email', 'admin@desa.go.id')); ?></p>
                                </div>
                            </a>

                            <div class="flex items-center gap-4 p-4 rounded-xl border border-gray-200 bg-gray-50">
                                <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 font-bold uppercase">Kantor Desa</p>
                                    <p class="text-gray-900 font-semibold text-sm">Kec. <?php echo e(config('app.district')); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<style>
    html {
        scroll-behavior: smooth;
    }
    .scroll-mt-28 {
        scroll-margin-top: 7rem; /* Memberi jarak saat scroll anchor agar tidak tertutup header */
    }
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS\lumbung-data\resources\views/index.blade.php ENDPATH**/ ?>
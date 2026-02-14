

<?php $__env->startSection('title', 'Struktur Pemerintahan'); ?>
<?php $__env->startSection('description', 'Struktur organisasi dan perangkat desa yang melayani dengan dedikasi'); ?>

<?php $__env->startSection('content'); ?>

<?php if (isset($component)) { $__componentOriginala038281ce129721dd88a49670137597b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala038281ce129721dd88a49670137597b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.hero-section','data' => ['title' => 'Struktur Pemerintahan','subtitle' => 'Mengenal jajaran perangkat desa dan lembaga yang bekerja sama membangun desa yang maju dan mandiri.','breadcrumb' => [
        ['label' => 'Beranda', 'url' => route('home')],
        ['label' => 'Pemerintahan', 'url' => '#']
    ]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('hero-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Struktur Pemerintahan','subtitle' => 'Mengenal jajaran perangkat desa dan lembaga yang bekerja sama membangun desa yang maju dan mandiri.','breadcrumb' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
        ['label' => 'Beranda', 'url' => route('home')],
        ['label' => 'Pemerintahan', 'url' => '#']
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

<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        
        <?php
            // Cek apakah ada setidaknya satu anggota di seluruh kategori
            $totalPerangkat = collect($pemerintahan['struktur'])->sum(function($kategori) {
                return count($kategori['anggota']);
            });
        ?>

        <?php if($totalPerangkat > 0): ?>
            
            <?php $__currentLoopData = $pemerintahan['struktur']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(count($kategori['anggota']) > 0): ?>
                    <div class="mb-20 last:mb-0">
                        <div class="flex items-center justify-center mb-12">
                            <div class="relative">
                                <h2 class="text-3xl font-bold text-gray-900 z-10 relative px-4"><?php echo e($kategori['kategori']); ?></h2>
                                <div class="absolute inset-x-0 bottom-2 h-3 bg-emerald-100 -z-0"></div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 justify-center">
                            <?php $__currentLoopData = $kategori['anggota']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $perangkat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 border border-gray-100 flex flex-col h-full">
                                    <div class="relative h-72 overflow-hidden bg-gray-100">
                                        <?php if(isset($perangkat['foto']) && $perangkat['foto']): ?>
                                            <img src="<?php echo e($perangkat['foto']); ?>" alt="<?php echo e($perangkat['nama']); ?>" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                                        <?php else: ?>
                                            <div class="w-full h-full bg-gradient-to-br from-emerald-50 to-teal-100 flex items-center justify-center text-emerald-300">
                                                <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <div class="absolute top-4 right-4">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-white/90 text-emerald-600 shadow-sm backdrop-blur">
                                                <?php echo e($perangkat['status'] ?? 'Aktif'); ?>

                                            </span>
                                        </div>
                                    </div>

                                    <div class="p-6 text-center flex-1 flex flex-col justify-between relative bg-white">
                                        <div class="absolute -top-6 left-1/2 -translate-x-1/2 w-12 h-1 bg-emerald-500 rounded-full"></div>
                                        
                                        <div>
                                            <p class="text-xs font-bold text-emerald-600 uppercase tracking-widest mb-2"><?php echo e($perangkat['posisi']); ?></p>
                                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-emerald-700 transition"><?php echo e($perangkat['nama']); ?></h3>
                                            
                                            <?php if(isset($perangkat['nip']) && $perangkat['nip'] != '-' && $perangkat['nip'] != null): ?>
                                                <div class="inline-flex items-center gap-2 text-gray-500 text-sm bg-gray-50 px-3 py-1 rounded-lg mt-2">
                                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path></svg>
                                                    <span class="font-mono">NIP: <?php echo e($perangkat['nip']); ?></span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php else: ?>
            
            <div class="max-w-2xl mx-auto text-center py-16 bg-gray-50 rounded-3xl border-2 border-dashed border-gray-200">
                <div class="inline-flex items-center justify-center w-24 h-24 bg-white rounded-full shadow-sm mb-6 text-emerald-200">
                    <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Data Belum Tersedia</h3>
                <p class="text-gray-500 mb-8 max-w-md mx-auto">
                    Data struktur organisasi dan perangkat desa saat ini belum diinput ke dalam sistem. Silakan hubungi admin desa untuk pembaruan data.
                </p>
                <a href="<?php echo e(route('home')); ?>" class="inline-flex items-center gap-2 text-emerald-600 font-semibold hover:underline">
                    &larr; Kembali ke Beranda
                </a>
            </div>
        <?php endif; ?>

    </div>
</section>

<?php if(!empty($badan_permusyawaratan)): ?>
<section class="py-20 bg-gray-50 border-t border-gray-100">
    <div class="container mx-auto px-4">
        <?php if (isset($component)) { $__componentOriginal6a0a1523cc2edf33c83fe20a5d1f7f78 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6a0a1523cc2edf33c83fe20a5d1f7f78 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.section-title','data' => ['title' => 'Badan Permusyawaratan Desa (BPD)','subtitle' => 'Mitra kerja pemerintah desa dalam menyalurkan aspirasi masyarakat.','badge' => 'Lembaga Desa']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('section-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Badan Permusyawaratan Desa (BPD)','subtitle' => 'Mitra kerja pemerintah desa dalam menyalurkan aspirasi masyarakat.','badge' => 'Lembaga Desa']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6a0a1523cc2edf33c83fe20a5d1f7f78)): ?>
<?php $attributes = $__attributesOriginal6a0a1523cc2edf33c83fe20a5d1f7f78; ?>
<?php unset($__attributesOriginal6a0a1523cc2edf33c83fe20a5d1f7f78); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6a0a1523cc2edf33c83fe20a5d1f7f78)): ?>
<?php $component = $__componentOriginal6a0a1523cc2edf33c83fe20a5d1f7f78; ?>
<?php unset($__componentOriginal6a0a1523cc2edf33c83fe20a5d1f7f78); ?>
<?php endif; ?>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php $__currentLoopData = $badan_permusyawaratan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anggota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white rounded-xl shadow-sm hover:shadow-lg p-6 border border-gray-100 transition-all duration-300 group">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-14 h-14 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition duration-300">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-blue-600 uppercase tracking-wide mb-1"><?php echo e($anggota['posisi']); ?></p>
                            <h3 class="text-lg font-bold text-gray-900"><?php echo e($anggota['nama']); ?></h3>
                        </div>
                    </div>
                    <div class="pt-4 border-t border-gray-100 flex items-center justify-between text-sm text-gray-600">
                        <span>Perwakilan Wilayah:</span>
                        <span class="font-semibold text-gray-800"><?php echo e($anggota['wilayah']); ?></span>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="py-24 relative overflow-hidden">
    <div class="absolute inset-0 bg-emerald-700"></div>
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
    
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Ingin Mengurus Administrasi?</h2>
        <p class="text-emerald-100 text-lg mb-10 max-w-2xl mx-auto leading-relaxed">
            Kunjungi kantor desa pada jam kerja atau gunakan layanan surat online untuk kemudahan Anda.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="<?php echo e(route('kontak')); ?>" class="inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-white text-emerald-800 font-bold rounded-xl hover:bg-emerald-50 transition shadow-lg hover:-translate-y-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                Lihat Jam Pelayanan
            </a>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS\lumbung-data\resources\views/frontend/pages/pemerintahan/index.blade.php ENDPATH**/ ?>
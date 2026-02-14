

<?php $__env->startSection('title', 'Pertanyaan Umum (FAQ)'); ?>
<?php $__env->startSection('description', 'Pusat bantuan dan jawaban atas pertanyaan seputar layanan Desa Serayu Larangan'); ?>

<?php $__env->startSection('content'); ?>

<?php if (isset($component)) { $__componentOriginala038281ce129721dd88a49670137597b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala038281ce129721dd88a49670137597b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.hero-section','data' => ['title' => 'Pertanyaan Umum','subtitle' => 'Temukan jawaban cepat seputar layanan administrasi, bantuan sosial, dan penggunaan website desa.','breadcrumb' => [
        ['label' => 'Beranda', 'url' => route('home')],
        ['label' => 'FAQ', 'url' => '#']
    ]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('hero-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Pertanyaan Umum','subtitle' => 'Temukan jawaban cepat seputar layanan administrasi, bantuan sosial, dan penggunaan website desa.','breadcrumb' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
        ['label' => 'Beranda', 'url' => route('home')],
        ['label' => 'FAQ', 'url' => '#']
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

<section class="py-12 bg-gray-50 relative">
    <div class="container mx-auto px-4">
        
        <div class="max-w-2xl mx-auto mb-12">
            <div class="relative group">
                <div class="absolute inset-0 bg-emerald-200 rounded-full blur opacity-20 group-hover:opacity-30 transition duration-500"></div>
                <div class="relative bg-white rounded-full shadow-md border border-gray-200 flex items-center p-1 pl-4 transition-all focus-within:ring-4 focus-within:ring-emerald-100 focus-within:border-emerald-400">
                    <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <input type="text" id="faqSearch" placeholder="Cari pertanyaan (misal: KTP, Surat, Bantuan)..." 
                           class="w-full bg-transparent border-none focus:ring-0 text-gray-700 placeholder-gray-400 h-10 text-sm">
                </div>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-8 lg:gap-12 items-start">
            
            <div class="lg:w-1/4 w-full sticky top-24 z-20 self-start">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-4 border-b border-gray-100 lg:hidden font-bold text-gray-900 bg-gray-50 text-sm uppercase tracking-wide">
                        Kategori Bantuan
                    </div>
                    <nav class="flex flex-row lg:flex-col overflow-x-auto lg:overflow-visible p-2 gap-1 no-scrollbar" id="faq-nav">
                        <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="#<?php echo e(Str::slug($kategori)); ?>" 
                               class="faq-cat-link flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200 whitespace-nowrap lg:whitespace-normal group
                               <?php echo e($loop->first ? 'active' : ''); ?>">
                                <?php
                                    $icon = match($kategori) {
                                        'Layanan Administrasi & Surat' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>',
                                        'Bantuan Sosial (Bansos)' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>',
                                        'Sistem Website Desa' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>',
                                        'Pengaduan & Aspirasi' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>',
                                        default => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>'
                                    };
                                ?>
                                <span class="text-gray-400 group-hover:text-emerald-500 transition-colors icon-wrapper"><?php echo $icon; ?></span>
                                <span class="text-label"><?php echo e($kategori); ?></span>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </nav>
                </div>
            </div>

            <div class="lg:w-3/4 w-full space-y-12 pb-20">
                <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div id="<?php echo e(Str::slug($kategori)); ?>" class="faq-section scroll-mt-28">
                        <div class="flex items-center gap-3 mb-6 pb-2 border-b border-gray-200">
                            <h3 class="text-xl font-bold text-gray-800"><?php echo e($kategori); ?></h3>
                        </div>

                        <div class="space-y-4">
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="faq-item bg-white rounded-xl border border-gray-200 overflow-hidden transition-all duration-200 hover:border-emerald-300 hover:shadow-md group">
                                    <button class="w-full flex items-start justify-between p-5 text-left focus:outline-none" onclick="toggleFaq(this)">
                                        <span class="font-bold text-gray-800 pr-6 group-hover:text-emerald-700 transition question-text text-base"><?php echo e($faq['tanya']); ?></span>
                                        <span class="bg-gray-50 rounded-full p-1.5 text-gray-400 group-hover:bg-emerald-50 group-hover:text-emerald-600 transition flex-shrink-0 mt-0.5">
                                            <svg class="w-4 h-4 transform transition-transform duration-300 icon-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                        </span>
                                    </button>
                                    <div class="faq-answer hidden bg-gray-50/50 border-t border-gray-100">
                                        <div class="p-5 text-gray-600 text-sm leading-relaxed prose-sm">
                                            <?php echo nl2br(e($faq['jawab'])); ?>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div id="no-results" class="hidden text-center py-16">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full mb-4 text-gray-400">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900">Pertanyaan tidak ditemukan</h3>
                    <p class="text-gray-500 text-sm mt-1">Coba kata kunci lain atau hubungi petugas kami.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="py-24 relative overflow-hidden">
    <div class="absolute inset-0 bg-emerald-700"></div>
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
    
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h2 class="text-3xl md:text-5xl font-bold text-white mb-6">Masih punya pertanyaan lain??</h2>
        <p class="text-emerald-100 text-lg mb-10 max-w-2xl mx-auto leading-relaxed">
            Tim pelayanan desa siap membantu Anda pada jam kerja.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="<?php echo e(route('kontak')); ?>" class="px-8 py-4 bg-white border border-emerald-700 text-emerald-900 font-bold rounded-xl hover:bg-emerald-700 transition transform hover:-translate-y-1 flex items-center gap-2 justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                Hubungi Kami
            </a>
        </div>
    </div>
</section>

<style>
    /* Hide Scrollbar */
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    /* Scroll Margin untuk Sticky Header */
    .scroll-mt-28 {
        scroll-margin-top: 8rem; /* Sesuaikan dengan tinggi header + margin */
    }

    /* Active State Styling */
    .faq-cat-link.active {
        background-color: #ecfdf5; /* emerald-50 */
        color: #047857; /* emerald-700 */
        font-weight: 600;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    }
    .faq-cat-link.active .icon-wrapper {
        color: #10b981; /* emerald-500 */
    }
</style>

<script>
    // Accordion Logic
    function toggleFaq(button) {
        const item = button.parentElement;
        const answer = item.querySelector('.faq-answer');
        const icon = button.querySelector('.icon-arrow');
        
        if (answer.classList.contains('hidden')) {
            answer.classList.remove('hidden');
            icon.classList.add('rotate-180');
            item.classList.add('ring-1', 'ring-emerald-200'); 
        } else {
            answer.classList.add('hidden');
            icon.classList.remove('rotate-180');
            item.classList.remove('ring-1', 'ring-emerald-200');
        }
    }

    // Search Logic
    const searchInput = document.getElementById('faqSearch');
    if(searchInput){
        searchInput.addEventListener('keyup', function() {
            let filter = this.value.toLowerCase();
            let sections = document.querySelectorAll('.faq-section');
            let hasResults = false;

            sections.forEach(section => {
                let items = section.querySelectorAll('.faq-item');
                let sectionHasVisibleItems = false;

                items.forEach(item => {
                    let question = item.querySelector('.question-text').textContent.toLowerCase();
                    let answerText = item.querySelector('.faq-answer').textContent.toLowerCase();

                    if (question.includes(filter) || answerText.includes(filter)) {
                        item.style.display = "";
                        sectionHasVisibleItems = true;
                        hasResults = true;
                    } else {
                        item.style.display = "none";
                    }
                });

                if (sectionHasVisibleItems) {
                    section.style.display = "";
                } else {
                    section.style.display = "none";
                }
            });

            const noResults = document.getElementById('no-results');
            if (!hasResults) {
                noResults.classList.remove('hidden');
            } else {
                noResults.classList.add('hidden');
            }
        });
    }

    // Active State Navigation (Intersection Observer)
    document.addEventListener('DOMContentLoaded', () => {
        const observerOptions = {
            root: null,
            rootMargin: '-20% 0px -60% 0px',
            threshold: 0
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const id = entry.target.getAttribute('id');
                    
                    document.querySelectorAll('.faq-cat-link').forEach(link => {
                        link.classList.remove('active'); // Hapus class active custom
                        
                        if (link.getAttribute('href') === '#' + id) {
                            link.classList.add('active'); // Tambah class active custom
                            
                            // Auto scroll menu horizontal di mobile
                            link.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
                        }
                    });
                }
            });
        }, observerOptions);

        document.querySelectorAll('.faq-section').forEach(section => {
            observer.observe(section);
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS\lumbung-data\resources\views/frontend/pages/faq/index.blade.php ENDPATH**/ ?>
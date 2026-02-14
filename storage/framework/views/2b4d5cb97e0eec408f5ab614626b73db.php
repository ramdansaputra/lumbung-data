<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['title', 'subtitle' => null, 'image' => null, 'breadcrumb' => null]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['title', 'subtitle' => null, 'image' => null, 'breadcrumb' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    // LOGIKA OTOMATIS: Ambil gambar kantor jika props image kosong
    if (empty($image)) {
        $identitasHero = \App\Models\IdentitasDesa::first();
        if ($identitasHero && $identitasHero->gambar_kantor && file_exists(storage_path('app/public/gambar-kantor/' . $identitasHero->gambar_kantor))) {
            $image = asset('storage/gambar-kantor/' . $identitasHero->gambar_kantor);
        }
    }
?>

<div class="relative bg-emerald-900 text-white py-20 lg:py-32 overflow-hidden isolate group">
    
    
    <div class="absolute inset-0 z-0">
        <?php if($image): ?>
            
            <img src="<?php echo e($image); ?>" 
                alt="Background" 
                class="w-full h-full object-cover transition-transform duration-[2000ms] group-hover:scale-105 origin-center">
            
            
            <div class="absolute inset-0 bg-gradient-to-r from-emerald-950/95 via-emerald-900/80 to-emerald-900/40 mix-blend-multiply"></div>
            
            
            <div class="absolute inset-0 bg-black/20"></div>
        <?php else: ?>
            
            <div class="absolute inset-0 bg-gradient-to-br from-emerald-950 via-emerald-900 to-teal-900"></div>
        <?php endif; ?>
        
        
        <div class="absolute inset-0 opacity-[0.07] bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] mix-blend-overlay"></div>
    </div>

    
    <div class="absolute top-0 right-0 -mt-20 -mr-20 w-96 h-96 bg-emerald-500 rounded-full blur-[100px] opacity-20 pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-80 h-80 bg-teal-500 rounded-full blur-[100px] opacity-20 pointer-events-none"></div>

    
    <div class="relative z-10 container mx-auto px-4">
        <div class="max-w-4xl">
            
            
            <?php if($breadcrumb): ?>
                <nav class="flex flex-wrap items-center gap-2 text-sm font-medium text-emerald-200/90 mb-6 animate-fade-in-down" aria-label="Breadcrumb">
                    <?php $__currentLoopData = $breadcrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!$loop->last): ?>
                            <a href="<?php echo e($item['url']); ?>" class="hover:text-white hover:underline decoration-emerald-400 underline-offset-4 transition-all duration-200">
                                <?php echo e($item['label']); ?>

                            </a>
                            <span class="text-emerald-500/60 text-xs">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </span>
                        <?php else: ?>
                            <span class="text-white px-2 py-0.5 rounded-md bg-white/10 border border-white/10 text-xs tracking-wide uppercase">
                                <?php echo e($item['label']); ?>

                            </span>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </nav>
            <?php endif; ?>

            
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 tracking-tight leading-tight text-white drop-shadow-sm text-balance">
                <?php echo e($title); ?>

            </h1>
            
            
            <?php if($subtitle): ?>
                <p class="text-lg md:text-xl text-emerald-100/90 leading-relaxed max-w-3xl font-light text-balance border-l-4 border-emerald-500 pl-4">
                    <?php echo e($subtitle); ?>

                </p>
            <?php endif; ?>
        </div>
    </div>

    
    <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-emerald-400/30 to-transparent z-20"></div>
</div><?php /**PATH C:\Users\ASUS\lumbung-data\resources\views/components/hero-section.blade.php ENDPATH**/ ?>
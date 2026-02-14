<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['image' => null, 'title', 'excerpt', 'date' => null, 'category' => null, 'link' => '#', 'author' => null]));

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

foreach (array_filter((['image' => null, 'title', 'excerpt', 'date' => null, 'category' => null, 'link' => '#', 'author' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="flex flex-col bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300 h-full group">
    <div class="relative h-56 overflow-hidden">
        <?php if($image): ?>
            <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
        <?php else: ?>
            <div class="w-full h-full bg-gradient-to-br from-emerald-100 to-teal-50 flex items-center justify-center">
                <svg class="w-16 h-16 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
        <?php endif; ?>
        
        <?php if($category): ?>
            <span class="absolute top-4 left-4 bg-white/90 backdrop-blur text-emerald-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider shadow-sm">
                <?php echo e($category); ?>

            </span>
        <?php endif; ?>
    </div>
    
    <div class="p-6 flex-1 flex flex-col">
        <div class="flex items-center gap-3 mb-3 text-xs text-gray-500 font-medium">
            <?php if($date): ?>
                <span class="flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <?php echo e(\Carbon\Carbon::parse($date)->locale('id')->isoFormat('D MMMM YYYY')); ?>

                </span>
            <?php endif; ?>
            <?php if($author): ?>
                <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                <span><?php echo e($author); ?></span>
            <?php endif; ?>
        </div>
        
        <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2 group-hover:text-emerald-600 transition-colors">
            <a href="<?php echo e($link); ?>">
                <?php echo e($title); ?>

            </a>
        </h3>
        
        <p class="text-gray-600 text-sm mb-6 line-clamp-3 leading-relaxed flex-1">
            <?php echo e($excerpt); ?>

        </p>
        
        <a href="<?php echo e($link); ?>" class="inline-flex items-center gap-2 text-emerald-600 font-semibold text-sm group/link mt-auto">
            Baca Selengkapnya
            <svg class="w-4 h-4 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
        </a>
    </div>
</div><?php /**PATH C:\Users\ASUS\lumbung-data\resources\views/components/article-card.blade.php ENDPATH**/ ?>
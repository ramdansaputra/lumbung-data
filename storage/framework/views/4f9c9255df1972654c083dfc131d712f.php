<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['icon' => null, 'title', 'description', 'link' => null, 'linkText' => 'Lihat', 'type' => 'vertical']));

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

foreach (array_filter((['icon' => null, 'title', 'description', 'link' => null, 'linkText' => 'Lihat', 'type' => 'vertical']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php if($type === 'horizontal'): ?>
    <div class="flex items-start gap-4 p-4 rounded-xl border border-gray-100 bg-gray-50 hover:border-emerald-200 hover:bg-white hover:shadow-md transition-all duration-300 h-full">
        <?php if($icon): ?>
            <div class="w-12 h-12 flex-shrink-0 rounded-full bg-white border border-emerald-100 flex items-center justify-center text-emerald-600 shadow-sm">
                <?php echo $icon; ?>

            </div>
        <?php endif; ?>
        <div class="flex-1 min-w-0">
            <p class="text-xs text-gray-500 font-bold uppercase tracking-wide mb-1"><?php echo e($title); ?></p>
            <div class="text-gray-900 font-medium text-sm leading-snug break-words">
                <?php echo $description; ?>

            </div>
        </div>
    </div>
<?php else: ?>
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition duration-300 h-full">
        <?php if($icon): ?>
            <div class="bg-gradient-to-br from-emerald-500 to-emerald-600 h-12 flex items-center justify-center text-white text-2xl">
                <?php echo e($icon); ?>

            </div>
        <?php endif; ?>
        
        <div class="p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-2"><?php echo e($title); ?></h3>
            <p class="text-gray-600 text-sm mb-4 line-clamp-3"><?php echo e($description); ?></p>
            
            <?php if($link): ?>
                <a href="<?php echo e($link); ?>" class="inline-flex items-center gap-2 text-emerald-600 hover:text-emerald-700 font-medium text-sm">
                    <?php echo e($linkText); ?>

                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?><?php /**PATH C:\Users\ASUS\lumbung-data\resources\views/components/info-card.blade.php ENDPATH**/ ?>
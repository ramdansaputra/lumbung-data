<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['title', 'subtitle' => null, 'centered' => true, 'icon' => null, 'badge' => null]));

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

foreach (array_filter((['title', 'subtitle' => null, 'centered' => true, 'icon' => null, 'badge' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="<?php echo e($centered ? 'text-center' : ''); ?> mb-12">
    <?php if($badge): ?>
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-100 text-emerald-600 text-xs font-bold uppercase tracking-wider mb-4">
            <?php echo e($badge); ?>

        </div>
    <?php endif; ?>

    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4 leading-tight flex items-center <?php echo e($centered ? 'justify-center' : ''); ?> gap-3">
        <?php if($icon && !$badge): ?>
            <span class="text-emerald-600 w-8 h-8">
                <?php echo $icon; ?>

            </span>
        <?php endif; ?>
        <?php echo e($title); ?>

    </h2>
    
    <?php if($subtitle): ?>
        <p class="text-gray-600 text-lg leading-relaxed max-w-2xl <?php echo e($centered ? 'mx-auto' : ''); ?>">
            <?php echo e($subtitle); ?>

        </p>
    <?php endif; ?>
</div><?php /**PATH C:\Users\ASUS\lumbung-data\resources\views/components/section-title.blade.php ENDPATH**/ ?>
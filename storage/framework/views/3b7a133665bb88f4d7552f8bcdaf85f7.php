<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['icon' => null, 'label', 'value', 'color' => 'emerald']));

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

foreach (array_filter((['icon' => null, 'label', 'value', 'color' => 'emerald']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $bgClass = match($color) {
        'blue' => 'bg-blue-50 text-blue-600',
        'amber' => 'bg-amber-50 text-amber-600',
        'rose' => 'bg-rose-50 text-rose-600',
        default => 'bg-emerald-50 text-emerald-600',
    };
?>

<div class="flex items-center gap-5 p-4 rounded-xl hover:bg-gray-50 transition-colors duration-300 group cursor-default">
    <div class="w-16 h-16 rounded-2xl flex items-center justify-center text-3xl shadow-sm group-hover:scale-110 transition-transform duration-300 <?php echo e($bgClass); ?>">
        <?php echo $icon ?? '📊'; ?>

    </div>
    <div>
        <p class="text-3xl font-extrabold text-gray-900 group-hover:text-emerald-600 transition-colors">
            <?php echo e($value); ?>

        </p>
        <p class="text-sm font-medium text-gray-500 uppercase tracking-wide mt-1"><?php echo e($label); ?></p>
    </div>
</div><?php /**PATH C:\laragon\www\LumbungData\resources\views/components/stat-card.blade.php ENDPATH**/ ?>
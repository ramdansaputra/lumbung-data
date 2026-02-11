<!-- Stat Card Component -->
@props(['icon' => null, 'label', 'value', 'color' => 'emerald'])

@php
    $colorClasses = [
        'emerald' => 'bg-emerald-100 text-emerald-700 border-l-4 border-emerald-500',
        'blue' => 'bg-blue-100 text-blue-700 border-l-4 border-blue-500',
        'amber' => 'bg-amber-100 text-amber-700 border-l-4 border-amber-500',
        'rose' => 'bg-rose-100 text-rose-700 border-l-4 border-rose-500',
    ];
@endphp

<div class="bg-white rounded-lg shadow p-6 {{ $colorClasses[$color] ?? $colorClasses['emerald'] }}">
    @if($icon)
        <div class="flex items-center justify-between mb-4">
            <div class="text-3xl">{{ $icon }}</div>
        </div>
    @endif
    
    <p class="text-sm font-medium opacity-90 mb-2">{{ $label }}</p>
    <p class="text-3xl font-bold">{{ $value }}</p>
</div>

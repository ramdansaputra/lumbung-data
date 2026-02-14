@props(['icon' => null, 'label', 'value', 'color' => 'emerald'])

@php
    $bgClass = match($color) {
        'blue' => 'bg-blue-50 text-blue-600',
        'amber' => 'bg-amber-50 text-amber-600',
        'rose' => 'bg-rose-50 text-rose-600',
        'pink' => 'bg-pink-50 text-pink-600', // Tambahan untuk data perempuan
        'orange' => 'bg-orange-50 text-orange-600', // Tambahan untuk data keluarga
        default => 'bg-emerald-50 text-emerald-600',
    };
@endphp

<div class="flex items-center gap-5 p-4 rounded-xl border border-gray-50 hover:bg-gray-50 hover:shadow-md transition-all duration-300 group cursor-default bg-white">
    <div class="w-16 h-16 rounded-2xl flex items-center justify-center shadow-sm group-hover:scale-110 transition-transform duration-300 {{ $bgClass }}">
        <div class="w-8 h-8">
            {!! $icon ?? '' !!}
        </div>
    </div>
    <div>
        <p class="text-3xl font-extrabold text-gray-900 group-hover:text-emerald-600 transition-colors">
            {{ $value }}
        </p>
        <p class="text-sm font-medium text-gray-500 uppercase tracking-wide mt-1">{{ $label }}</p>
    </div>
</div>
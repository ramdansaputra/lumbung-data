<!-- Section Title Component -->
@props(['title', 'subtitle' => null, 'centered' => true, 'icon' => null])

<div class="{{ $centered ? 'text-center' : '' }} mb-12">
    @if($icon)
        <div class="inline-flex items-center gap-2 bg-emerald-100 text-emerald-700 px-4 py-2 rounded-full text-sm font-medium mb-4">
            <span class="text-lg">{{ $icon }}</span>
            {{ $icon }}
        </div>
    @endif
    
    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">{{ $title }}</h2>
    
    @if($subtitle)
        <p class="text-gray-600 max-w-2xl {{ $centered ? 'mx-auto' : '' }}">{{ $subtitle }}</p>
    @endif
</div>
